<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto - Auren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .logo-navbar {
            height: 110px;
            width: auto;
        }

        body {
            background-color: #1a1a1a;
            color: #ffffff;
            font-family: 'Arial', sans-serif;
        }

        .navbar-custom {
            background-color: #000000;
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar-brand {
            font-size: 2rem;
            font-weight: bold;
            color: #ffffff !important;
        }

        .navbar-nav .nav-link {
            color: #ffffff !important;
            font-weight: 500;
            margin: 0 1rem;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: rgba(238, 178, 0, 0.69) !important;
        }

        .header-content {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            padding: 3rem 0;
            text-align: center;
            margin-bottom: 3rem;
            margin-top: 76px;
        }

        .form-section {
            background-color: #2d2d2d;
            border-radius: 15px;
            padding: 2rem;
        }

        .form-label {
            color: rgba(238, 178, 0, 0.69);
            font-weight: bold;
        }

        .form-control, .form-select {
            background-color: #3a3a3a;
            border: 1px solid #444444;
            color: #ffffff;
            padding: 0.75rem 1rem;
            border-radius: 8px;
        }

        .form-control:focus, .form-select:focus {
            background-color: #4a4a4a;
            border-color: rgba(238, 178, 0, 0.69);
            box-shadow: 0 0 0 0.25rem rgba(238, 178, 0, 0.25);
            color: #ffffff;
        }

        .btn-submit {
            background-color: rgba(238, 178, 0, 0.69);
            border: none;
            color: #ffffff;
            padding: 0.8rem 2.5rem;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .btn-submit:hover {
            background-color: rgba(238, 178, 0, 0.85);
            transform: scale(1.02);
        }

        .btn-back {
            background-color: #555555;
            border: none;
            color: #ffffff;
            padding: 0.8rem 2.5rem;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .btn-back:hover {
            background-color: #444444;
            transform: scale(1.02);
        }

        .footer-admin {
            background-color: #000000;
            color: #ffffff;
            text-align: center;
            padding: 2rem 0;
            margin-top: 4rem;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#dashboard">
            <img src="<?= base_url('../assets/img/nombremarca1.png') ?>" alt="Logo Auren" class="logo-navbar">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/admin/index') ?>"><i class="bi bi-house-door"></i> Inicio Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout"><i class="bi bi-box-arrow-right"></i> Salir</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="header-content">
    <div class="container">
        <h2 style="padding-top: 30px;">Editar Producto</h2>
        <p>Modifica la información del producto seleccionado.</p>
    </div>
</div>

<div class="container">
    <div class="form-section">
        <h2 class="mb-4 text-center">Formulario de Edición de Producto</h2>

        <form action="<?= base_url('producto_controller/actualizar/' . $producto['id_producto']) ?>" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="<?= esc($producto['nombre']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" name="descripcion" required><?= esc($producto['descripcion']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio:</label>
                <input type="number" class="form-control" name="precio" step="0.01" value="<?= esc($producto['precio']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock:</label>
                <input type="number" class="form-control" name="stock" value="<?= esc($producto['stock']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="imagen_url" class="form-label">Imagen URL:</label>
                <input type="text" class="form-control" name="imagen_url" value="<?= esc($producto['imagen_url']) ?>">
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría:</label>
                <select class="form-select" name="categoria" required>
                    <option value="mujer" <?= $producto['categoria'] == 'mujer' ? 'selected' : '' ?>>Mujer</option>
                    <option value="hombre" <?= $producto['categoria'] == 'hombre' ? 'selected' : '' ?>>Hombre</option>
                    <option value="accesorio" <?= $producto['categoria'] == 'accesorio' ? 'selected' : '' ?>>Accesorio</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="marca" class="form-label">Marca:</label>
                <input type="text" class="form-control" name="marca" value="<?= esc($producto['marca']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="material" class="form-label">Material:</label>
                <input type="text" class="form-control" name="material" value="<?= esc($producto['material']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo:</label>
                <input type="text" class="form-control" name="modelo" value="<?= esc($producto['modelo']) ?>">
            </div>

            <div class="mb-3">
                <label for="descuento" class="form-label">Descuento (%):</label>
                <input type="number" class="form-control" step="0.01" name="descuento" value="<?= esc($producto['descuento']) ?>">
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button type="submit" class="btn btn-submit"><i class="bi bi-arrow-clockwise"></i> Actualizar Producto</button>
                <a href="<?= base_url('producto_controller') ?>" class="btn btn-back"><i class="bi bi-arrow-left-circle"></i> Volver a Productos</a>
            </div>
        </form>
    </div>
</div>

<footer class="footer-admin">
    <div class="container">
        <p>&copy; 2024 Auren - Panel de Administración. Todos los derechos reservados.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
