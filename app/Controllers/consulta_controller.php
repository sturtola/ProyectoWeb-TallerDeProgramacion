<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\consultaModel;

class consulta_controller extends BaseController
{
    /**
     * Muestra la lista de consultas para el administrador.
     */
    public function index()
    {
        $model = new consultaModel();
        $data['consultas'] = $model->obtenerConsultas();

        return view('back/consultas/listarConsulta_view', $data);
    }

    /**
     * Elimina una consulta específica por su ID.
     */
    public function eliminar($id)
    {
        $model = new consultaModel();
        $model->delete($id);

        return redirect()->to(base_url('consulta_controller'))->with('message', 'Consulta eliminada exitosamente.');
    }

    /**
     * Guarda una nueva consulta enviada por el usuario.
     */
    public function guardar()
    {
        $validation = \Config\Services::validation();

        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'email'       => $this->request->getPost('email'),
            'telefono'    => $this->request->getPost('telefono'),
            'mensaje'     => $this->request->getPost('mensaje'),
            'fecha_envio' => date('Y-m-d H:i:s'),
        ];

        if (!$this->validate([
            'nombre'  => 'required',
            'email'   => 'required|valid_email',
            'mensaje' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $model = new consultaModel();
        $model->insert($data);

        return redirect()->to(base_url('/Contacto#formulario'))->with('message', '¡Tu consulta fue enviada con éxito!');
    }
}