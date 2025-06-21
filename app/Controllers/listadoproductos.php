<?php

namespace App\Controllers;

class ListadoProductos extends BaseController
{
    public function index()
    {
        return view('pages/listaproductos');
    }
}