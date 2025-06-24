<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Facturas - Auren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #1a1a1a;
            color: #ffffff;
            font-family: 'Arial', sans-serif;
        }

        .logo-navbar {
            height: 110px;
            width: auto;
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

        .header-content h2 {
            color: #ffffff;
            font-weight: bold;
        }

        .content-section {
            background-color: #2d2d2d;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 3rem;
        }

        
        .facturas-tabla {
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
            border-radius: 12px !important;
            border-color: #1e1e1e;
            overflow-x: auto;
            overflow-y: auto;
        }

        .facturas-tabla thead {
            background-color: #1e1e1e;
            border-radius: 12px;
            border-color: #1e1e1e;
        }

        .facturas-tabla th,
        .facturas-tabla td {
            border: 1px solid #333;
            /* bordes sutiles */
            padding: 12px;
            vertical-align: middle;
        }

        .facturas-tabla tbody tr:hover {
            background-color: #333;
            /* color al pasar el mouse */
        }

        .facturas-tabla .btn-outline-light {
            border-color: rgba(238, 178, 0, 0.6);
            color: rgba(238, 178, 0, 0.69);
        }

        .facturas-tabla .btn-outline-light:hover {
            background-color: rgba(238, 178, 0, 0.2);
            color: white;
        }

        .facturas-tabla tfoot {
            color: rgba(238, 178, 0, 0.69);
            font-weight: bold;
        }

        .btn-ver {
            background-color: rgba(238, 178, 0, 0.69);
            color: #ffffff;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-ver:hover {
            background-color: rgba(238, 178, 0, 0.85);
            transform: scale(1.05);
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
        <h2 style="padding-top: 30px;">Facturas</h2>
        <p>Visualizá todas las facturas generadas en el sistema.</p>
    </div>
</div>

<div class="container">
    <div class="content-section">
        <h2 class="mb-4 text-center">Listado de Facturas</h2>
        <table class="facturas-tabla text-center align-middle">
            <thead style="border-radius: 12px;">
                <tr>
                    <th>N° Pedido</th>
                    <th>Cliente</th>
                    <th>Fecha - Hora</th>
                    <th>Método de Pago</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                    <tr>
                        <td><?= $pedido['id_pedido'] ?></td>
                        <td><?= esc($pedido['usuario']['nombre']) . ' ' . esc($pedido['usuario']['apellido']) ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($pedido['fecha_pedido'])) ?></td>
                        <td><?= ucfirst($pedido['metodo_pago']) ?></td>
                        <td>$<?= number_format($pedido['total'], 2, ',', '.') ?></td>
                        <td>
                            <a href="<?= base_url('factura/' . $pedido['id_pedido']) ?>" class="btn btn-sm btn-ver">
                                <i class="bi bi-eye"></i> Ver
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
