<?php

namespace App\Controllers;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class UsuarioController extends Controller
{
    public function index()
    {
        $model = new UsuarioModel();
        $data['usuario'] = $model->findAll();
        return view('back/usuario/listarUsuarios_view', $data);
    }

    public function agregar()
    {
        return view('back/usuario/agregarUsuario_view');
    }

    public function guardar()
    {
        $model = new UsuarioModel();
        $model->insert([
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'telefono' => 'no',
            'contraseña' => $this->request->getPost('contraseña'),
            'rol' => 'no'
        ]);
        return redirect()->to('/usuario');
    }
}
