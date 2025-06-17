<?php

namespace App\Controllers;

use App\Models\productoModel;
use CodeIgniter\Controller;

class Catalogo extends Controller {
    public function index(){
        $model = new productoModel();
        $productos = $model->findAll();

        $marcasDisponibles = array_column(
            $model->select('marca')->distinct()->findAll(),
            'marca'
        );

        $categoriasDisponibles = array_column(
            $model->select('categoria')->distinct()->findAll(),
            'categoria'
        );

        $materiales = array_column(
            $model->select('material')->distinct()->findAll(),
            'material'
        );

        // FILTROS GET

        $busqueda = $this->request->getGet('busqueda');
        $marcas = $this->request->getGet('marca');
        $categorias= $this->request->getGet('categoria');
        $materiales = $this->request->getGet('material');
        $precioMin = $this->request->getGet('precio_min');
        $precioMax = $this->request->getGet('precio_max');

        $builder = $model;

        if (!empty($busqueda)){
            $builder = $builder->like('nombre', $busqueda);
        }

        if (!empty($marcas)){
            $builder = $builder->whereIn('marca', $marcas);
        }

        if (!empty($categorias)){
            $builder = $builder->whereIn('categoria', $categorias);
        }

        if (!empty($materiales)){
            $builder = $builder->whereIn('material', $materiales);
        }

        if (!empty($precioMin)){
            $builder = $builder->where('precio >=', $precioMin);
        }

        if (!empty($precioMax)){
            $builder = $builder->where('precio <=', $precioMax);
        }

        $productos = $builder->findAll();

        return view('templates/main_layout', [
            'title' => 'Catálogo', 
            'content' => view('pages/catalogo', [
                'productos' => $productos,
                'marcasDisponibles' => $marcasDisponibles,
                'categoriasDisponibles' => $categoriasDisponibles,
                'materiales' => $materiales
                ])
        ]);
    }
}