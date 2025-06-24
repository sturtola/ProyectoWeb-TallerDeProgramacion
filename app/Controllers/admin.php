<?php

namespace App\Controllers;

use App\Models\productoModel;
use App\Models\usuarioModel;
use App\Models\consultaModel;
use App\Models\pedidoModel;

class admin extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('logueado') || $session->get('rol') !== 'admin') {
            return redirect()->to('/IniciarSesion#inicio-sesion')->with('error', 'Acceso denegado.');
        }
        return view('pages/administracion');
    }

    public function productos()
    {
        $session = session();
        if (!$session->get('logueado') || $session->get('rol') !== 'admin') {
            return redirect()->to('/IniciarSesion#inicio-sesion')->with('error', 'Acceso denegado.');
        }
        return ('producto_controller/index');
    }

    public function usuarios()
    {
        $session = session();
        if (!$session->get('logueado') || $session->get('rol') !== 'admin') {
            return redirect()->to('/IniciarSesion#inicio-sesion')->with('error', 'Acceso denegado.');
        }
        return ('usuario_controller/index');
    }

    public function consultas()
    {
        $session = session();
        if (!$session->get('logueado') || $session->get('rol') !== 'admin') {
            return redirect()->to('/IniciarSesion#inicio-sesion')->with('error', 'Acceso denegado.');
        }
        return ('consulta_controller/index');
    }

    public function pedidos()
    {
        $session = session();
        if (!$session->get('logueado') || $session->get('rol') !== 'admin') {
            return redirect()->to('/IniciarSesion#inicio-sesion')->with('error', 'Acceso denegado.');
        }
        return ('pedidoAdmin_controller/index');
    }

    public function facturas()
    {
        $session = session();
        if (!$session->get('logueado') || $session->get('rol') !== 'admin') {
            return redirect()->to('/IniciarSesion#inicio-sesion')->with('error', 'Acceso denegado.');
        }
        return ('factura_controller/index');
    }

    public function recuento(){
        $productoModel = new productoModel();
        $usuarioModel = new usuarioModel();
        $pedidoModel = new pedidoModel();
        $consultaModel = new consultaModel();

        $data['totalProductos'] = $productoModel->countAll();
        $data['totalClientes']  = $usuarioModel->where('rol', 'cliente')->countAllResults();
        $data['totalConsultas'] = $consultaModel->countAll();
        $data['pedidosPendientes']   = $pedidoModel->where('estado', 'pendiente')->countAllResults();
        $data['pedidosEnviados']     = $pedidoModel->where('estado', 'enviado')->countAllResults();

        return $this->response->setJSON($data);
        
    }

    
}


