<?php

namespace App\Models;

use CodeIgniter\Model;

class productoModel extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id_producto';

    protected $allowedFields = [
        'nombre', 'descripcion', 'precio', 'stock', 'imagen_url',
        'categoria', 'marca', 'material', 'modelo', 'descuento'
    ];

    public function agregarProducto($data)
    {
        return $this->insert($data);
    }

    public function obtenerProducto($id)
    {
        return $this->find($id);
    }

    public function actualizarProducto($id, $data)
    {
        return $this->update($id, $data);
    }

    public function eliminarProducto($id)
    {
        return $this->delete($id);
    }
}