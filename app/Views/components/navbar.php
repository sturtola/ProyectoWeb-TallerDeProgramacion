<section class="principal-header">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-transparent px-4">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="<?= base_url('/') ?>">
      <img src="<?= base_url('assets/img/nombremarca1.png') ?>" alt="Logo Auren" class="logo-navbar">
    </a>

    <!-- Botón hamburguesa -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarContenido">
      <ul class="navbar-nav align-items-center gap-5">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/#inicio-inicio') ?>">Inicio</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="<?= base_url('/catalogo#inicio-productos') ?>" role="button" data-bs-toggle="dropdown">Productos</a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="<?= base_url('/catalogo#inicio-productos') ?>">Todos</a></li>
            <li><a class="dropdown-item" href="<?= base_url('/catalogo#inicio-productos') ?>">Hombre</a></li>
            <li><a class="dropdown-item" href="<?= base_url('/catalogo#inicio-productos') ?>">Mujer</a></li>
            <li><a class="dropdown-item" href="<?= base_url('/catalogo#inicio-productos') ?>">Accesorios</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/QuienesSomos#inicio-nosotros') ?>">Nosotros</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Información</a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="<?= base_url('/Contacto#inicio-contacto') ?>">Contacto</a></li>
            <li><a class="dropdown-item" href="<?= base_url('/Comercializacion#inicio-comercializacion') ?>">Comercialización</a></li>
            <li><a class="dropdown-item" href="<?= base_url('/TerminosYUsos#inicio-condiciones') ?>">Términos y Usos</a></li>
          </ul>
        </li>

        <?php if (session('id_usuario')): ?>
          <li class="nav-item">
            <a class="nav-link text-warning" href="<?= base_url('/logout') ?>">
              <i class="bi bi-box-arrow-right"></i> Cerrar sesión
            </a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link text-info" href="<?= base_url('/IniciarSesion#inicio-sesion') ?>" >
              <i class="bi bi-person-circle"></i> Iniciar sesión
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
</section>
