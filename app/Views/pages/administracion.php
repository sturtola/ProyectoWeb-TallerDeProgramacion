<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Auren</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    }

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

        .admin-header {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            padding: 3rem 0;
            text-align: center;
            margin-bottom: 3rem;
        }

        .admin-header h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #ffffff;
        }

        .admin-header p {
            font-size: 1.2rem;
            color: #cccccc;
            margin-bottom: 0;
        }

        .admin-card {
            background-color: #2d2d2d;
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 2rem;
        }

        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(238, 178, 0, 0.3);
        }

        .admin-card .card-body {
            padding: 2rem;
            text-align: center;
        }

        .admin-card .card-icon {
            font-size: 4rem;
            color: rgba(238, 178, 0, 0.69);
            margin-bottom: 1rem;
        }

        .admin-card .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 1rem;
        }

        .admin-card .card-text {
            color: #cccccc;
            margin-bottom: 1.5rem;
        }

        .btn-admin {
            background-color: rgba(238, 178, 0, 0.69);
            border: none;
            color: #ffffff;
            padding: 0.8rem 2rem;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-admin:hover {
            background-color: rgba(238, 178, 0, 0.85);
            color: #ffffff;
            transform: scale(1.05);
        }

        .stats-section {
            background-color: #2d2d2d;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 3rem;
        }

        .stat-item {
            text-align: center;
            padding: 1rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: rgba(238, 178, 0, 0.69);
        }

        .stat-label {
            color: #cccccc;
            font-size: 1rem;
            margin-top: 0.5rem;
        }

        .footer-admin {
            background-color: #000000;
            color: #ffffff;
            text-align: center;
            padding: 2rem 0;
            margin-top: 4rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .admin-header h1 {
                font-size: 2rem;
            }

            .admin-card .card-icon {
                font-size: 3rem;
            }

            .stat-number {
                font-size: 2rem;
            }
        }

        .gestiones {
            display: flex;
            ;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center">
                <img src="../assets/img/nombremarca1.png" alt="Logo Auren" class="logo-navbar">
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
                        <a class="nav-link" href="<?= base_url('/logout') ?>">
                            <i class="bi bi-box-arrow-right"></i> Salir
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <div class="admin-header" style="margin-top: 76px;">
        <div class="container">
            <h2 style="padding-top:30px">Panel de Administración</h2>
            <p>Gestiona productos, clientes y consultas de manera eficiente</p>
        </div>
    </div>

    <!-- Acciones Rápidas -->
    <div class="row">
        <div class="col-12">
            <div class="card admin-card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-lightning-charge" style="color: rgba(238, 178, 0, 0.69);"></i>
                        Acciones Rápidas
                    </h5>
                    <div class="row mt-3">
                        <div class="col-md-3 mb-2">
                            <a href="<?= base_url('/producto_controller/agregar') ?>" class="btn w-100" style="background-color: rgba(238, 178, 0, 0.69); border-color: rgba(238, 178, 0, 0.69); color: white;">
                                <i class="bi bi-plus-circle"></i> Agregar Producto
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="<?= base_url('/usuario_controller/agregar') ?>" class="btn w-100" style="background-color: rgba(238, 178, 0, 0.69); border-color: rgba(238, 178, 0, 0.69); color: white;">
                                <i class="bi bi-person-plus"></i> Agregar Usuario
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="<?= base_url('/admin/productos') ?>" class="btn w-100" style="background-color: rgba(238, 178, 0, 0.69); border-color: rgba(238, 178, 0, 0.69); color: white;">
                                <i class="bi bi-eye"></i> Ver Inventario
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="<?= base_url('/') ?>" class="btn w-100" style="background-color: rgba(238, 178, 0, 0.69); border-color: rgba(238, 178, 0, 0.69); color: white;">
                                <i class="bi bi-globe"></i> Ver Sitio Web
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Fila 1: 3 tarjetas -->
        <div class="row">
            <!-- Gestión de Productos -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card admin-card">
                    <div class="card-body">
                        <div class="card-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h5 class="card-title">Gestión de Productos</h5>
                        <p class="card-text">
                            Administra el inventario de productos de pádel. Agrega, edita y elimina productos del catálogo.
                        </p>
                        <a href="<?= base_url('admin/productos') ?>" class="btn btn-admin">
                            <i class="bi bi-arrow-right"></i> Gestionar Productos
                        </a>
                    </div>
                </div>
            </div>

            <!-- Gestión de Clientes -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card admin-card">
                    <div class="card-body">
                        <div class="card-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5 class="card-title">Gestión de Usuarios</h5>
                        <p class="card-text">
                            Visualiza y gestiona la información de todos los usuarios registrados en la plataforma.
                        </p>
                        <a href="<?= base_url('admin/usuarios') ?>" class="btn btn-admin">
                            <i class="bi bi-arrow-right"></i> Ver Clientes
                        </a>
                    </div>
                </div>
            </div>

            <!-- Gestión de Consultas -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card admin-card">
                    <div class="card-body">
                        <div class="card-icon">
                            <i class="bi bi-chat-dots"></i>
                        </div>
                        <h5 class="card-title">Gestión de Consultas</h5>
                        <p class="card-text">
                            Revisa y responde las consultas enviadas por los clientes a través del formulario de contacto.
                        </p>
                        <a href="<?= base_url('admin/consultas') ?>" class="btn btn-admin">
                            <i class="bi bi-arrow-right"></i> Ver Consultas
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fila 2: 2 tarjetas centradas -->
        <div class="row justify-content-center">
            <!-- Gestión de Pedidos -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card admin-card">
                    <div class="card-body">
                        <div class="card-icon">
                            <i class="bi bi-cart"></i>
                        </div>
                        <h5 class="card-title">Gestión de Pedidos</h5>
                        <p class="card-text">
                            Revisa y procesa los pedidos realizados por los clientes.
                        </p>
                        <a href="<?= base_url('admin/pedidos') ?>" class="btn btn-admin">
                            <i class="bi bi-arrow-right"></i> Ver Pedidos
                        </a>
                    </div>
                </div>
            </div>

            <!-- Gestión de Facturas -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card admin-card">
                    <div class="card-body">
                        <div class="card-icon">
                            <i class="bi bi-receipt"></i>
                        </div>
                        <h5 class="card-title">Gestión de Facturas</h5>
                        <p class="card-text">
                            Revisa las facturas de los pedidos realizados por los clientes.
                        </p>
                        <a href="<?= base_url('admin/facturas') ?>" class="btn btn-admin">
                            <i class="bi bi-arrow-right"></i> Ver Facturas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="footer-admin">
        <div class="container">
            <p>&copy; 2024 Auren - Panel de Administración. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para actualizar estadísticas (opcional) -->
    <script>
        
        function actualizarEstadisticas() {
            fetch('<?= base_url('/admin/recuento') ?>')
                .then(response => response.json())
                .then(data => {
                    console.log('Datos recibidos:', data);
                    document.getElementById('totalProductos').textContent = data.totalProductos;
                    document.getElementById('totalClientes').textContent = data.totalClientes;
                    document.getElementById('totalConsultas').textContent = data.totalConsultas;
                    document.getElementById('pedidosPendientes').textContent = data.pedidosPendientes;
                    document.getElementById('pedidosEnviados').textContent = data.pedidosEnviados;

                    animarContadores(); // ✅ Llamar animación después de actualizar
                })
                .catch(error => console.error('Error al obtener estadísticas:', error));
        }

        document.addEventListener('DOMContentLoaded', actualizarEstadisticas);


        // Efecto de animación para los números de estadísticas
        function animarContadores() {
            const contadores = document.querySelectorAll('.stat-number');
            contadores.forEach(contador => {
                const valorFinal = parseInt(contador.textContent);
                let valorActual = 0;
                const incremento = valorFinal / 50;

                const timer = setInterval(() => {
                    valorActual += incremento;
                    if (valorActual >= valorFinal) {
                        contador.textContent = valorFinal;
                        clearInterval(timer);
                    } else {
                        contador.textContent = Math.floor(valorActual);
                    }
                }, 30);
            });
        }

        // Ejecutar animación después de cargar los datos
        setTimeout(animarContadores, 500);
    </script>
</body>

</html>