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
          <a class="nav-link" href="<?= base_url('/catalogo#inicio-productos') ?>">Productos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/QuienesSomos#inicio-nosotros') ?>">Nosotros</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/Contacto#inicio-contacto') ?>">Contacto</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/Comercializacion#inicio-comercializacion') ?>">Comercialización</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/TerminosYUsos#inicio-conciciones') ?>">Condiciones</a>
        </li>

        <?php if (session('id_usuario')): ?>
          <li class="nav-item">
            <a class="nav-link text-warning" href="<?= base_url('/logout') ?>" >
              <i class="bi bi-box-arrow-right"></i> Cerrar sesión
            </a>
          </li>
        <?php else: ?>
          <li class="nav-item" >
            <a class="nav-link" href="<?= base_url('/IniciarSesion#inicio-sesion') ?>" style="color: rgba(238, 178, 0, 0.81)" >
              <i class="bi bi-person-circle"></i> Iniciar sesión
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YOUR_HASH" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

