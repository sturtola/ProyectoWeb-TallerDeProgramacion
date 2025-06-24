<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Consultas - Auren</title>
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
            margin-top: 76px; /* Ajuste para el navbar fijo */
        }

        .header-content h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #ffffff;
        }

        .header-content p {
            font-size: 1.2rem;
            color: #cccccc;
            margin-bottom: 0;
        }

        .content-section {
            background-color: #2d2d2d;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 3rem;
        }

       
        .consultas-tabla {
            background-color: #1e1e1e;
            /* fondo oscuro */
            color: #f1f1f1;
            /* texto claro */
            width: 100%;
            font-size: 18px;
            border-radius: 12px;
            border-color: #1e1e1e;

        }

        .table-responsive {
            border-radius: 12px;
            border-color: #1e1e1e;
        }

        .consultas-tabla thead {
            background-color: #1e1e1e;
            border-radius: 12px;
            border-color: #1e1e1e;
        }

        .consultas-tabla th,
        .consultas-tabla td {
            border: 1px solid #333;
            /* bordes sutiles */
            padding: 12px;
            vertical-align: middle;
        }

        .consultas-tabla tbody tr:hover {
            background-color: #333;
            /* color al pasar el mouse */
        }

        .consultas-tabla .btn-outline-light {
            border-color: rgba(238, 178, 0, 0.6);
            color: rgba(238, 178, 0, 0.69);
        }

        .consultas-tabla .btn-outline-light:hover {
            background-color: rgba(238, 178, 0, 0.2);
            color: white;
        }

        .consultas-tabla tfoot {
            color: rgba(238, 178, 0, 0.69);
            font-weight: bold;
        }

        .btn-action {
            color: rgba(238, 178, 0, 0.69);
            text-decoration: none;
            margin: 0 5px;
            transition: color 0.3s ease;
        }

        .btn-action:hover {
            color: rgba(238, 178, 0, 0.85);
            text-decoration: underline;
        }

        .btn-delete {
            color: #dc3545; /* Red color for delete */
            text-decoration: none;
            margin: 0 5px;
            transition: color 0.3s ease;
        }

        .btn-delete:hover {
            color: #a71d2a;
            text-decoration: underline;
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
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-back:hover {
            background-color: #444444;
            color: #ffffff;
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
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/admin/index') ?>">
                            <i class="bi bi-house-door"></i> Inicio Admin
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">
                            <i class="bi bi-box-arrow-right"></i> Salir
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="header-content">
        <div class="container">
            <h2 style="padding-top: 30px;">Listado de Consultas</h2>
            <p>Revisa y gestiona las consultas enviadas por los clientes.</p>
        </div>
    </div>

    <div class="container">
        <div class="content-section">
            <h2 class="mb-4 text-center">Consultas de Clientes</h2>

            <?php if (session()->getFlashdata('message')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('message') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="consultas-tabla align-middle text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th style="max-width: 300px;">Mensaje</th>
                            <th>Fecha de Envío</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($consultas) && is_array($consultas)): ?>
                            <?php foreach ($consultas as $consulta): ?>
                                <tr>
                                    <td><?= esc($consulta['id_consulta']) ?></td>
                                    <td><?= esc($consulta['nombre']) ?></td>
                                    <td><?= esc($consulta['email']) ?></td>
                                    <td><?= esc($consulta['telefono']) ?></td>
                                    <td><?= esc($consulta['mensaje']) ?></td>
                                    <td><?= esc($consulta['fecha_envio']) ?></td>
                                    <td>
                                        <a href="<?= base_url('consulta_controller/eliminar/' . $consulta['id_consulta']) ?>" class="btn-delete" onclick="return confirm('¿Estás seguro de que quieres eliminar esta consulta?');"><i class="bi bi-trash"></i> Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">No hay consultas pendientes.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="text-start mt-4">
                <a href="<?= base_url('/admin/index') ?>" class="btn btn-back">
                    <i class="bi bi-arrow-left-circle"></i> Volver al Panel
                </a>
            </div>
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