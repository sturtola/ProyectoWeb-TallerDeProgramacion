<?php

namespace App\Controllers;

use App\Models\pedidoModel;
use App\Models\pedidoProductoModel;
use App\Models\carritoModel;
use App\Models\carritoProductoModel;
use App\Models\productoModel;
use App\Models\domicilioModel;

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
        $id_domicilio = null;

        if ($tipo_entrega === 'envio') {
            $id_domicilio = $this->request->getPost('id_domicilio');
        }

        $subtotal = array_sum(array_column($productos, 'subtotal'));
        $costo_envio = ($tipo_entrega === 'envio') ? 7200 : 0;
        $total = $subtotal + $costo_envio;

        // Insertar pedido
        $id_pedido = $pedidoModel->insert([
            'id_usuario' => $id_usuario,
            'id_domicilio' => $id_domicilio,
            'metodo_pago' => $metodo_pago,
            'tipo_entrega' => $tipo_entrega,
            'subtotal' => $subtotal,
            'total' => $total,
            'estado' => 'pendiente'
        ]);

        // Insertar productos del pedido
        foreach ($productos as $item) {
            $producto = $productoModel->find($item['id_producto']);
            $cantidad = $item['cantidad'];
            $precio_unitario = $producto ? $producto['precio'] : 0;
            $nombre_producto = $producto ? $producto['nombre'] : 'Producto desconocido';
            $pedidoProductoModel->insert([
                'id_pedido' => $id_pedido,
                'id_producto' => $item['id_producto'],
                'cantidad' => $cantidad,
                'precio_unitario' => $precio_unitario,
                'subtotal' => $precio_unitario * $cantidad,
                'nombre_producto' => $nombre_producto
            ]);
        }

        // Vaciar el carrito
        $carritoProductoModel->where('id_carrito', $carrito['id_carrito'])->delete();

        return redirect()->to('/factura/' . $id_pedido);
    }
}