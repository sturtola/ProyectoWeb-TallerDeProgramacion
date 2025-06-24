<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\pedidoModel;
use App\Models\pedidoProductoModel;
use App\Models\usuarioModel;
use App\Models\domicilioModel;

class adminPedidoController extends BaseController
{
    protected $pedidoModel;
    protected $pedidoProductoModel;
    protected $usuarioModel;
    protected $domicilioModel;

    public function __construct()
    {
        $this->pedidoModel = new PedidoModel();
        $this->pedidoProductoModel = new PedidoProductoModel();
        $this->usuarioModel = new UsuarioModel();
        $this->domicilioModel = new DomicilioModel();
    }

    // Lista todos los pedidos
    public function index()
    {
        $pedidos = $this->pedidoModel->orderBy('id_pedido', 'DESC')->findAll();

        // Para cada pedido, podés traer el usuario y domicilio para mostrar info
        foreach ($pedidos as &$pedido) {
            $pedido['usuario'] = $this->usuarioModel->find($pedido['id_usuario']);
            $pedido['domicilio'] = $pedido['id_domicilio'] ? $this->domicilioModel->find($pedido['id_domicilio']) : null;
        }

        return view('admin/pedidos/listado', ['pedidos' => $pedidos]);
    }

    // Ver detalle de un pedido
    public function ver($id_pedido)
    {
        $pedido = $this->pedidoModel->find($id_pedido);

        if (!$pedido) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pedido no encontrado");
        }

        $usuario = $this->usuarioModel->find($pedido['id_usuario']);
        $domicilio = $pedido['id_domicilio'] ? $this->domicilioModel->find($pedido['id_domicilio']) : null;
        $productos = $this->pedidoProductoModel->where('id_pedido', $id_pedido)->findAll();

        return view('admin/pedidos/ver', [
            'pedido' => $pedido,
            'usuario' => $usuario,
            'domicilio' => $domicilio,
            'productos' => $productos,
        ]);
    }

    // Cambiar estado del pedido (por ejemplo, de pendiente a pagado, enviado, etc.)
    public function cambiarEstado()
    {
        $id_pedido = $this->request->getPost('id_pedido');
        $nuevoEstado = $this->request->getPost('estado');

        $pedido = $this->pedidoModel->find($id_pedido);

        if (!$pedido) {
            return $this->response->setJSON(['success' => false, 'message' => 'Pedido no encontrado']);
        }

        $this->pedidoModel->update($id_pedido, ['estado' => $nuevoEstado]);

        return $this->response->setJSON(['success' => true]);
    }
}