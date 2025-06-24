<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Pedido - Auren</title>
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

        .detail-section {
            background-color: #2d2d2d;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 3rem;
        }

        .detail-section h2, .detail-section h3 {
            color: rgba(238, 178, 0, 0.69);
            margin-bottom: 1.5rem;
            font-weight: bold;
        }

        .detail-section p {
            color: #cccccc;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .detail-section p strong {
            color: #ffffff;
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

        .form-select {
            background-color: #3a3a3a;
            border: 1px solid #444444;
            color: #ffffff;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            width: auto; /* Ajuste para que no ocupe todo el ancho */
            display: inline-block; /* Para que esté en la misma línea que el label */
        }

        .form-select:focus {
            background-color: #4a4a4a;
            border-color: rgba(238, 178, 0, 0.69);
            box-shadow: 0 0 0 0.25rem rgba(238, 178, 0, 0.25);
            color: #ffffff;
        }

        .btn-back {
            background-color: #555555;
            border: none;
            color: #ffffff;
            padding: 0.8rem 2.5rem;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-top: 2rem; /* Más margen para separarlo del select */
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
            <h2 style="padding-top: 30px;">Detalle del pedido #<?= esc($pedido['id_pedido'] ?? 'N/A') ?></h2>
            <p>Información detallada sobre el pedido y opciones de gestión.</p>
        </div>
    </div>

    <div class="container">
        <div class="detail-section">
            <h3 class="mb-4" style="color: white;">Información general del pedido</h3>

            <p><strong>Cliente:</strong> <?= esc($usuario['nombre'] ?? 'N/A') . ' ' . esc($usuario['apellido'] ?? 'N/A') ?></p>
            <p><strong>Estado:</strong> <?= ucfirst(esc($pedido['estado'] ?? 'N/A')) ?></p>
            <p><strong>Subtotal:</strong> $<?= number_format($pedido['subtotal'] ?? 0, 2, ',', '.') ?></p>
            <p><strong>Total:</strong> $<?= number_format($pedido['total'] ?? 0, 2, ',', '.') ?></p>
            <p><strong>Tipo de Entrega:</strong> <?= ucfirst(esc($pedido['tipo_entrega'] ?? 'N/A')) ?></p>
            <p><strong>Método de Pago:</strong> <?= ucfirst(esc($pedido['metodo_pago'] ?? 'N/A')) ?></p>

            <h3 class="mt-4" style="color: white;">Productos del pedido</h3>
            <div class="table-responsive">
                <table class="pedidos-tabla text-center align-middle">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($productos)): ?>
                            <?php foreach ($productos as $prod): ?>
                                <tr>
                                    <td><?= esc($prod['nombre_producto'] ?? 'N/A') ?></td>
                                    <td><?= $prod['cantidad'] ?? 'N/A' ?></td>
                                    <td>$<?= number_format($prod['precio_unitario'] ?? 0, 2, ',', '.') ?></td>
                                    <td>$<?= number_format($prod['subtotal'] ?? 0, 2, ',', '.') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">No hay productos en este pedido.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if (!empty($domicilio)): ?>
                <h3 class="mt-4">Domicilio de Envío</h3>
                <p><?= esc($domicilio['calle'] ?? 'N/A') ?> <?= esc($domicilio['numero'] ?? 'N/A') ?>, <?= esc($domicilio['provincia'] ?? 'N/A') ?></p>
                <p><?= esc($domicilio['descripcion'] ?? 'N/A') ?></p>
            <?php endif; ?>

            <form id="form-estado" method="post" action="<?= base_url('/adminPedido_controller/cambiarEstado') ?>" class="mt-4">
                <input type="hidden" name="id_pedido" value="<?= esc($pedido['id_pedido'] ?? '') ?>">
                <div class="d-flex align-items-center">
                    <label for="estado" class="form-label me-3 mb-0">Cambiar Estado:</label>
                    <select name="estado" id="estado" class="form-select" onchange="document.getElementById('form-estado').submit()">
                        <option value="pendiente" <?= ($pedido['estado'] ?? '') === 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                        <option value="pagado" <?= ($pedido['estado'] ?? '') === 'pagado' ? 'selected' : '' ?>>Pagado</option>
                        <option value="empaquetado" <?= ($pedido['estado'] ?? '') === 'empaquetado' ? 'selected' : '' ?>>Empaquetado</option>
                        <option value="enviado" <?= ($pedido['estado'] ?? '') === 'enviado' ? 'selected' : '' ?>>Enviado</option>
                        <option value="retirado" <?= ($pedido['estado'] ?? '') === 'retirado' ? 'selected' : '' ?>>Retirado</option>
                    </select>
                </div>
            </form>

            <div class="text-start mt-4">
                <a href="<?= base_url('adminPedido_controller') ?>" class="btn btn-back">
                    <i class="bi bi-arrow-left-circle"></i> Volver a Pedidos
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