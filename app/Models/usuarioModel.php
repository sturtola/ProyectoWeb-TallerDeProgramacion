<?php

namespace App\Models;

use CodeIgniter\Model;

class usuarioModel extends Model
{
    protected $table      = 'usuario';
    protected $primaryKey = 'id_usuario';

    protected $allowedFields = ['nombre', 'apellido', 'email', 'telefono', 'contraseña', 'rol'];

    public function agregarUsuario($data)
    {
        return $this->insert($data);
    }

    public function obtenerUsuario($id)
    {
        return $this->find($id);
    }

    public function actualizarUsuario($id, $data)
    {
        return $this->update($id, $data);
    }

    public function eliminarUsuario($id)
    {
        return $this->delete($id);
    }
}
