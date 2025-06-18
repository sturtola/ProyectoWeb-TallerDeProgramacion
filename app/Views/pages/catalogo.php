<div class="container-fluid catalogo" id="inicio-productos">
    <div class="row">
        <div class="col-12 col-md-4 seccion-izquierda d-flex flex-column justify-content-start">

            <div class="accordion accordion-dark" id="filtrosAcordeon">
                <form id="form-filtros" method="GET" action="<?= base_url('catalogo') ?>">
                    <div class="buscador-wrapper mt-md-5 mb-4 px-3">
                        <input type="text" class="form-control" id="buscador" name="busqueda"
                            placeholder="Buscar producto..." value="<?= esc($_GET['busqueda'] ?? '') ?>">
                    </div>
                    <!-- Marca -->
                    <div class="accordion-item">
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
                    <div class="accordion-item">
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
                        <a href="<?= base_url('catalogo') ?>" class="btn btn-secondary w-100">Borrar filtros</a>
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
                                    data-imagen="<?= esc($producto['imagen_url']) ?>">
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
                                    <?php if ((int)$producto['stock'] > 0): ?>
                                        <form method="post" action="/carrito/agregar">
                                            <input type="hidden" name="id_producto" value="<?= $producto['id_producto'] ?>">
                                            <?php if (session()->get('isLoggedIn')): ?>
                                                <button type="submit" class="btn" style="background-color: #198754; color: white;">Añadir al carrito</button>
                                            <?php else: ?>
                                                <button type="button" class="btn" style="background-color: #198754; color: white;" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                    Añadir al carrito
                                                </button>
                                            <?php endif; ?>
                                        </form>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-secondary" disabled>Sin stock</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Modal para iniciar sesión -->
            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginModalLabel">Atención</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            Debe iniciar sesión o registrarse para agregar productos al carrito.
                        </div>
                        <div class="modal-footer">
                            <a href="/login" class="btn btn-primary">Iniciar sesión</a>
                            <a href="/registro" class="btn btn-outline-secondary">Registrarse</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const modal = document.getElementById("modal-producto");
    const cerrarModal = document.querySelector(".cerrar-modal");
    const btns = document.querySelectorAll(".btn-comprar");

    btns.forEach(btn => {
        btn.addEventListener("click", () => {
            const tarjeta = btn.closest(".tarjeta-producto");

            modal.querySelector(".modal-imagen img").src = tarjeta.dataset.imagen;
            modal.querySelector(".nombre").textContent = tarjeta.dataset.nombre;
            modal.querySelector(".descripcion").textContent = tarjeta.dataset.descripcion;
            modal.querySelector(".marca").textContent = tarjeta.dataset.marca;
            modal.querySelector(".material").textContent = tarjeta.dataset.material;
            modal.querySelector(".genero").textContent = tarjeta.dataset.genero;
            modal.querySelector("#cantidad").value = 1;

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


Sabrina Turtola <turtolasabrina@gmail.com>
23:08 (hace 0 minutos)
para mí

<script>
document.addEventListener('DOMContentLoaded', function () {
    const loginButtons = document.querySelectorAll('[data-bs-target="#loginModal"]');

    loginButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Cierra cualquier modal abierto antes de mostrar el login
            const openModal = document.querySelector('.modal.show');
            if (openModal) {
                const modalInstance = bootstrap.Modal.getInstance(openModal);
                modalInstance.hide();

                // Esperar un poco antes de abrir el nuevo modal
                setTimeout(() => {
                    const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
                    loginModal.show();
                }, 300);
            }
        });
    });
});
</script>


<!-- Solo el JS de Bootstrap (funcionalidad de carrusel) -->
<script src="assets/js/bootstrap.bundle.min.js" integrity="" crossorigin=""></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>