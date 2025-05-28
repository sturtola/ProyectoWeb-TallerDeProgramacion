<?php

namespace App\Models;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';

    protected $allowedFields = ['nombre', 'apellido', 'email', 'telefono', 'contraseña', 'rol'];
}
