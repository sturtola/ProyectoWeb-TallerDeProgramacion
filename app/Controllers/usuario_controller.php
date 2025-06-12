<?php

namespace App\Controllers;

use App\Models\usuarioModel;
use CodeIgniter\Controller;

class usuario_controller extends Controller
{
    protected $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new usuarioModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data['usuarios'] = $this->usuarioModel->findAll();
        return view('back/usuarios/listausuarios_view', $data);
    }

    public function agregar()
    {
        return view('back/usuarios/agregausuario_view');
    }

    public function guardar()
    {
        $data = [
            'nombre'     => $this->request->getPost('nombre'),
            'apellido'   => $this->request->getPost('apellido'),
            'email'      => $this->request->getPost('email'),
            'telefono'   => $this->request->getPost('telefono'),
            'contraseña' => password_hash($this->request->getPost('contraseña'), PASSWORD_DEFAULT),
            'rol'        => $this->request->getPost('rol')
        ];

        $this->usuarioModel->agregarUsuario($data);
        return redirect()->to('/usuario_controller');
    }

    public function editar($id)
    {
        $data['usuario'] = $this->usuarioModel->obtenerUsuario($id);
        return view('back/usuarios/editarusuario_view', $data);
    }

    public function actualizar($id)
    {
        $data = [
            'nombre'   => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email'    => $this->request->getPost('email'),
            'telefono' => $this->request->getPost('telefono'),
            'rol'      => $this->request->getPost('rol')
        ];

        if ($this->request->getPost('contraseña')) {
            $data['contraseña'] = password_hash($this->request->getPost('contraseña'), PASSWORD_DEFAULT);
        }

        $this->usuarioModel->actualizarUsuario($id, $data);
        return redirect()->to('/usuario_controller');
    }

    public function eliminar($id)
    {
        $this->usuarioModel->eliminarUsuario($id);
        return redirect()->to('/usuario_controller');
    }
}
