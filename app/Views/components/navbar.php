<section class="principal imagen-header">
  <div class="container-fluid barraNav">
    <nav class="navbar">
      <!-- Checkbox y botón menú hamburguesa -->
      <input type="checkbox" id="menu-toggle" class="menu-toggle">
      <label for="menu-toggle" class="menu-icon">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </label>

      <!-- Menú horizontal (pantallas grandes) -->
      <ul class="nav-list">
        <li class="dropdown">
          <a href="<?= base_url('/#inicio-inicio') ?>">Inicio</a>
          <ul class="menu-vertical-barra">
            <li><a href="<?= base_url('/IniciarSesion#inicio-sesion') ?>">Iniciar Sesión</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="<?= base_url('/catalogo#inicio-productos') ?>">Productos</a>
          <ul class="menu-vertical-barra">
            <li style="transition: none; transform: none;"><a href="<?= base_url('/Mantenimiento#inicio-mantenimiento') ?>">Hombre</a></li>
            <li><a href="<?= base_url('/Mantenimiento#inicio-mantenimiento') ?>">Mujer</a></li>
            <li><a href="<?= base_url('/Mantenimiento#inicio-mantenimiento') ?>">Accesorios</a></li>
          </ul>
        </li>
        <li><a href="<?= base_url('/QuienesSomos#inicio-nosotros') ?>">Nosotros</a></li>
        <li class="dropdown">

          <a href="#">Información</a>
          <ul class="menu-vertical-barra menu-informacion">
            <li><a href="<?= base_url('/Contacto#inicio-contacto') ?>">Contacto</a></li>
            <li><a href="<?= base_url('/Comercializacion#inicio-comercializacion') ?>">Comercialización</a></li>
            <li><a href="<?= base_url('/TerminosYUsos#inicio-condiciones') ?>">Términos y Condiciones</a></li>
          </ul>
        </li>
      </ul>


      <a class="navbar-brand" href="<?= base_url('/') ?>">
        <img class="nombreMarca" src="assets/img/nombremarca1.png">
      </a>

      <div class="sidebar">
        <ul class="menu-vertical-lateral">
          <li><a href="<?= base_url('/') ?>">
              <h5>Inicio<h5>
            </a></li>

          <li class="submenu-toggle">
            <a href="<?= base_url('/Mantenimiento#inicio-mantenimiento') ?>">
              <h5>Productos</h5><a>
                <ul class="submenu-vertical-lateral">
                  <li><a href="<?= base_url('/Mantenimiento#inicio-mantenimiento') ?>">Hombre</a></li>
                  <li><a href="<?= base_url('/Mantenimiento#inicio-mantenimiento') ?>">Mujer</a></li>
                  <li><a href="<?= base_url('/Mantenimiento#inicio-mantenimiento') ?>">Accesorios</a></li>
                </ul>
          </li>

          <li><a href="<?= base_url('/QuienesSomos#inicio-nosotros') ?>">
              <h5>Nosotros<h5>
            </a></li>

          <li class="submenu-toggle">
            <a href="#"><h5>Información</h5><a>
            <ul class="submenu-vertical-lateral">
              <li><a href="<?= base_url('/Contacto#inicio-contacto') ?>">Contacto</a></li>
              <li><a href="<?= base_url('/Comercializacion#inicio-comercializacion') ?>">Comercialización</a></li>
              <li><a href="<?= base_url('/TerminosYUsos#incio-condiciones') ?>">Términos y Condiciones</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</section>

