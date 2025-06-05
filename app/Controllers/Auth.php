<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Auth extends BaseController
{
    public function registrar()
    {
        $usuarioModel = new UsuarioModel();

        // Validar que el email no esté registrado
        $email = $this->request->getPost('email');
        if ($usuarioModel->where('email', $email)->first()) {
            return redirect()->back()->with('error', 'El email ya está registrado');
        }

        // Insertar usuario nuevo
        $usuarioModel->insert([
            'nombre'      => $this->request->getPost('nombre'),
            'apellido'    => $this->request->getPost('apellido'),
            'email'       => $this->request->getPost('email'),
            'telefono'    => $this->request->getPost('telefono'),
            'contraseña' => password_hash($this->request->getPost('contraseña'), PASSWORD_DEFAULT),
            'rol'         => 'cliente'
        ]);

        return redirect()->to('/login')->with('success', 'Registro exitoso. Iniciá sesión.');
    }

    public function login()
    {
        $usuarioModel = new UsuarioModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('contraseña');

        $usuario = $usuarioModel->where('email', $email)->first();

        if ($usuario && password_verify($password, $usuario['contraseña'])) {
            // Login exitoso
            session()->set([
                'id_usuario' => $usuario['id_usuario'],
                'nombre'     => $usuario['nombre'],
                'rol'        => $usuario['rol'],
                'isLoggedIn' => true
            ]);

            // Redirigir según rol
            if ($usuario['rol'] === 'admin') {
                return redirect()->to('/usuario'); // panel admin
            } else {
                return redirect()->to('/'); // página principal para estudiantes
            }
        } else {
            return redirect()->back()->with('error', 'Email o contraseña incorrectos');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Sesión cerrada');
    }
}
