<?php
namespace App\Controllers;

use App\Models\pedidoModel;
use App\Models\pedidoProductoModel;
use App\Models\domicilioModel;

class factura_controller extends BaseController
{
    public function ver($id_pedido)
    {
        $pedidoModel = new PedidoModel();
        $pedidoProductoModel = new PedidoProductoModel();
        $domicilioModel = new DomicilioModel();

        // Obtener datos del pedido
        $pedido = $pedidoModel->find($id_pedido);
        if (!$pedido) {
            return redirect()->to('/catalogo')->with('error', 'Pedido no encontrado.');
        }

        // Obtener productos del pedido
        $productos = $pedidoProductoModel->where('id_pedido', $id_pedido)->findAll();

        // Obtener domicilio si existe
        $domicilio = null;
        if ($pedido['id_domicilio']) {
            $domicilio = $domicilioModel->find($pedido['id_domicilio']);
        }

        // Pasar datos a la vista
        return view('factura/ver', [
            'pedido' => $pedido,
            'productos' => $productos,
            'domicilio' => $domicilio
        ]);
    }
}