<?php

namespace App\Controllers;

class Consultas extends BaseController
{
    public function index()
    {
        return view('pages/listaconsultas');
    }
}