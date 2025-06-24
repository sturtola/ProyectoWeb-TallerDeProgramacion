<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?= $title ?? 'Auren' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/icon.png') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/auren_style.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <title>Auren</title>
</head>

<body class="comercializacion">
    <header>
        <!-- Menú de navegación -->
        <?= view('components/navbar') ?>
    </header>

    <main>
        <?= $content ?? '' ?>
    </main>

    <footer>
        <!-- Pie de página -->
        <?= view('components/footer') ?>
    </footer>



    <?php if (session()->get('logueado') && session()->get('rol') === 'cliente'): ?>
        <!-- Botón flotante -->
        <button type="button" class="btn btn-dark redondoCarrito rounded-circle carrito-float" style="background-color: #1e1e1e; border-color: rgba(238, 178, 0, 0.69);" onclick="abrirModalCarrito()">
            <i class="bi bi-cart fs-1" style="color: rgba(238, 178, 0, 0.69);"></i>
        </button>

        <!-- Modal carrito -->
        <div id="modal-carrito" class="modal-carrito">
            <div class="container d-flex justify-content-center align-items-center" style="padding-top: 5vh; padding-bottom: 5vh;">
                <div class="card shadow" style="width: 90vw; max-width: 1000px; border-radius: 10px; border-color: rgb(22, 22, 22);">
                    <div class="card-body modal-scroll" style="background-color: rgb(22, 22, 22); color: white;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="fw-light display-6"><strong>Tu carrito</strong></h3>
                            <div>
                                <button class="btn btn-sm text-white btn-vaciar" style="background-color: #dc3545; border-color: #dc3545; margin-right: 12px;" onclick="vaciarCarrito()">Vaciar carrito</button>
                                <button type="button" class="btn-close btn-close-white" aria-label="Cerrar" onclick="cerrarModalCarrito()"></button>
                            </div>
                        </div>

                        <h5 class="mb-2" style="color:rgb(109, 109, 109);" id="cantidad-productos">Productos agregados: <?= count($carrito ?? []) ?></h5>
                        <hr class="separador">

                        <!-- Carrito vacío -->
                        <div id="carrito-vacio" class="text-center <?= empty($carrito) ? '' : 'd-none' ?>">
                            <h3 style="color:rgb(122, 122, 122); padding-bottom: 20px">Tu carrito está vacío.</h3>
                            <a href="<?= base_url('/catalogo#inicio-productos') ?>" class="btn text-white" style="background-color: rgba(238, 178, 0, 0.69); border-color: rgba(238, 178, 0, 0.69);">Agregar productos al carrito</a>
                        </div>

                        <!-- Carrito lleno -->
                        <div id="carrito-contenido" class="<?= empty($carrito) ? 'd-none' : '' ?>">
                            <form id="form-finalizar-compra" method="POST" action="<?= base_url('/pedido/finalizar') ?>">
                                <!-- tabla -->
                                <div class="table-responsive">
                                    <table class="carrito-tabla align-middle text-center">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio unitario</th>
                                                <th>Subtotal</th>
                                                <th>Modificar</th>
                                            </tr>
                                        </thead>
                                        <tbody id="carrito-items">
                                            <?php foreach ($carrito as $item): ?>
                                                <tr data-id="<?= $item['id_carrito_producto'] ?>">
                                                    <td><?= esc($item['nombre']) ?></td>
                                                    <td class="cantidad"><?= esc($item['cantidad']) ?></td>
                                                    <td class="precio">$<?= number_format($item['precio'], 2, ',', '.') ?></td>
                                                    <td class="subtotal">$<?= number_format($item['precio'] * $item['cantidad'], 2, ',', '.') ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-outline-light btn-mas">+</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light btn-menos">-</button>
                                                        <button type="button" class="btn btn-sm btn-danger btn-eliminar"><i class="bi bi-trash-fill"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td><strong>Subtotal:</strong></td>
                                                <td id="subtotal-carrito">$<?= number_format(array_sum(array_map(fn($item) => $item['precio'] * $item['cantidad'], $carrito ?? [])), 2, ',', '.') ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <hr style="border-color: rgba(255,255,255,0.2);">

                                <!-- Método de pago -->
                                <div class="mb-4">
                                    <h5>Método de pago</h5>
                                    <?php foreach (['transferencia', 'tarjeta', 'efectivo'] as $mp): ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="metodo_pago" value="<?= $mp ?>" required id="pago-<?= $mp ?>">
                                            <label class="form-check-label" for="pago-<?= $mp ?>"><?= ucfirst($mp) ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <!-- Tipo de entrega -->
                                <div class="mb-4">
                                    <h5>Tipo de entrega</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_entrega" id="entrega-envio" value="envio" required>
                                        <label class="form-check-label" for="entrega-envio">Envío a domicilio</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_entrega" id="entrega-retiro" value="retiro">
                                        <label class="form-check-label" for="entrega-retiro">Retiro en sucursal</label>
                                    </div>
                                </div>

                                <!-- Formulario domicilio -->
                                <div id="form-domicilio" class="d-none">
                                    <h5>Datos de envío</h5>
                                    <div class="mb-2">
                                        <label class="form-label">Provincia</label>
                                        <input type="text" class="form-control" id="provincia">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Calle</label>
                                        <input type="text" class="form-control" id="calle">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Número</label>
                                        <input type="number" class="form-control" id="numero">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Descripción adicional</label>
                                        <textarea class="form-control" id="descripcion"></textarea>
                                    </div>
                                </div>

                                <!-- Totales -->
                                <div class="mb-3 d-flex justify-content-between">
                                    <span><strong>Costo de envío:</strong></span>
                                    <span id="monto-envio">$0,00</span>
                                </div>

                                <div class="mb-4 d-flex justify-content-between fs-5" style="color: rgba(238, 178, 0, 0.69);">
                                    <strong>Total a pagar:</strong>
                                    <strong id="total-carrito">$<?= number_format(array_sum(array_map(fn($item) => $item['precio'] * $item['cantidad'], $carrito ?? [])), 2, ',', '.') ?></strong>
                                </div>

                                <!-- Inputs ocultos de domicilio -->
                                <input type="hidden" name="provincia" id="provincia_input">
                                <input type="hidden" name="calle" id="calle_input">
                                <input type="hidden" name="numero" id="numero_input">
                                <input type="hidden" name="descripcion" id="descripcion_input">

                                <button type="submit" class="btn text-white w-100" style="background-color: rgba(238, 178, 0, 0.69); border-color: rgba(238, 178, 0, 0.69);">Finalizar compra</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('abrir_carrito')): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                abrirModalCarrito();
            });
        </script>
    <?php endif; ?>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const entregaEnvio = document.getElementById("entrega-envio");
            const entregaRetiro = document.getElementById("entrega-retiro");
            const formDomicilio = document.getElementById("form-domicilio");

            entregaEnvio?.addEventListener("change", () => {
                formDomicilio.classList.remove("d-none");
                recalcularTotales();
            });

            entregaRetiro?.addEventListener("change", () => {
                formDomicilio.classList.add("d-none");
                recalcularTotales();
            });

            document.getElementById("form-finalizar-compra")?.addEventListener("submit", () => {
                document.getElementById("provincia_input").value = document.getElementById("provincia").value;
                document.getElementById("calle_input").value = document.getElementById("calle").value;
                document.getElementById("numero_input").value = document.getElementById("numero").value;
                document.getElementById("descripcion_input").value = document.getElementById("descripcion").value;
            });
        });
    </script>

    <script>
        function abrirModalCarrito() {
            document.getElementById('modal-carrito').classList.add('show');
        }

        function cerrarModalCarrito() {
            document.getElementById('modal-carrito').classList.remove('show');
        }

        document.addEventListener("DOMContentLoaded", () => {
            // Mostrar u ocultar datos de envío
            const entregaEnvio = document.getElementById('entrega-envio');
            const entregaRetiro = document.getElementById('entrega-retiro');
            const formDomicilio = document.getElementById('form-domicilio');

            function toggleDomicilio() {
                formDomicilio.classList.toggle('d-none', !entregaEnvio.checked);
                recalcularTotales();
            }

            if (entregaEnvio && entregaRetiro && formDomicilio) {
                entregaEnvio.addEventListener('change', toggleDomicilio);
                entregaRetiro.addEventListener('change', toggleDomicilio);
                toggleDomicilio();
            }

            // Eventos de botones de cantidad y eliminación
            document.querySelectorAll("#carrito-items tr").forEach(row => {
                const id = row.dataset.id;
                row.querySelector(".btn-mas")?.addEventListener("click", () => {
                    actualizarCantidad(row, id, 1);
                });
                row.querySelector(".btn-menos")?.addEventListener("click", () => {
                    actualizarCantidad(row, id, -1);
                });
                row.querySelector(".btn-eliminar")?.addEventListener("click", () => {
                    eliminarItem(row, id);
                });
            });

            // Botón de vaciar carrito
            document.querySelector(".btn-vaciar")?.addEventListener("click", async () => {
                if (confirm("¿Vaciar el carrito?")) {
                    const res = await fetch("<?= base_url('carrito/vaciar') ?>");
                    const data = await res.json();
                    if (data.success) location.reload();
                }
            });
        });

        async function actualizarCantidad(row, id, cambio) {
            const cantidadCell = row.querySelector(".cantidad");
            let cantidad = parseInt(cantidadCell.textContent);
            cantidad += cambio;
            if (cantidad < 1) return;

            const formData = new FormData();
            formData.append("id_carrito_producto", id);
            formData.append("cantidad", cantidad);

            const res = await fetch("<?= base_url('carrito-producto/actualizar-cantidad') ?>", {
                method: "POST",
                body: formData
            });

            const data = await res.json();
            if (data.success) {
                cantidadCell.textContent = cantidad;
                row.querySelector(".subtotal").textContent = "$" + data.subtotal.toLocaleString('es-AR', {
                    minimumFractionDigits: 2
                });
                recalcularTotales();
            } else {
                alert(data.message || "Error al actualizar cantidad");
            }
        }

        async function eliminarItem(row, id) {
            if (!confirm("¿Eliminar este producto del carrito?")) return;

            const formData = new FormData();
            formData.append("id_carrito_producto", id);

            const res = await fetch("<?= base_url('carrito-producto/eliminar') ?>", {
                method: "POST",
                body: formData
            });

            const data = await res.json();
            if (data.success) {
                row.remove();
                recalcularTotales();

                // Si ya no hay filas, mostrar mensaje de carrito vacío
                if (document.querySelectorAll("#carrito-items tr").length === 0) {
                    document.getElementById("carrito-contenido").classList.add("d-none");
                    document.getElementById("carrito-vacio").classList.remove("d-none");
                }
            } else {
                alert(data.message || "Error al eliminar producto");
            }
        }

        function recalcularTotales() {
            let subtotal = 0;
            document.querySelectorAll("#carrito-items tr").forEach(row => {
                const precio = parseFloat(row.querySelector(".precio").textContent.replace(/\./g, '').replace(',', '.').replace('$', ''));
                const cantidad = parseInt(row.querySelector(".cantidad").textContent);
                subtotal += precio * cantidad;
            });

            document.getElementById("subtotal-carrito").textContent = "$" + subtotal.toLocaleString('es-AR', {
                minimumFractionDigits: 2
            });

            const envio = document.getElementById("entrega-envio")?.checked ? 7200 : 0;
            document.getElementById("monto-envio").textContent = "$" + envio.toLocaleString('es-AR', {
                minimumFractionDigits: 2
            });

            document.getElementById("total-carrito").textContent = "$" + (subtotal + envio).toLocaleString('es-AR', {
                minimumFractionDigits: 2
            });
        }
    </script>

    <script>
        document, addEventListener("DOMContentLoaded", function() {
            if (window.location.hash === "#inicio-sesion") {
                const target = document.querySelector(window.location.hash);
                if (target) {
                    setTimeout(() => {
                        target.scrollIntoView({
                            behavior: "smooth",
                            block: "start"
                        });
                    }, 100);
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YOUR_HASH" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>