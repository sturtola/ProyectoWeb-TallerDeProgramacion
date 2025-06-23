<?php

namespace App\Controllers;

use App\Models\carritoProductoModel;
use App\Models\productoModel;
use App\Models\carritoModel;

class CarritoProducto_controller extends BaseController
{
    public function actualizarCantidad()
    {
        $idCarritoProducto = $this->request->getPost('id_carrito_producto');
        $cantidad = $this->request->getPost('cantidad');

        $carritoProductoModel = new carritoProductoModel();
        $producto = $carritoProductoModel->where('id_carrito_producto', $idCarritoProducto)->first();

        if (!$producto) {
            return $this->response->setJSON(['success' => false, 'message' => 'Producto no encontrado']);
        }

        // Obtener el producto real para verificar stock y precio
        $productoModel = new productoModel();
        $productoReal = $productoModel->find($producto['id_producto']);

        if (!$productoReal) {
            return $this->response->setJSON(['success' => false, 'message' => 'Producto inexistente']);
        }

        if ($cantidad > $productoReal['stock']) {
            return $this->response->setJSON(['success' => false, 'message' => 'No hay suficiente stock disponible']);
        }

        $nuevoSubtotal = $cantidad * $productoReal['precio'];

        $carritoProductoModel->update($idCarritoProducto, [
            'cantidad' => $cantidad,
            'subtotal' => $nuevoSubtotal,
        ]);

        return $this->response->setJSON([
            'success' => true,
            'subtotal' => $nuevoSubtotal
        ]);
    }

    public function eliminar()
    {
        $id = $this->request->getPost('id_carrito_producto');

        $model = new CarritoProductoModel();
        $model->delete($id);

        return $this->response->setJSON(['success' => true]);
    }
}
