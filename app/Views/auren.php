<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../assets/img/icon.png">
  <link rel="stylesheet" href="../assets/css/auren_style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <title>Auren</title>
</head>

<body>
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
          <li><a href="<?= base_url('auren') ?>">Inicio</a></li>
          <li class="dropdown">
            <a href="#">Productos</a>
            <ul class="menu-vertical-barra">
              <li><a href="#">Hombre</a></li>
              <li><a href="#">Mujer</a></li>
              <li><a href="#">Accesorios</a></li>
            </ul>
          </li>
          <li><a href="<?= base_url('nosotros.php') ?>">Nosotros</a></li>
          <li class="dropdown">
            <a href="#">Información</a>
            <ul class="menu-vertical-barra menu-informacion">
              <li><a href="#">Contacto</a></li>
              <li><a href="<?= base_url('comercializacion.php') ?>">Comercializacion</a></li>
              <li><a href="#">Términos y Condiciones</a></li>
              <li><a href="#">Consultas</a></li>
            </ul>
          </li>
        </ul>


        <a class="navbar-brand" href="#">
          <img class="nombreMarca" src="../assets/img/nombremarca1.png">
        </a>

        <div class="sidebar">
          <ul class="menu-vertical-lateral">
            <li><a href="<?= base_url('auren') ?>">Inicio</a></li>

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
                <li><a href="<?= base_url(relativePath: 'comercializacion') ?>">Comercializacion</a></li>
                <li><a href="#">Términos y Condiciones</a></li>
                <li><a href="#">Consultas</a></li>
              </ul>
            </li>
          </ul>
        </div>

  </section>

  <section class="presentacion about-mini">
    <div class="about-content">
      <h2 style="font-weight: bold; margin-bottom: 50px">Auren</h2>
      <p>Auren es una empresa con raíces profundas en Formosa y Corrientes, y más de 45 años de trayectoria en el
        mercado.</p>
      <p>Nacimos impulsados por una verdadera pasión por el deporte, y fue justamente esa pasión la que nos llevó a
        realizar nuestra primera venta: una paleta como la que hoy sigue siendo símbolo de nuestros inicios. En Auren,
        seguimos apostando al desarrollo, al talento local y a la innovación.</p>
      <p style="font-style: italic; font-weight: bold; margin-top: 30px;">Más que una marca, somos una historia que se
        construye día a día junto a nuestros clientes.</p>
    </div>
    <div class="about-carousel">
      <div class="carousel-track">
        <img src="../assets/img/paletafrente.png" class="carousel-img">
        <img src="../assets/img/paletacostado1.png" class="carousel-img">
        <img src="../assets/img/paletaatras.png" class="carousel-img">
        <img src="../assets/img/paletacostado2.png" class="carousel-img">
        <img src="../assets/img/paletafrente.png" class="carousel-img">
        <img src="../assets/img/paletacostado1.png" class="carousel-img">
        <img src="../assets/img/paletaatras.png" class="carousel-img">
        <img src="../assets/img/paletacostado2.png" class="carousel-img">
      </div>
    </div>
  </section>

  <section class="seccion-marcas">
    <div class="marcas-container">
      <img src="../assets/img/logoadidas.png" style="height: 70px;">
      <img src="../assets/img/wilsonlogo.png" style="height: 35px;">
      <img src="../assets/img/siuxlogo.png" style="height: 30px;">
      <img src="../assets/img/headlogo.jpeg" style="height: 40px;">
      <img src="../assets/img/logonike.png" style="height: 65px;">
      <img src="../assets/img/noxlogo.png" style="height: 30px;">
      <img src="../assets/img/bullpadellogo.jpeg" style="height: 40px;">
    </div>

  </section>

  <section class="seccion-destacados">
    <div class="led-marco" style="width: 400px;">
      <div class="container-marcoled">
        <p class="subtitulo" style="text-align: center; font-weight: bold; font-size: 20px">Elegí calidad, elegí AUREN.
        </p>
      </div>
    </div>
    <p class="subtitulo" style="color: white;">Explorá nuestras tres categorías principales y encontrá el producto
      perfecto para tu juego.
      Desde paletas de alta competencia hasta accesorios esenciales, cada opción está seleccionada para ofrecerte lo
      mejor en rendimiento, tecnología y confort.</p>
  </section>

  <section class="tarjetas-container">
    <div class="tarjeta-con-titulo">
      <div class="titulo-categoria">MUJER</div>
      <div class="tarjeta">
        <img src="../assets/img/arisanchez.jpg" alt="paula" class="imagen-front">
        <img src="../assets/img/speed.jpg" alt="Paleta 1" class="imagen-hover">
        <div class="info">
          <h3>Speed Motion</h3>
          <p>Versátil, ligera y potente. Ideal para jugadores avanzados. </p>
          <span>$210.000</span>
        </div>
      </div>
    </div>

    <div class="tarjeta-con-titulo">
      <div class="titulo-categoria">HOMBRE</div>
      <div class="tarjeta">
        <img src="../assets/img/Lamperti.jpg" alt="lampe" class="imagen-front">
        <img src="../assets/img/ml.jpg" alt="Paleta 2" class="imagen-hover">
        <div class="info">
          <h3>Nox ML10 Pro Cup</h3>
          <p>Cómoda, sólida y duradera. Para todo tipo de jugador. </p>
          <span>$150.000</span>
        </div>
      </div>
    </div>

    <div class="tarjeta-con-titulo">
      <div class="titulo-categoria">ACCESORIOS</div>
      <div class="tarjeta">
        <img src="../assets/img/grip1.jpg" alt="Jugador 3" class="imagen-front">
        <img src="../assets/img/gripblanco.jpg" alt="Paleta 3" class="imagen-hover">
        <div class="info">
          <h3>Overgrips Adidas</h3>
          <p>Grip blanco, cómodo y adherente. Para todos los deportes.</p>
          <span>$8.000</span>
        </div>
      </div>
    </div>
  </section>

  <section class="video-review">
    <h2><i class="fa-solid fa-film"></i>Review Nox ML10 Pro Cup</h2>
    <div class="video-container">
      <iframe src="https://www.youtube.com/embed/Gtr95HTK3Wk" title="Video Review" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen>
      </iframe>
    </div>
  </section>

  <!-- Solo el JS de Bootstrap (funcionalidad de carrusel) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

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
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Productos</a></li>
        <li><a href="#">Sobre Nosotros</a></li>
        <li><a href="#">Terminos y Condiciones</a></li>
        <li><a href="#">Contacto</a></li>
      </ul>
    </div>

    <div class="row" align-items="center">
      AUREN © 2025 - Todos los derechos reservados.
    </div>
  </section>
</footer>

</html>