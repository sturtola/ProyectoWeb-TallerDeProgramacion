<?php

namespace App\Models;
use CodeIgniter\Model;

class CarritoProductoModel extends Model
{
    protected $table = 'carritoproducto';
    protected $primaryKey = 'id_carrito_producto';
    protected $allowedFields = ['id_carrito', 'id_producto', 'cantidad', 'subtotal'];
    protected $returnType = 'array';
    public $timestamps = false;
}