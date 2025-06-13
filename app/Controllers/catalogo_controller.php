<?php

namespace App\Controllers;

use App\Models\productoModel;
use CodeIgniter\Controller;

class catalogo extends Controller {
    public function index(){
        $model = new productoModel();
        $data ['productos'] = $model->findAll();

        return view('pages/catalogo', $data);
    }
}