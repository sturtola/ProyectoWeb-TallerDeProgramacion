<?php

namespace App\Models;

use CodeIgniter\Model;

class consultaModel extends Model
{
    protected $table = 'consulta';
    protected $primaryKey = 'id_consulta';

    protected $allowedFields = ['nombre', 'email', 'telefono', 'mensaje', 'fecha_envio'];

    public function agregarConsulta($data)
    {
        return $this->insert($data);
    }

    public function obtenerConsultas()
    {
        return $this->orderBy('fecha_envio', 'DESC')->findAll();
    }

    public function eliminarConsulta($id)
    {
        return $this->delete($id);
    }
}