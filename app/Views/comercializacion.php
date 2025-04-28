<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../assets/img/icon.png">
    <link rel="stylesheet" href="../assets/css/auren_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Comercialización | Auren</title>
</head>

<body class="body-otros">
    <section>
        <div class="container-fluid">
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
                    <li><a href="<?= base_url('nosotros') ?>">Nosotros</a></li>
                    <li class="dropdown">
                        <a href="#" class="active">Información</a>
                        <ul class="menu-vertical-barra menu-informacion">
                            <li><a href="contacto.php">Contacto</a></li>
                            <li><a href="<?= base_url('comercializacion') ?>" class="active">Comercializacion</a></li>
                            <li><a href="../terminos-y-condiciones.php">Términos y Condiciones</a></li>
                            <li><a href="../consultas.php">Consultas</a></li>
                        </ul>
                    </li>
                </ul>

                <a class="navbar-brand" href="../auren.php">
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
                            <a href="#" class="active">Información</a>
                            <ul class="submenu-vertical-lateral">
                                <li><a href="contacto.php">Contacto</a></li>
                                <li><a href="<?= base_url('comercializacion') ?>" class="active">Comercializacion</a></li>
                                <li><a href="../terminos-y-condiciones.php">Términos y Condiciones</a></li>
                                <li><a href="../consultas.php">Consultas</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>
    </section>

    <section class="contenedor-titulos">
        <div class="led-marco-entrega">
            <div class="container-marcoled-entrega">
                <h3 class="titulos-cm">Horarios de atención</h3>
            </div>
        </div>
    </section>
    <section class="contenedor-informacion">
            <ul>
                <li>LUNES A VIERNES:</li>
                <p>Horarios: 09:00 - 18:00.</p>
                <li>SABADOS:</li>
                <p>Horarios: 09:00 - 13:00.</p>
                <li>FERIADOS:</li>
                <p style="padding-bottom: 0px;">Nacionales: CERRADO.</p>
                <p style="padding-top: 0px;">Provinciales: ATENCIÓN NORMAL.</p>
            </ul>
    </section>

    <section class="contenedor-titulos">
        <div class="led-marco-entrega">
            <div class="container-marcoled-entrega">
                <h3 class="titulos-cm">Formas de entrega</h3>
            </div>
        </div>
    </section>
    <section class="contenedor-informacion">
            <ul>
                <li>Entrega a domicilio:</li>
                <p>Ofrecemos entregas a domicilio en todo el país. Trabajamos con servicios de mensajería de
                    confianza para garantizar que tu compra llegue en perfecto estado.</p>
                <li>Retiro en tienda:</li>
                <p>Podés optar por retirar tu pedido personalmente en nuestra tienda (Junín 1557, Corrientes). Esta opción es gratuita,
                    podés hacerlo dentro de nuestros horarios de atención.</p>
                <li>Envíos EXPRESS (Corrientes):</li>
                <p>Para compras dentro de Corrientes, contamos con servicio de entrega express en 24 hs hábiles.</p>
            </ul>
    </section>
    <section class="contenedor-titulos">
        <div class="led-marco-entrega">
            <div class="container-marcoled-entrega">
                <h3 class="titulos-cm">Formas de envío</h3>
            </div>
        </div>
    </section>
    <section class="contenedor-informacion">
            <ul>
                <li>Correo privado Nacional:</li>
                <p>Hacemos envíos seguros a través de empresas líderes de paquetería (Andreani, OCA, Correo
                   Argentino, según tu preferencia).</p>
                <li>Mensajería en zonas:</li>
                <p>Para algunas zonas, disponemos de envío mediante mensajería propia para asegurar rapidez y
                   cuidado en la entrega.</p>
                <li>Costo de envío:</li>
                <p>El costo del envío se calcula automáticamente en el checkout. Envío gratuito en compras
                   superiores a $500.000.</p>
            </ul>
    </section>
    <section class="contenedor-titulos">
        <div class="led-marco-entrega">
            <div class="container-marcoled-entrega">
                <h3 class="titulos-cm">Formas de pago</h3>
            </div>
        </div>
    </section>
    <section class="contenedor-informacion">
            <ul>
                <li>Tarjeta de débito o crédito:</li>
                <p>Aceptamos todas las tarjetas principales (Visa, Mastercard, American Express, etc.) a través de plataformas seguras como MercadoPago.</p>
                <li>Transferencia bancaria:</li>
                <p>Si preferís pagar por transferencia, te enviaremos los datos bancarios al finalizar tu compra. (Recordá enviar el comprobante a traves de nuestro correo: auren@gmail.com.)</p>
                <li>Efectivo:</li>
                <p>Sólo disponible para retiros en tienda. Consulta nuestros horarios de atención.</p>
                <li>Cuotas:</li>
                <p>Ofrecemos financiación hasta 6 o 12 cuotas con tarjetas seleccionadas (sujeto a promociones vigentes).</p>
            </ul>
    </section>
    <section class="contenedor-titulos">
        <div class="led-marco-entrega">
            <div class="container-marcoled-entrega">
                <h3 class="titulos-cm">Información adicional</h3>
            </div>
        </div>
    </section>
    <section class="contenedor-informacion">
            <ul>
                <li>Tiempo de preparación:</li>
                <p>Los pedidos se preparan y despachan en un plazo de 24 a 72 hs hábiles luego de confirmarse el pago.</p>
                <li>Seguimiento de envíos:</li>
                <p>Una vez despachado tu pedido, recibirás un número de seguimiento para que puedas chequear el estado de tu envío en tiempo real.</p>
                <li>Política de cambios y devoluciones:</li>
                <p>Si tu producto no era lo que esperabas o llegó dañado, podés solicitar cambio o devolución dentro de los primeros 15 días.
                   El producto debe estar sin uso y en su empaque original.</p>
                <li>Atención personalizada:</li>
                <p>Nuestro equipo está disponible para asesorarte en la elección de los productos que desees. ¡Queremos que encuentres exactamente lo que necesitás!</p>
            </ul>
    </section>

    <script>
    // Asegurarse de que los enlaces funcionen correctamente
    document.addEventListener('DOMContentLoaded', function() {
        // Para debugging - comprobar si los enlaces tienen los eventos correctos
        const links = document.querySelectorAll('a');
        links.forEach(link => {
            // Verificar si el enlace no es "#" (placeholder)
            if (link.getAttribute('href') && link.getAttribute('href') !== '#') {
                console.log('Enlace configurado: ' + link.getAttribute('href'));
            }
        });
    });
    </script>
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
        <li><a href="../auren.php">Inicio</a></li>
        <li><a href="#">Productos</a></li>
        <li><a href="nosotros.php">Sobre Nosotros</a></li>
        <li><a href="../terminos-y-condiciones.php">Terminos y Condiciones</a></li>
        <li><a href="contacto.php">Contacto</a></li>
      </ul>
    </div>

    <div class="row" align-items="center">
      AUREN © 2025 - Todos los derechos reservados.
    </div>
  </section>
</footer>
</html>