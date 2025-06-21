<?php

namespace App\Controllers;

class Usuario extends BaseController
{
    public function index()
    {
        return view('pages/agregarusuario');
    }
}