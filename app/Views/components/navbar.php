
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
          <li><a href="<?= base_url('/') ?>">Inicio</a></li>
          <li class="dropdown">
            <a href="#">Productos</a>
            <ul class="menu-vertical-barra">
              <li><a href="#">Hombre</a></li>
              <li><a href="#">Mujer</a></li>
              <li><a href="#">Accesorios</a></li>
            </ul>
          </li>
          <li><a href="<?= base_url('/QuienesSomos') ?>">Nosotros</a></li>
          <li class="dropdown">
            <a href="#">Información</a>
            <ul class="menu-vertical-barra menu-informacion">
              <li><a href="#">Contacto</a></li>
              <li><a href="<?= base_url('/Comercializacion') ?>">Comercializacion</a></li>
              <li><a href="#">Términos y Condiciones</a></li>
              <li><a href="#">Consultas</a></li>
            </ul>
          </li>
        </ul>


        <a class="navbar-brand" href="#">
          <img class="nombreMarca" src="assets/img/nombremarca1.png">
        </a>

        <div class="sidebar">
          <ul class="menu-vertical-lateral">
            <li><a href="<?= base_url('/') ?>">Inicio</a></li>

            <li class="submenu-toggle">
              <a href="#">Productos</a>
              <ul class="submenu-vertical-lateral">
                <li><a href="#">Hombre</a></li>
                <li><a href="#">Mujer</a></li>
                <li><a href="#">Accesorios</a></li>
              </ul>
            </li>

            <li><a href="<?= base_url('nosotros') ?>">Nosotros</a></li>

            <li class="submenu-toggle">
              <a href="#">Información</a>
              <ul class="submenu-vertical-lateral">
                <li><a href="#">Contacto</a></li>
                <li><a href="<?= base_url('/Comercializacion') ?>">Comercializacion</a></li>
                <li><a href="<?= base_url('/TerminosYUsos') ?>">Términos y Condiciones</a></li>
                <li><a href="<?= base_url('/Contacto') ?>">Consultas</a></li>
              </ul>
            </li>
          </ul>
        </div>

  </section>