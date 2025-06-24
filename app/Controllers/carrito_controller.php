<?php

namespace App\Controllers;

use App\Models\productoModel;
use App\Models\carritoModel;
use App\Models\carritoProductoModel;

class Carrito_controller extends BaseController
{
    public function agregar()
    {
        $session = session();

        if (!$session->get('logueado') || $session->get('rol') !== 'cliente') {
            return redirect()->to('/IniciarSesion#inicio-sesion');
        }

        $id_usuario = $session->get('id_usuario');
        $id_producto = $this->request->getPost('id_producto');
        $cantidad = (int) $this->request->getPost('cantidad');

        $productoModel = new ProductoModel();
        $carritoModel = new CarritoModel();
        $carritoProductoModel = new CarritoProductoModel();

        $producto = $productoModel->find($id_producto);
        if (!$producto || $producto['stock'] < $cantidad) {
            return redirect()->back()->with('error', 'Stock insuficiente.');
        }

        $carrito = $carritoModel->where('id_usuario', $id_usuario)
            ->where('estado', 'activo')
            ->first();

        if (!$carrito) {
            $carrito_id = $carritoModel->insert([
                'id_usuario' => $id_usuario,
                'estado' => 'activo',
                'fecha_creacion' => date('Y-m-d H:i:s'),
                'subtotal' => 0,
                'total' => 0
            ]);
        } else {
            $carrito_id = $carrito['id_carrito'];
        }

        $carritoProducto = $carritoProductoModel->where('id_carrito', $carrito_id)
            ->where('id_producto', $id_producto)
            ->first();

        if ($carritoProducto) {
            $nuevaCantidad = $carritoProducto['cantidad'] + $cantidad;
            if ($nuevaCantidad > $producto['stock']) {
                return redirect()->back()->with('error', 'No hay suficiente stock.');
            }
            $carritoProductoModel->update($carritoProducto['id_carrito_producto'], [
                'cantidad' => $nuevaCantidad,
                'subtotal' => $producto['precio'] * $nuevaCantidad
            ]);
        } else {
            $carritoProductoModel->insert([
                'id_carrito' => $carrito_id,
                'id_producto' => $id_producto,
                'cantidad' => $cantidad,
                'subtotal' => $producto['precio'] * $cantidad
            ]);
        }

        $productosCarrito = $carritoProductoModel->where('id_carrito', $carrito_id)->findAll();
        $nuevoSubtotal = array_sum(array_map(fn($p) => $p['subtotal'], $productosCarrito));

        $carritoModel->update($carrito_id, [
            'subtotal' => $nuevoSubtotal,
            'total' => $nuevoSubtotal
        ]);

        session()->setFlashdata('abrir_carrito', true);
        return redirect()->back()->with('success', 'Producto añadido al carrito.');
    }

    public function vaciar()
    {
        $session = session();
        $id_usuario = $session->get('id_usuario');

        $carritoModel = new CarritoModel();
        $carrito = $carritoModel
            ->where('id_usuario', $id_usuario)
            ->where('estado', 'activo')
            ->first();

        if ($carrito) {
            $carritoProductoModel = new CarritoProductoModel();
            $carritoProductoModel
                ->where('id_carrito', $carrito['id_carrito'])
                ->delete();
        }

        session()->setFlashdata('abrir_carrito', true);
        return $this->response->setJSON(['success' => true]);
    }

    public function finalizarCompra()
    {
        $session = session();
        $id_usuario = $session->get('id_usuario');

        if (!$id_usuario) {
            return redirect()->to('/IniciarSesion');
        }

        $entrega = $this->request->getPost('tipo_entrega'); // 'envio' o 'retiro'
        $metodo_pago = $this->request->getPost('metodo_pago');

        $id_domicilio = null;

        if ($entrega === 'envio') {
            // Validar campos obligatorios del domicilio
            $calle = trim($this->request->getPost('calle'));
            $numero = trim($this->request->getPost('numero'));
            $provincia = trim($this->request->getPost('provincia'));
            $descripcion = trim($this->request->getPost('descripcion')); // opcional

            if (empty($calle) || empty($numero) || empty($provincia)) {
                return redirect()->back()->with('error', 'Debe completar todos los campos obligatorios del domicilio.');
            }

            $domicilioModel = new \App\Models\domicilioModel();

            // Insert domicilio, revisar si falla
            $id_domicilio = $domicilioModel->insert([
                'id_usuario' => $id_usuario,
                'calle' => $calle,
                'numero' => $numero,
                'provincia' => $provincia,
                'descripcion' => $descripcion
            ]);

            if (!$id_domicilio) {
                return redirect()->back()->with('error', 'Error al guardar el domicilio.');
            }
        }

        $carritoModel = new \App\Models\carritoModel();
        $carritoProductoModel = new \App\Models\carritoProductoModel();
        $pedidoModel = new \App\Models\pedidoModel();
        $pedidoProductoModel = new \App\Models\pedidoProductoModel();

        $carrito = $carritoModel->where('id_usuario', $id_usuario)
            ->where('estado', 'activo')
            ->first();

        if (!$carrito) {
            return redirect()->back()->with('error', 'Carrito no encontrado.');
        }

        $productos = $carritoProductoModel->where('id_carrito', $carrito['id_carrito'])->findAll();

        if (empty($productos)) {
            return redirect()->back()->with('error', 'El carrito está vacío.');
        }

        $id_pedido = $pedidoModel->insert([
            'id_usuario' => $id_usuario,
            'tipo_entrega' => $entrega,
            'domicilio_entrega' => $id_domicilio,
            'metodo_pago' => $metodo_pago,
            'subtotal' => $carrito['subtotal'],
            'total' => $carrito['total'],
            'estado' => 'pendiente'
        ]);

        foreach ($productos as $prod) {
            $pedidoProductoModel->insert([
                'id_pedido' => $id_pedido,
                'id_producto' => $prod['id_producto'],
                'cantidad' => $prod['cantidad'],
                'precio_unitario' => $prod['subtotal'] / $prod['cantidad'],
                'subtotal' => $prod['subtotal']
            ]);
        }

        // Vaciar carrito
        $carritoProductoModel->where('id_carrito', $carrito['id_carrito'])->delete();
        $carritoModel->update($carrito['id_carrito'], ['subtotal' => 0, 'total' => 0]);

        return redirect()->to('/pedido/factura/' . $id_pedido);
    }
}