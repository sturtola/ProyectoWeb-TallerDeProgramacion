<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../assets/img/icon.png">
    <link rel="stylesheet" href="../assets/css/auren_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Contacto | Auren</title>
</head>

<body class="body-contacto">
    <section>
        <div class="contenedor-barra">
            <nav class="barra-nav">
                <!-- Checkbox y botón menú hamburguesa -->
                <input type="checkbox" id="menu-toggle" class="menu-toggle">
                <label for="menu-toggle" class="menu-icon">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </label>

                <!-- Menú horizontal (pantallas grandes) -->
                <ul class="lista-nav">
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
                        <a href="#">Información</a>
                        <ul class="menu-vertical-barra menu-informacion">
                            <li><a href="contacto.php">Contacto</a></li>
                            <li><a href="<?= base_url('comercializacion') ?>">Comercializacion</a></li>
                            <li><a href="../terminos-y-condiciones.php">Términos y Condiciones</a></li>
                            <li><a href="../consultas.php">Consultas</a></li>
                        </ul>
                    </li>
                </ul>

                <a class="barra-nav-brand" href="../auren.php">
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
                                <li><a href="contacto.php">Contacto</a></li>
                                <li><a href="<?= base_url('comercializacion') ?>">Comercializacion</a></li>
                                <li><a href="../terminos-y-condiciones.php">Términos y Condiciones</a>
                                </li>
                                <li><a href="../consultas.php">Consultas</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>
    </section>

    <section class="contenedor-titulos" style="padding-top: 120px">
        <div class="led-marco-entrega" style="width: 200px">
            <div class="container-marcoled-entrega">
                <h3 class="titulos-cm">Identidicación</h3>
            </div>
        </div>
    </section>
    <section>
        <div class="contenedor-contacto">
            <ul>
                <li><strong>Titulares</strong></li>
                <li>Turtola, Sabrina. DNI: 44.000.850</li>
                <li>Riveros, Lautaro. DNI: 45.903.006</li>
            </ul>


            <ul>
                <li><strong>Razon social</strong></li>
                <li>Auren SRL</li>
            </ul>

            <ul>
                <li><strong>Domicilio legal</strong></li>
                <li>Junín 1557, CP3400, Corrientes, Argentina</li>
            </ul>

        </div>
    </section>

    <section class="contenedor-titulos">
        <div class="led-marco-entrega" style="width: 150px">
            <div class="container-marcoled-entrega">
                <h3 class="titulos-cm">Contacto</h3>
            </div>
        </div>
    </section>
    <section>
        <div class="contenedor-contacto">
            <ul>
                <li><strong>Contacto</strong></li>
                <li>+54 3794 282166</li>
            </ul>
            <ul>
                <li><strong>Contacto</strong></li>
                <li>+54 3704 770647</li>
            </ul>
            <ul>
                <li><strong>Correo electrónico</strong></li>
                <li>auren@gmail.com</li>
            </ul>

        </div>
    </section>

    <section class="contenedor-titulos">
        <div class="led-marco-entrega" style="width: 230px">
            <div class="container-marcoled-entrega">
                <h3 class="titulos-cm">Datos bancarios</h3>
            </div>
        </div>
    </section>
    <section>
        <div class="contenedor-contacto">
            <ul>
                <li><strong>Razon social</strong></li>
                <li>Auren SRL</li>
            </ul>
            <ul>
                <li><strong>ALIAS</strong></li>
                <li>auren.srl</li>
            </ul>
            <ul>
                <li><strong>CVU</strong></li>
                <li>0002393847746589</li>
            </ul>
        </div>
    </section>

    <script>
        // Asegurarse de que los enlaces funcionen correctamente
        document.addEventListener('DOMContentLoaded', function () {
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
                <li><a href="auren.php">Inicio</a></li>
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