<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../assets/img/icon.png">
  <link rel="stylesheet" href="../assets/css/auren_style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <title>Auren - Mantenimiento</title>
</head>

<body class="body-otros">
  <section class="contenedor-barra">
    <div class="container-fluid barra-nav">
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
          <li><a href="<?= base_url('') ?>">Inicio</a></li>
          <li class="dropdown">
            <a href="#">Productos</a>
            <ul class="menu-vertical-barra">
              <li><a href="<?= base_url('maintenance') ?>">Hombre</a></li>
              <li><a href="<?= base_url('maintenance') ?>">Mujer</a></li>
              <li><a href="<?= base_url('maintenance') ?>">Accesorios</a></li>
            </ul>
          </li>
          <li><a href="<?= base_url('nosotros') ?>">Nosotros</a></li>
          <li class="dropdown">
            <a href="#">Información</a>
            <ul class="menu-vertical-barra menu-informacion">
              <li><a href="<?= base_url('contacto') ?>">Contacto</a></li>
              <li><a href="<?= base_url('comercializacion') ?>">Comercializacion</a></li>
              <li><a href="<?= base_url('condiciones') ?>">Términos y Condiciones</a></li>
              <li><a href="<?= base_url('maintenance') ?>">Consultas</a></li>
            </ul>
          </li>
        </ul>

        <a class="navbar-brand" href="<?= base_url('') ?>">
          <img class="nombreMarca" src="../assets/img/nombremarca1.png">
        </a>

        <div class="sidebar">
          <ul class="menu-vertical-lateral">
            <li><a href="<?= base_url('') ?>">Inicio</a></li>

            <li class="submenu-toggle">
              <a href="#">Productos</a>
              <ul class="submenu-vertical-lateral">
                <li><a href="<?= base_url('maintenance') ?>">Hombre</a></li>
                <li><a href="<?= base_url('maintenance') ?>">Mujer</a></li>
                <li><a href="<?= base_url('maintenance') ?>">Accesorios</a></li>
              </ul>
            </li>

            <li><a href="<?= base_url('nosotros') ?>">Nosotros</a></li>

            <li class="submenu-toggle">
              <a href="#">Información</a>
              <ul class="submenu-vertical-lateral">
                <li><a href="<?= base_url('contacto') ?>">Contacto</a></li>
                <li><a href="<?= base_url('comercializacion') ?>">Comercializacion</a></li>
                <li><a href="<?= base_url('condiciones') ?>">Términos y Condiciones</a></li>
                <li><a href="<?= base_url('maintenance') ?>">Consultas</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </section>

  <section class="container" style="min-height: 70vh; display: flex; justify-content: center; align-items: center; flex-direction: column;">
    <div class="led-marco" style="width: 400px;">
      <div class="container-marcoled">
        <p class="subtitulo" style="text-align: center; font-weight: bold; font-size: 20px">Sitio en Mantenimiento</p>
      </div>
    </div>
    <div style="max-width: 600px; text-align: center; margin-top: 30px;">
      <p style="color: white; font-family: Verdana, sans-serif; font-size: 16px;">
        Estamos trabajando para mejorar esta sección del sitio. 
        Disculpe las molestias ocasionadas.
      </p>
      <p style="color: white; font-family: Verdana, sans-serif; font-size: 16px; font-style: italic; margin-top: 20px;">
        ¡Vuelva pronto para descubrir nuestras novedades!
      </p>
    </div>
  </section>

  <footer>
    <section class="footer">
      <div class="row social-container">
        <a href="https://wa.me/5493704770647"><img class="social-iconos" src="../assets/img/wpp1.png"></img></a>
        <a href="#"><img class="social-iconos" src="../assets/img/instagram1.png"></img></a>
        <a href="#"><img class="social-iconos" src="../assets/img/facebook1.webp"></img></a>
        <a href="#"><img class="social-iconos" src="../assets/img/tiktok1.webp"></img></a>
      </div>

      <div class="row">
        <ul>
          <li><a href="<?= base_url('') ?>">Inicio</a></li>
          <li><a href="<?= base_url('maintenance') ?>">Productos</a></li>
          <li><a href="<?= base_url('nosotros') ?>">Sobre Nosotros</a></li>
          <li><a href="<?= base_url('condiciones') ?>">Terminos y Condiciones</a></li>
          <li><a href="<?= base_url('contacto') ?>">Contacto</a></li>
        </ul>
      </div>

      <div class="row" align-items="center">
        AUREN © 2025 - Todos los derechos reservados.
      </div>
    </section>
  </footer>
</body>
</html>