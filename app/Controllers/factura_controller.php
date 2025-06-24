<?php

namespace App\Controllers;

use App\Models\pedidoModel;
use App\Models\pedidoProductoModel;
use App\Models\domicilioModel;
use App\Models\usuarioModel;

class factura_controller extends BaseController
{

    public function index()
    {

        $pedidoModel = new \App\Models\pedidoModel();
        $usuarioModel = new \App\Models\usuarioModel();

        // Obtenemos todos los pedidos ordenados por fecha
        $pedidos = $pedidoModel->orderBy('fecha_pedido', 'DESC')->findAll();

        // Traemos el usuario asociado a cada pedido
        foreach ($pedidos as &$pedido) {
            $pedido['usuario'] = $usuarioModel->find($pedido['id_usuario']);
        }

        return view('back/facturas/listarFacturas_view', ['pedidos' => $pedidos]);
    }


    public function ver($id_pedido)
    {
        $pedidoModel = new PedidoModel();
        $pedidoProductoModel = new PedidoProductoModel();
        $domicilioModel = new DomicilioModel();
        $usuarioModel = new UsuarioModel();

        $pedido = $pedidoModel->find($id_pedido);
        if (!$pedido) {
            return redirect()->to('/catalogo')->with('error', 'Pedido no encontrado.');
        }

        $productos = $pedidoProductoModel->where('id_pedido', $id_pedido)->findAll();

        if ($pedido['id_domicilio']) {
            $pedido['domicilio'] = $domicilioModel->find($pedido['id_domicilio']);
        }

        $usuario = $usuarioModel->find($pedido['id_usuario']);
        if ($usuario) {
            $pedido['nombre'] = $usuario['nombre'];
            $pedido['apellido'] = $usuario['apellido'];
            $pedido['email'] = $usuario['email'];
            $pedido['telefono'] = $usuario['telefono'];
        }

        return view('pages/factura', [
            'pedido' => $pedido,
            'productos' => $productos
        ]);
    }
}
