<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Auth extends BaseController
{
    public function registrar()
    {
        $usuarioModel = new UsuarioModel();

        $email = $this->request->getPost('email');
        if ($usuarioModel->where('email', $email)->first()) {
            return redirect()->to('/IniciarSesion#inicio-sesion')->with('error', 'El email ya está registrado');
        }

        $usuarioModel->insert([
            'nombre'      => $this->request->getPost('nombre'),
            'apellido'    => $this->request->getPost('apellido'),
            'email'       => $email,
            'telefono'    => $this->request->getPost('telefono'),
            'contraseña'  => password_hash($this->request->getPost('contraseña'), PASSWORD_DEFAULT),
            'rol'         => 'cliente'
        ]);

        return redirect()->to('/IniciarSesion#inicio-sesion')->with('success', 'Registro exitoso. Iniciá sesión.');
    }

    public function login()
    {
        $usuarioModel = new UsuarioModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('contraseña');
        $ingresarComoAdmin = $this->request->getPost('ingresar_como_admin');

        $usuario = $usuarioModel->where('email', $email)->first();

        if (!$usuario || !password_verify($password, $usuario['contraseña'])){
            return redirect()->to('/IniciarSesion#inicio-sesion')->with('error', 'Credenciales incorrectas.');
        }

        if ($ingresarComoAdmin && $usuario['rol'] !== 'admin'){
            return redirect()->to('/IniciarSesion#inicio-sesion')->with('error', 'Acceso denegado');
        }

        session()->set([
            'id_usuario' => $usuario['id_usuario'],
            'nombre'     => $usuario['nombre'],
            'rol'        => $usuario['rol'],
            'logueado'   => true
        ]);

        if($usuario['rol'] === 'admin'){
            return redirect()->to('/admin/index');
        } else {
            return redirect()->to('/catalogo#inicio-catalogo');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/IniciarSesion#inicio-sesion')->with('success', 'Sesión cerrada');
    }
}