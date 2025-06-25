<?php

namespace App\Controllers;

use App\Models\usuarioModel;

class Auth extends BaseController
{
    public function registrar()
    {
        $validationRules = [
            'nombre' => 'required|min_length[2]',
            'apellido' => 'required|min_length[2]',
            'email' => 'required|valid_email|is_unique[usuario.email]',
            'telefono' => 'required|numeric|min_length[7]|max_length[15]',
            'contraseña' => 'required|min_length[6]',
            'contraseña_confirmar' => 'required|matches[contraseña]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/Registrarse#inicio-registro')->withInput()->with('error', 'Revisá los datos ingresados.')->with('validation', $this->validator);
        }

        $usuarioModel = new UsuarioModel();

        $usuarioModel->insert([
            'nombre'      => $this->request->getPost('nombre'),
            'apellido'    => $this->request->getPost('apellido'),
            'email'       => $this->request->getPost('email'),
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

        if (!$usuario || !password_verify($password, $usuario['contraseña'])) {
            return redirect()->back()->withInput()->with('error', 'Credenciales incorrectas.');
        }

        if ($ingresarComoAdmin && $usuario['rol'] !== 'admin') {
            return redirect()->back()->withInput()->with('error', 'Acceso denegado');
        }

        session()->set([
            'id_usuario' => $usuario['id_usuario'],
            'nombre'     => $usuario['nombre'],
            'rol'        => $usuario['rol'],
            'logueado'   => true
        ]);

        if ($usuario['rol'] === 'admin') {
            return redirect()->to('/admin/index');
        } else {
            return redirect()->to('/catalogo#inicio-productos');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/IniciarSesion#inicio-sesion')->with('success', 'Sesión cerrada');
    }
}
