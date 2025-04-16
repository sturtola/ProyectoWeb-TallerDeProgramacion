<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
        integrity="sha384-..." crossorigin="anonymous">
    <title>Bootstrap demo</title>
</head>

<body>
    <section class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Trabajo Práctico N3</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContenido"
                aria-controls="navbarContenido" aria-expanded="false" aria-label="Alternar navegación">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContenido">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>
    <section class="container-fluid" style="text-align: center;">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../assets/img/perro.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/gato.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/caballo.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <h2 style="padding-top: 20px; font-weight: bold;">Carrousel de imagenes</h2>
    </section>
    <section style="padding: 30px;">
        <h2 style="font-weight: bold; font-style: italic;">Un carrusel de imágenes es un componente visual que permite
            mostrar varias imágenes en secuencia, de forma automática o manual, ideal para destacar contenido de manera
            dinámica y atractiva.</h2>
        <p>El perro es un animal doméstico leal y amistoso, conocido por su capacidad para convivir con los humanos y su
            instinto protector. Es compañero ideal en el hogar y excelente en tareas como el pastoreo o la asistencia.
        </p>
        <p>El gato es un animal independiente, curioso y elegante. Destaca por su agilidad, sus hábitos de limpieza y su
            capacidad para adaptarse a distintos entornos, siendo una mascota muy querida y observadora.</p>
        <p>El caballo es un animal fuerte, noble y veloz, históricamente utilizado para el transporte, el trabajo y la
            equitación. Su conexión con el ser humano ha sido fundamental a lo largo del tiempo.</p>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>
<footer>
    <section style="text-align: center; background-color: black; padding: 20px 0;">
        <ul style="list-style: none; margin: 0; padding: 0; display: flex; justify-content: center; gap: 60px;">
            <li style="display: inline-block;">
                <a href="https://ar.images.search.yahoo.com/search/images?p=perro..."
                    style="color: white; font-weight: bold;">Perro</a>
            </li>
            <li style="display: inline-block;">
                <a href="https://ar.images.search.yahoo.com/search/images?p=gato..."
                    style="color: white; font-weight: bold;">Gato</a>
            </li>
            <li style="display: inline-block;">
                <a href="https://ar.images.search.yahoo.com/search/images?p=caballo..."
                    style="color: white; font-weight: bold;">Caballo</a>
            </li>
        </ul>
    </section>
</footer>

</html>