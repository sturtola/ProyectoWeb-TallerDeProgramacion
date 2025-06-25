<?php

namespace App\Controllers;

use App\Models\pedidoModel;
use App\Models\pedidoProductoModel;
use App\Models\carritoModel;
use App\Models\carritoProductoModel;
use App\Models\productoModel;
use App\Models\domicilioModel; // Asegúrate de incluir el modelo de domicilio

class pedido_controller extends BaseController
{
    public function finalizar()
    {
        $session = session();
        $id_usuario = $session->get('id_usuario');

        $carritoModel = new CarritoModel();
        $carritoProductoModel = new CarritoProductoModel();
        $pedidoModel = new PedidoModel();
        $pedidoProductoModel = new PedidoProductoModel();
        $productoModel = new ProductoModel();
        $domicilioModel = new domicilioModel(); // Instancia el modelo de domicilio

        $carrito = $carritoModel->where('id_usuario', $id_usuario)->where('estado', 'activo')->first();
        if (!$carrito) {
            return redirect()->to('/catalogo')->with('error', 'No hay productos en el carrito.');
        }

        $productos = $carritoProductoModel->where('id_carrito', $carrito['id_carrito'])->findAll();
        if (empty($productos)) {
            return redirect()->to('/catalogo')->with('error', 'El carrito está vacío.');
        }

        $tipo_entrega = $this->request->getPost('tipo_entrega');
        $metodo_pago = $this->request->getPost('metodo_pago');
        $id_domicilio = null; // Inicializa a null

        // Si el tipo de entrega es "envio", guarda los datos del domicilio
        if ($tipo_entrega === 'envio') {
            $dataDomicilio = [
                'provincia' => $this->request->getPost('provincia'),
                'calle' => $this->request->getPost('calle'),
                'numero' => $this->request->getPost('numero'),
                'descripcion' => $this->request->getPost('descripcion'),
                'id_usuario' => $id_usuario // Asigna el ID del usuario al domicilio
            ];

            // Inserta los datos del domicilio y obtén el ID insertado
            $id_domicilio = $domicilioModel->insert($dataDomicilio);

            // Puedes agregar una verificación para asegurarte de que se insertó correctamente
            if (!$id_domicilio) {
                return redirect()->to('/catalogo')->with('error', 'Hubo un problema al guardar los datos del domicilio.');
            }
        }

        $subtotal = array_sum(array_column($productos, 'subtotal'));
        $costo_envio = ($tipo_entrega === 'envio') ? 7200 : 0;
        $total = $subtotal + $costo_envio;

        // 🔐 Validación previa de stock
        foreach ($productos as $item) {
            $producto = $productoModel->find($item['id_producto']);
            if (!$producto || $producto['stock'] < $item['cantidad']) {
                return redirect()->to('/catalogo')->with('error', 'Stock insuficiente para el producto: ' . ($producto['nombre'] ?? 'Desconocido'));
            }
        }

        // ✅ Insertar pedido
        // El id_domicilio ahora contendrá el ID del nuevo domicilio o null si no fue envío
        $id_pedido = $pedidoModel->insert([
            'id_usuario' => $id_usuario,
            'id_domicilio' => $id_domicilio, // Aquí se usa el ID del domicilio recién insertado
            'metodo_pago' => $metodo_pago,
            'tipo_entrega' => $tipo_entrega,
            'subtotal' => $subtotal,
            'total' => $total,
            'estado' => 'pendiente'
        ]);

        // Asegúrate de que el pedido se insertó correctamente
        if (!$id_pedido) {
            return redirect()->to('/catalogo')->with('error', 'Hubo un problema al crear el pedido.');
        }

        // ✅ Insertar productos y descontar stock
        foreach ($productos as $item) {
            $producto = $productoModel->find($item['id_producto']);
            $cantidad = $item['cantidad'];
            $precio_unitario = $producto['precio'];
            $nombre_producto = $producto['nombre'];

            // Insertar detalle de producto
            $pedidoProductoModel->insert([
                'id_pedido' => $id_pedido,
                'id_producto' => $item['id_producto'],
                'cantidad' => $cantidad,
                'precio_unitario' => $precio_unitario,
                'subtotal' => $precio_unitario * $cantidad,
                'nombre_producto' => $nombre_producto
            ]);

            // 🟡 Descontar stock
            $nuevo_stock = $producto['stock'] - $cantidad;
            $productoModel->update($producto['id_producto'], ['stock' => $nuevo_stock]);
        }

        // 🧹 Vaciar el carrito
        $carritoProductoModel->where('id_carrito', $carrito['id_carrito'])->delete();

        return redirect()->to('/factura/' . $id_pedido);
    }
}
