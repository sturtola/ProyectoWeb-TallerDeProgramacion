<?php

namespace App\Controllers;

class Contact extends BaseController
{
    public function index()
    {
        // Cargar la página de contacto
        return view('templates/main_layout', [
            'title' => 'Contacto - Mi Tienda',
            'content' => view('pages/contacto')
        ]);
    }
    
    public function send()
    {
        // Reglas de validación
        $rules = [
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'phone' => 'required|regex_match[/^[0-9\-\s\(\)]+$/]',
            'message' => 'required|min_length[10]'
        ];

        // Mensajes de error personalizados
        $messages = [
            'name' => [
                'required' => 'El nombre es obligatorio.',
                'min_length' => 'El nombre debe tener al menos 3 caracteres.'
            ],
            'email' => [
                'required' => 'El correo electrónico es obligatorio.',
                'valid_email' => 'Por favor, introduce un correo electrónico válido.'
            ],
            'phone' => [
                'required' => 'El teléfono es obligatorio.',
                'regex_match' => 'El teléfono solo puede contener números, espacios y paréntesis.'
            ],
            'message' => [
                'required' => 'El mensaje es obligatorio.',
                'min_length' => 'El mensaje debe tener al menos 10 caracteres.'
            ]
        ];

        // Validación
        if (!$this->validate($rules, $messages)) {
            return redirect()->back()
                             ->withInput()
                             ->with('validation', $this->validator);
        }

        // Si la validación pasa, podrías enviar email, guardar en base, etc.
    
        return redirect()->to('/Contacto')
                         ->with('message', 'Gracias por contactarnos. Te responderemos a la brevedad.');
    }
}