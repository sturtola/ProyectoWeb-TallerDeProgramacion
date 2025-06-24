<?php

namespace App\Models;
use CodeIgniter\Model;

class pedidoProductoModel extends Model
{
    protected $table = 'pedidoproducto';
    protected $primaryKey = 'id_pedido_producto';
    protected $allowedFields = [
        'id_pedido', 'id_producto', 'cantidad', 'precio_unitario', 'subtotal', 'nombre_producto'
    ];
}