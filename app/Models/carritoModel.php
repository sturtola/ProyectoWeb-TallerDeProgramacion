<?php

namespace App\Models;
use CodeIgniter\Model;

class CarritoModel extends Model
{
    protected $table = 'carrito';
    protected $primaryKey = 'id_carrito';
    protected $allowedFields = [
        'id_usuario', 'estado', 'fecha_creacion', 'tipo_entrega', 'id_domicilio',
        'total', 'subtotal', 'descuento', 'metodo_pago', 'monto_envio'
    ];
    protected $returnType = 'array';
    public $timestamps = false;
}