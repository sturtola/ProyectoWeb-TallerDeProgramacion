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

        return $this->response->setJSON(['success' => true]);
    }
}
