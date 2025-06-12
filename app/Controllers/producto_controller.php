<?php

namespace App\Controllers;

use App\Models\productoModel;
use CodeIgniter\Controller;

class producto_controller extends Controller
{
    protected $productoModel;

    public function __construct()
    {
        $this->productoModel = new productoModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data['productos'] = $this->productoModel->findAll();
        return view('back/productos/listaproductos_view', $data);
    }

    public function agregar()
    {
        return view('back/productos/agregaproducto_view');
    }

    public function guardar()
    {
        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio'      => $this->request->getPost('precio'),
            'stock'       => $this->request->getPost('stock'),
            'imagen_url'  => $this->request->getPost('imagen_url'),
            'categoria'   => $this->request->getPost('categoria'),
            'marca'       => $this->request->getPost('marca'),
            'material'    => $this->request->getPost('material'),
            'modelo'      => $this->request->getPost('modelo'),
            'descuento'   => $this->request->getPost('descuento'),
        ];

        $this->productoModel->agregarProducto($data);
        return redirect()->to('/producto_controller');
    }

    public function editar($id)
    {
        $data['producto'] = $this->productoModel->obtenerProducto($id);
        return view('back/productos/editarproducto_view', $data);
    }

    public function actualizar($id)
    {
        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio'      => $this->request->getPost('precio'),
            'stock'       => $this->request->getPost('stock'),
            'imagen_url'  => $this->request->getPost('imagen_url'),
            'categoria'   => $this->request->getPost('categoria'),
            'marca'       => $this->request->getPost('marca'),
            'material'    => $this->request->getPost('material'),
            'modelo'      => $this->request->getPost('modelo'),
            'descuento'   => $this->request->getPost('descuento'),
        ];

        $this->productoModel->actualizarProducto($id, $data);
        return redirect()->to('/producto_controller');
    }

    public function eliminar($id)
    {
        $this->productoModel->eliminarProducto($id);
        return redirect()->to('/producto_controller');
    }

    public function catalogo (){

        $model = new productoModel();
        $data ['productos'] = $model->findAll();

        return view('pages/catalogo', $data);
    }
}