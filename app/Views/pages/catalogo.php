<div class="container-fluid catalogo" id="inicio-productos">
    <div class="row">
        <div class="col-12 col-md-4 seccion-izquierda d-flex flex-column justify-content-start">

            <div class="accordion accordion-dark accordion-filtros" id="filtrosAcordeon">
                <form id="form-filtros" method="GET" action="<?= base_url('catalogo') ?>">
                    <div class="buscador-wrapper mt-md-5 mb-4 px-3">
                        <input type="text" class="form-control" id="buscador" name="busqueda"
                            placeholder="Buscar producto..." value="<?= esc($_GET['busqueda'] ?? '') ?>">>
                    </div>
                    <!-- Marca -->
                    <div class="accordion-item item-marca">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#marca"
                                aria-expanded="true" aria-controls="marca">
                                Marca
                            </button>
                        </h2>
                        <div id="marca" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <?php foreach ($marcasDisponibles as $marca): ?>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="marca[]" value="<?= esc($marca) ?>" id="<?= esc($marca) ?>"
                                            <?= (isset($_GET['marca']) && in_array($marca, $_GET['marca'])) ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="<?= esc($marca) ?>"><?= esc($marca) ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Categoría -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#categoria" aria-expanded="false" aria-controls="categoria">
                                Categoría
                            </button>
                        </h2>
                        <div id="categoria" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <?php foreach ($categoriasDisponibles as $cat): ?>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="categoria[]" value="<?= esc($cat) ?>" id="<?= esc($cat) ?>"
                                            <?= (isset($_GET['categoria']) && in_array($cat, $_GET['categoria'])) ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="<?= esc($cat) ?>"><?= esc($cat) ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Material -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#material" aria-expanded="false" aria-controls="material">
                                Material
                            </button>
                        </h2>
                        <div id="material" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <?php foreach ($materialesDisponibles as $mat): ?>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="material[]" value="<?= esc($mat) ?>" id="<?= esc($mat) ?>"
                                            <?= (isset($_GET['material']) && in_array($mat, $_GET['material'])) ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="<?= esc($mat) ?>"><?= esc($mat) ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Filtro de Precio -->
                    <div class="accordion-item item-precio">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#precio" aria-expanded="false" aria-controls="precio">
                                Precio
                            </button>
                        </h2>
                        <div id="precio" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <label for="precio_min" class="form-label">Precio mínimo</label>
                                    <input type="number" class="form-control" name="precio_min" id="precio_min" min="0"
                                        value="<?= esc($_GET['precio_min'] ?? '') ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="precio_max" class="form-label">Precio máximo</label>
                                    <input type="number" class="form-control" name="precio_max" id="precio_max" min="0"
                                        value="<?= esc($_GET['precio_max'] ?? '') ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-3 mt-4">
                        <button type="submit" class="btn btn-dark w-100 aplicar" style="background-color: #00ff846a;">Aplicar filtros</button>
                    </div>
                    <div class="px-3 mt-2">
                        <a href="<?= base_url('/catalogo#inicio-productos') ?>" class="btn btn-secondary w-100">Borrar filtros</a>
                    </div>
                </form>
            </div>

        </div>
        <div class="col-12 col-md-8 seccion-derecha">
            <div class="container py-5">
                <div class="row g-4">
                    <?php if (empty($productos)): ?>
                        <div class="col-12 justify-content-center text-center" style="padding-top: 40px;">
                            <p style="color:rgb(145, 145, 145); font-size: 35px;">Ups! No se encontraron resultados para tu búsqueda.</p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($productos as $producto): ?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                <div class="tarjeta-producto" data-nombre="<?= esc($producto['nombre']) ?>"
                                    data-descripcion="<?= esc($producto['descripcion']) ?>"
                                    data-marca="<?= esc($producto['marca']) ?>"
                                    data-material="<?= esc($producto['material']) ?>"
                                    data-genero="<?= esc($producto['categoria']) ?>"
                                    data-imagen="<?= esc($producto['imagen_url']) ?>"
                                    data-id="<?= esc($producto['id_producto']) ?>"
                                    data-stock="<?= esc($producto['stock']) ?>">
                                    <div class="tarjeta-imagen">
                                        <img src="<?= esc($producto['imagen_url']) ?>"
                                            alt="Imagen de <?= esc($producto['nombre']) ?>">
                                    </div>
                                    <div class="tarjeta-info">
                                        <h5 class="producto-nombre"><?= esc($producto['nombre']) ?></h5>
                                        <p class="producto-precio">$<?= number_format($producto['precio'], 2, ',', '.') ?></p>
                                        <button class="btn-comprar">Ver más</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <!-- Modal reutilizable -->
                    <div id="modal-producto" class="modal-producto">
                        <div class="modal-contenido">
                            <span class="cerrar-modal">&times;</span>
                            <div class="modal-body">
                                <div class="modal-imagen">
                                    <img src="" alt="Imagen producto">
                                </div>
                                <div class="modal-detalles">
                                    <h2 class="nombre"></h2>
                                    <p class="descripcion"></p>
                                    <p><strong>Marca:</strong> <span class="marca"></span></p>
                                    <p><strong>Material:</strong> <span class="material"></span></p>
                                    <p><strong>Categoría:</strong> <span class="genero"></span></p>
                                    <div class="cantidad-container">
                                        <label for="cantidad">Cantidad:</label>
                                        <input type="number" id="cantidad" name="cantidad" min="1" value="1">
                                    </div>
                                    <form method="post" action="/carrito/agregar" id="form-agregar-carrito">
                                        <input type="hidden" name="id_producto" id="modal-id-producto">
                                        <?php if (session()->get('logueado')): ?>
                                            <div id="boton-con-stock" style="padding-top: 10px;">
                                                <button type="submit" class="btn w-100" style="background-color: #198754; color: white; border-color: #198754;">Añadir al carrito</button>
                                            </div>
                                        <?php else: ?>
                                            <div id="boton-no-login" style="padding-top: 10px;">
                                                <button type="button" class="btn btn-no-login w-100" style="background-color: #198754; color: white; border-color: #198754;">
                                                    Añadir al carrito
                                                </button>
                                                <div class="mensaje-login alert alert-danger mt-3 d-none" role="alert">
                                                    Para añadir productos al carrito, primero debes iniciar sesión.
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </form>

                                    <button type="button" id="boton-sin-stock" class="btn" style="background-color: #dc3545; color: white; border-color: #dc3545;" disabled>Sin stock</button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const BASE_URL = "<?= base_url() ?>";

    const modal = document.getElementById("modal-producto");
    const cerrarModal = document.querySelector(".cerrar-modal");
    const btns = document.querySelectorAll(".btn-comprar");

    btns.forEach(btn => {
        btn.addEventListener("click", () => {
            const tarjeta = btn.closest(".tarjeta-producto");

            // Obtener datos del producto desde data-attributes
            const imagen = tarjeta.dataset.imagen;
            const nombre = tarjeta.dataset.nombre;
            const descripcion = tarjeta.dataset.descripcion;
            const marca = tarjeta.dataset.marca;
            const material = tarjeta.dataset.material;
            const genero = tarjeta.dataset.genero;
            const stock = parseInt(tarjeta.dataset.stock);
            const id = tarjeta.dataset.id;

            // Rellenar los datos en el modal
            modal.querySelector(".modal-imagen img").src = imagen;
            modal.querySelector(".nombre").textContent = nombre;
            modal.querySelector(".descripcion").textContent = descripcion;
            modal.querySelector(".marca").textContent = marca;
            modal.querySelector(".material").textContent = material;
            modal.querySelector(".genero").textContent = genero;
            modal.querySelector("#cantidad").value = 1;
            modal.querySelector("#modal-id-producto").value = id;

            // Actualizar el ID del producto oculto
            const inputId = modal.querySelector("#modal-id-producto");
            if (inputId) inputId.value = id;

            // Mostrar u ocultar los botones según el stock
            const btnConStock = modal.querySelector("#boton-con-stock");
            const btnNoLogin = modal.querySelector("#boton-no-login");
            const btnSinStock = modal.querySelector("#boton-sin-stock");

            if (stock > 0) {
                if (btnConStock) btnConStock.classList.remove("d-none");
                if (btnNoLogin) btnNoLogin.classList.remove("d-none");
                btnSinStock.classList.add("d-none");
            } else {
                if (btnConStock) btnConStock.classList.add("d-none");
                if (btnNoLogin) btnNoLogin.classList.add("d-none");
                btnSinStock.classList.remove("d-none");
            }

            // Mostrar el modal
            modal.style.display = "flex";
        });
    });

    cerrarModal.addEventListener("click", () => {
        modal.style.display = "none";
    });

    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });

   
    document.addEventListener("DOMContentLoaded", () => {
        modal.addEventListener("click", function(e) {
            if (e.target && e.target.classList.contains("btn-no-login")) {
                const mensaje = modal.querySelector(".mensaje-login");
                if (mensaje) {
                    mensaje.classList.remove("d-none");

                    setTimeout(() => {
                        window.location.href = BASE_URL + "IniciarSesion#inicio-sesion";
                    }, 3000);
                }
            }
        });
    });
