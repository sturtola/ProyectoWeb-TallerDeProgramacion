<?php

namespace App\Controllers;

use App\Models\consultaModel;
use CodeIgniter\Controller;

class consulta_controller extends Controller
{
    protected $consultaModel;

    public function __construct()
    {
        $this->consultaModel = new consultaModel();
        helper(['form', 'url']);
    }

    // Mostrar todas las consultas (para admins)
    public function index()
    {
        $data['consultas'] = $this->consultaModel->obtenerConsultas();
        return view('back/consultas/listarconsultas_view', $data);
    }

    // Guardar una consulta desde el formulario
    public function guardar()
    {
        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'email'       => $this->request->getPost('email'),
            'telefono'    => $this->request->getPost('telefono'),
            'mensaje'     => $this->request->getPost('mensaje'),
            'fecha_envio' => date('Y-m-d H:i:s')
        ];

        $this->consultaModel->agregarConsulta($data);
        return redirect()->to('/Contacto')->with('mensaje', 'Consulta enviada correctamente.');
    }

    public function eliminar($id)
    {
        $this->consultaModel->eliminarConsulta($id);
        return redirect()->to('/consulta_controller');
    }
}