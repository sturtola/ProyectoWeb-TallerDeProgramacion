<?php

namespace App\Controllers;

use App\Models\productoModel;
use App\Models\carritoModel;
use App\Models\carritoProductoModel;
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

        $materialesDisponibles = array_column(
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

        // 🚀 AGREGAR CARGA DE CARRITO DESDE LA BD
        $session = session();
        $carritoData = [];

        if ($session->get('logueado') && $session->get('rol') === 'cliente') {
            $carritoModel = new CarritoModel();
            $carritoProductoModel = new CarritoProductoModel();
            $productoModel = new ProductoModel();

            $carrito = $carritoModel
                ->where('id_usuario', $session->get('id_usuario'))
                ->where('estado', 'activo')
                ->first();

            if ($carrito) {
                $items = $carritoProductoModel
                    ->where('id_carrito', $carrito['id_carrito'])
                    ->findAll();

                foreach ($items as &$item) {
                    $producto = $productoModel->find($item['id_producto']);
                    $item['nombre'] = $producto['nombre'];
                    $item['precio'] = $producto['precio'];
                    $item['stock'] = $producto['stock'];
                }

                $carritoData = $items;
            }
        }

        // 👉 Retornamos todo a la vista principal con layout
        return view('templates/main_layout', [
            'title' => 'Catálogo',
            'carrito' => $carritoData, // se pasa al layout
            'content' => view('pages/catalogo', [
                'productos' => $productos,
                'marcasDisponibles' => $marcasDisponibles,
                'categoriasDisponibles' => $categoriasDisponibles,
                'materialesDisponibles' => $materialesDisponibles
            ])
        ]);
    }
}