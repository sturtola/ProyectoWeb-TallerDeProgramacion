<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Pedidos - Auren</title>
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

        .pedidos-tabla {
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

        .pedidos-tabla thead {
            background-color: #1e1e1e;
            border-radius: 12px;
            border-color: #1e1e1e;
        }

        .pedidos-tabla th,
        .pedidos-tabla td {
            border: 1px solid #333;
            /* bordes sutiles */
            padding: 12px;
            vertical-align: middle;
        }

        .pedidos-tabla tbody tr:hover {
            background-color: #333;
            /* color al pasar el mouse */
        }

        .pedidos-tabla .btn-outline-light {
            border-color: rgba(238, 178, 0, 0.6);
            color: rgba(238, 178, 0, 0.69);
        }

        .pedidos-tabla .btn-outline-light:hover {
            background-color: rgba(238, 178, 0, 0.2);
            color: white;
        }

        .pedidos-tabla tfoot {
            color: rgba(238, 178, 0, 0.69);
            font-weight: bold;
        }

        .btn-primary {
            background-color: rgba(238, 178, 0, 0.69);
            border: none;
            color: #ffffff;
            padding: 0.5rem 1.2rem;
            border-radius: 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: rgba(238, 178, 0, 0.85);
            color: #ffffff;
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
            margin-top: 4rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="<?= base_url('admin_dashboard') ?>">
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
            <h2 style="padding-top: 30px;">Pedidos</h2>
            <p>Visualiza y gestiona todos los pedidos realizados por los clientes.</p>
        </div>
    </div>

    <div class="container">
        <div class="content-section">
            <h2 class="mb-4 text-center">Listado de Pedidos</h2>
            <div class="table-responsive">
                <table class="pedidos-tabla text-center align-middle">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th>Productos</th>
                            <th>Subtotal</th>
                            <th>Total</th>
                            <th>Tipo Entrega</th>
                            <th>Método Pago</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($pedidos)): ?>
                        <?php foreach ($pedidos as $pedido): ?>
                            <tr>
                                <td><?= $pedido['id_pedido'] ?></td>
                                <td><?= esc($pedido['usuario']['nombre'] ?? 'N/A') . ' ' . esc($pedido['usuario']['apellido'] ?? 'N/A') ?></td>
                                <td>
                                    <?php if (!empty($pedido['productos'])): ?>
                                        <?php foreach ($pedido['productos'] as $prod): ?>
                                            <?= esc($prod['nombre_producto'] ?? 'N/A') ?> (x<?= $prod['cantidad'] ?? 'N/A' ?>)<br>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        Sin productos
                                    <?php endif; ?>
                                </td>
                                <td>$<?= number_format($pedido['subtotal'] ?? 0, 2, ',', '.') ?></td>
                                <td>$<?= number_format($pedido['total'] ?? 0, 2, ',', '.') ?></td>
                                <td><?= ucfirst(esc($pedido['tipo_entrega'] ?? 'N/A')) ?></td>
                                <td><?= ucfirst(esc($pedido['metodo_pago'] ?? 'N/A')) ?></td>
                                <td><?= ucfirst(esc($pedido['estado'] ?? 'N/A')) ?></td>
                                <td>
                                    <a href="<?= base_url('/adminPedido_controller/ver/' . ($pedido['id_pedido'] ?? '')) ?>" class="btn btn-primary btn-sm">Ver</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="text-center">No hay pedidos para mostrar.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="text-start mt-4">
                <a href="<?= base_url('/admin/index') ?>" class="btn btn-back" style="background-color: rgba(238, 178, 0, 0.69; color: white;">
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