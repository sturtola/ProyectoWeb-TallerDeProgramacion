<?php

namespace App\Models;

use CodeIgniter\Model;

class consultaModel extends Model
{
    protected $table = 'consulta';
    protected $primaryKey = 'id_consulta';

    protected $allowedFields = ['nombre', 'email', 'telefono', 'mensaje', 'fecha_envio'];

    protected $useTimestamps = false;

    /**
     * Obtiene todas las consultas ordenadas por fecha de envío descendente.
     */
    public function obtenerConsultas()
    {
        return $this->orderBy('fecha_envio', 'DESC')->findAll();
    }
}
