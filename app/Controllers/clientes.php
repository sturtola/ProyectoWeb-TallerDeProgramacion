<?php

namespace App\Controllers;

class Clientes extends BaseController
{
    public function index()
    {
        return view('pages/listaclientes');
    }
}