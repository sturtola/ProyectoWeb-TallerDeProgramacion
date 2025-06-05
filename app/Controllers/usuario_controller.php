<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Usuario extends BaseController
{
    protected $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    // ✅ Método para verificar si el usuario es admin
    private function esAdmin()
    {
        return session()->get('isLoggedIn') && session()->get('rol') === 'admin';
    }

    public function index()
    {
        if (!$this->esAdmin()) {
            return redirect()->to('/')->with('error', 'Acceso no autorizado');
        }

        $data['usuarios'] = $this->usuarioModel->findAll();
        return view('back/listar_usuarios', $data);
    }

    public function crear()
    {
        if (!$this->esAdmin()) {
            return redirect()->to('/')->with('error', 'Acceso no autorizado');
        }

        return view('back/agregar_usuario');
    }

    public function guardar()
    {
        if (!$this->esAdmin()) {
            return redirect()->to('/')->with('error', 'Acceso no autorizado');
        }

        $this->usuarioModel->insert([
            'nombre'      => $this->request->getPost('nombre'),
            'apellido'    => $this->request->getPost('apellido'),
            'telefono'    => $this->request->getPost('telefono'),
            'email'       => $this->request->getPost('email'),
            'contraseña' => password_hash($this->request->getPost('contraseña'), PASSWORD_DEFAULT),
            'rol'         => 'cliente',
        ]);

        return redirect()->to(site_url('usuario'));
    }

    public function editar($id)
    {
        if (!$this->esAdmin()) {
            return redirect()->to('/')->with('error', 'Acceso no autorizado');
        }

        $data['usuario'] = $this->usuarioModel->find($id);
        return view('back/editar_usuario', $data);
    }

    public function actualizar($id)
    {
        if (!$this->esAdmin()) {
            return redirect()->to('/')->with('error', 'Acceso no autorizado');
        }

        $this->usuarioModel->update($id, [
            'nombre'   => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'telefono' => $this->request->getPost('telefono'),
            'email'    => $this->request->getPost('email'),
            'contraseña' => $this->request->getPost('contraseña'),
            'rol'      => 'cliente',
        ]);

        return redirect()->to(site_url('usuario'));
    }

    public function eliminar($id)
    {
        if (!$this->esAdmin()) {
            return redirect()->to('/')->with('error', 'Acceso no autorizado');
        }

        $this->usuarioModel->delete($id);
        return redirect()->to(site_url('usuario'));
    }
}
