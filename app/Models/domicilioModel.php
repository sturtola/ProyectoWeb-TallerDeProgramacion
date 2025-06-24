<?php

namespace App\Models;

use CodeIgniter\Model;

class DomicilioModel extends Model
{
    protected $table = 'domicilio';
    protected $primaryKey = 'id_domicilio';

    protected $allowedFields = [
        'id_usuario',
        'calle',
        'numero',
        'provincia',
        'descripcion'
    ];

    protected $returnType = 'array';
}