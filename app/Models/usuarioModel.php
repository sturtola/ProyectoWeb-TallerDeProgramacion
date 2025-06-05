<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table      = 'usuario';           // nombre exacto de tu tabla
    protected $primaryKey = 'id_usuario';        // clave primaria correcta

    protected $allowedFields = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'contraseña',
        'rol'
    ];

    protected $returnType = 'array';
    protected $useTimestamps = false;
}

