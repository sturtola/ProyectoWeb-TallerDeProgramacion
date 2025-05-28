<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        // Cargar la página de inicio
        return view('templates/main_layout', [
            'title' => 'Inicio - Auren',
            'content' => view('pages/auren')
        ]);
    }
    
    public function about()
    {
        // Cargar la página "Quiénes Somos"
        return view('templates/main_layout', [
            'title' => 'Quiénes Somos - Auren',
            'content' => view('pages/nosotros')
        ]);
    }
    
    public function terms()
    {
        // Cargar la página de "Términos y Condiciones"
        return view('templates/main_layout', [
            'title' => 'Términos y Usos - Auren',
            'content' => view('pages/condiciones')
        ]);
    }

    public function comercialization()
    {
        // Cargar la página de "Comercialización"
        return view('templates/main_layout', [
            'title' => 'Comercialización - Auren',
            'content' => view('pages/comercializacion')
        ]);
    }

    public function mantenimiento()
    {
        // Cargar la página de "Comercialización"
        return view('templates/main_layout', [
            'title' => 'Mantenimiento - Auren',
            'content' => view('pages/mantenimiento')
        ]);
    }
    
    public function login()
    {
        // Cargar la página de "Inicio de Sesion"
        return view('templates/main_layout', [
            'title' => 'Iniciar Sesión - Auren',
            'content' => view('pages/inicioSesion')
        ]);
    }
}
