<?php

return [
    // Reglas básicas
    'required'            => 'El campo {field} es obligatorio.',
    'matches'             => 'El campo {field} no coincide con el campo {param}.',
    'min_length'          => 'El campo {field} debe tener al menos {param} caracteres.',
    'max_length'          => 'El campo {field} no puede superar los {param} caracteres.',
    'exact_length'        => 'El campo {field} debe tener exactamente {param} caracteres.',
    'alpha'               => 'El campo {field} solo puede contener letras.',
    'alpha_numeric'       => 'El campo {field} solo puede contener letras y números.',
    'alpha_numeric_space' => 'El campo {field} solo puede contener letras, números y espacios.',
    'alpha_dash'          => 'El campo {field} solo puede contener letras, números, guiones y guiones bajos.',
    'numeric'             => 'El campo {field} solo puede contener números.',
    'integer'             => 'El campo {field} debe ser un número entero.',
    'decimal'             => 'El campo {field} debe ser un número decimal.',
    'is_natural'          => 'El campo {field} solo puede contener números positivos.',
    'is_natural_no_zero'  => 'El campo {field} debe ser un número mayor que cero.',
    'valid_email'         => 'El campo {field} debe contener un correo electrónico válido.',
    'valid_emails'        => 'El campo {field} debe contener todos los correos electrónicos válidos.',
    'valid_url'           => 'El campo {field} debe contener una URL válida.',
    'valid_ip'            => 'El campo {field} debe contener una IP válida.',
    'is_unique'           => 'El valor del campo {field} ya está registrado.',
    'in_list'             => 'El campo {field} debe ser uno de: {param}.',
    'not_in_list'         => 'El campo {field} no debe ser uno de: {param}.',
    'greater_than'        => 'El campo {field} debe ser mayor que {param}.',
    'greater_than_equal_to' => 'El campo {field} debe ser mayor o igual a {param}.',
    'less_than'           => 'El campo {field} debe ser menor que {param}.',
    'less_than_equal_to'  => 'El campo {field} debe ser menor o igual a {param}.',
    'regex_match'         => 'El campo {field} no tiene el formato correcto.',

    // Archivos
    'uploaded'            => 'El campo {field} debe contener un archivo válido.',
    'max_size'            => 'El archivo en {field} es demasiado grande.',
    'is_image'            => 'El archivo en {field} debe ser una imagen.',
    'mime_in'             => 'El archivo en {field} debe tener un tipo válido.',
    'ext_in'              => 'El archivo en {field} debe tener una extensión válida.',
    'max_dims'            => 'La imagen en {field} excede las dimensiones máximas permitidas.',
];