</script>


<script>
    // Detectar si hay filtros aplicados
    const urlParams = new URLSearchParams(window.location.search);
    const tieneFiltros = ['marca[]', 'categoria[]', 'material[]', 'precio_min', 'precio_max', 'busqueda']
        .some(param => urlParams.has(param));

    if (tieneFiltros) {
        const catalogo = document.getElementById("inicio-productos");
        if (catalogo) {
            // Esperar a que la página cargue y hacer scroll suave
            window.addEventListener("load", () => {
                catalogo.scrollIntoView({
                    behavior: "smooth"
                });
            });
        }
    }
</script>

<!-- JS para el mensaje si el usuario no esta logueado -->

<script>
    const BASE_URL = "<?= base_url() ?>";
    document.addEventListener("DOMContentLoaded", () => {
        const modal = document.getElementById("modal-producto");

        modal.addEventListener("click", function(e) {
            if (e.target && e.target.classList.contains("btn-no-login")) {
                const mensaje = modal.querySelector(".mensaje-login");
                if (mensaje) {
                    mensaje.classList.remove("d-none");

                    setTimeout(() => {
                        window.location.href = BASE_URL + "IniciarSesion#inicio-sesion"
                    }, 4000);
                }
            }
        })
    })
</script>


<!-- Solo el JS de Bootstrap (funcionalidad de carrusel) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>