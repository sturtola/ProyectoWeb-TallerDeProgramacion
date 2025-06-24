<?php

namespace App\Models;
use CodeIgniter\Model;

class pedidoModel extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'id_pedido';
    protected $allowedFields = [
        'id_usuario', 'id_domicilio', 'metodo_pago', 'tipo_entrega', 'subtotal', 'total', 'estado', 'fecha_pedido'
    ];
}