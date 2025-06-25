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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="comercializacion">
    <header>
        <?= view('components/navbar') ?>
    </header>

    <main>
        <?= $content ?? '' ?>
    </main>

    <footer>
        <?= view('components/footer') ?>
    </footer>

    <?php if (session()->get('logueado') && session()->get('rol') === 'cliente'): ?>
    <button type="button" class="btn btn-dark redondoCarrito rounded-circle carrito-float"
        style="background-color: #1e1e1e; border-color: rgba(238, 178, 0, 0.69);" onclick="abrirModalCarrito()">
        <i class="bi bi-cart fs-1" style="color: rgba(238, 178, 0, 0.69);"></i>
    </button>

    <div id="modal-carrito" class="modal-carrito">
        <div class="container d-flex justify-content-center align-items-center"
            style="padding-top: 5vh; padding-bottom: 5vh;">
            <div class="card shadow"
                style="width: 90vw; max-width: 1000px; border-radius: 10px; border-color: rgb(22, 22, 22);">
                <div class="card-body modal-scroll" style="background-color: rgb(22, 22, 22); color: white;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="fw-light display-6"><strong>Tu carrito</strong></h3>
                        <div>
                            <button class="btn btn-sm text-white btn-vaciar"
                                style="background-color: #dc3545; border-color: #dc3545; margin-right: 12px;"
                                onclick="vaciarCarrito()">Vaciar carrito</button>
                            <button type="button" class="btn-close btn-close-white" aria-label="Cerrar"
                                onclick="cerrarModalCarrito()"></button>
                        </div>
                    </div>

                    <h5 class="mb-2" style="color:rgb(109, 109, 109);" id="cantidad-productos">Productos agregados:
                        <?= count($carrito ?? []) ?></h5>
                    <hr class="separador">

                    <div id="carrito-vacio" class="text-center <?= empty($carrito) ? '' : 'd-none' ?>">
                        <h3 style="color:rgb(122, 122, 122); padding-bottom: 20px">Tu carrito está vacío.</h3>
                        <a href="<?= base_url('/catalogo#inicio-productos') ?>" class="btn text-white"
                            style="background-color: rgba(238, 178, 0, 0.69); border-color: rgba(238, 178, 0, 0.69);">Agregar
                            productos al carrito</a>
                    </div>

                    <div id="carrito-contenido" class="<?= empty($carrito) ? 'd-none' : '' ?>">
                        <form id="form-finalizar-compra" method="POST" action="<?= base_url('/pedido/finalizar/') ?>">
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
                                        <?php if (isset($carrito) && !empty($carrito)): ?>
                                        <?php foreach ($carrito as $item): ?>
                                        <tr data-id="<?= $item['id_carrito_producto'] ?>">
                                            <td><?= esc($item['nombre']) ?></td>
                                            <td class="cantidad"><?= esc($item['cantidad']) ?></td>
                                            <td class="precio">$<?= number_format($item['precio'], 2, ',', '.') ?></td>
                                            <td class="subtotal">
                                                $<?= number_format($item['precio'] * $item['cantidad'], 2, ',', '.') ?>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-light btn-mas">+</button>
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-light btn-menos">-</button>
                                                <button type="button" class="btn btn-sm btn-danger btn-eliminar"><i
                                                        class="bi bi-trash-fill"></i></button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">El carrito está vacío.</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td><strong>Subtotal:</strong></td>
                                            <td id="subtotal-carrito">
                                                $<?= number_format(array_sum(array_map(fn($item) => $item['precio'] * $item['cantidad'], $carrito ?? [])), 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <hr style="border-color: rgba(255,255,255,0.2);">

                            <div class="mb-4">
                                <h5>Método de pago</h5>
                                <div class="metodo-pago">
                                    <?php foreach (['transferencia', 'tarjeta', 'efectivo'] as $mp): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="metodo_pago"
                                            value="<?= $mp ?>" required id="pago-<?= $mp ?>">
                                        <label class="form-check-label"
                                            for="pago-<?= $mp ?>"><?= ucfirst($mp) ?></label>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h5>Tipo de entrega</h5>
                                <div class="tipo-entrega">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_entrega"
                                            id="entrega-envio" value="envio" required>
                                        <label class="form-check-label" for="entrega-envio">Envío a domicilio</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_entrega"
                                            id="entrega-retiro" value="retiro">
                                        <label class="form-check-label" for="entrega-retiro">Retiro en sucursal</label>
                                    </div>
                                </div>
                            </div>

                            <div id="form-domicilio" class="d-none">
                                <h5>Datos de envío</h5>
                                <div>
                                    <div class="mb-2">
                                        <label class="form-label" for="provincia">Provincia</label>
                                        <input type="text" class="form-control" id="provincia" name="provincia">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label" for="calle">Calle</label>
                                        <input type="text" class="form-control" id="calle" name="calle">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label" for="numero">Número</label>
                                        <input type="number" class="form-control" id="numero" name="numero">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label" for="descripcion">Descripción adicional</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion"
                                            style="background-color: #1e1e1e; border-color:rgba(112, 112, 112, 0.51);"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 d-flex justify-content-between">
                                <span><strong>Costo de envío:</strong></span>
                                <span id="monto-envio">$0,00</span>
                            </div>

                            <div class="mb-4 d-flex justify-content-between fs-5"
                                style="color: rgba(238, 178, 0, 0.69);">
                                <strong>Total a pagar:</strong>
                                <strong
                                    id="total-carrito">$<?= number_format(array_sum(array_map(fn($item) => $item['precio'] * $item['cantidad'], $carrito ?? [])), 2, ',', '.') ?></strong>
                            </div>

                            <button type="submit" class="btn text-white w-100"
                                style="background-color: rgba(238, 178, 0, 0.69); border-color: rgba(238, 178, 0, 0.69);">Finalizar
                                compra</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('form-finalizar-compra');
            const entregaEnvio = document.getElementById('entrega-envio');
            const entregaRetiro = document.getElementById('entrega-retiro');
            const formDomicilio = document.getElementById('form-domicilio');
            const carritoItems = document.getElementById('carrito-items');

            function toggleDomicilio() {
                if (entregaEnvio.checked) {
                    formDomicilio.classList.remove('d-none');
                } else {
                    formDomicilio.classList.add('d-none');
                }
                recalcularTotales();
            }

            entregaEnvio.addEventListener('change', toggleDomicilio);
            entregaRetiro.addEventListener('change', toggleDomicilio);

            toggleDomicilio();

            function recalcularTotales() {
                let subtotal = 0;
                document.querySelectorAll("#carrito-items tr").forEach(row => {
                    // Asegúrate de que el precio sea un número flotante antes de la operación
                    const precioText = row.querySelector(".precio").textContent;
                    const precio = parseFloat(precioText.replace(/\./g, '').replace(',', '.').replace('$', ''));
                    const cantidad = parseInt(row.querySelector(".cantidad").textContent);
                    subtotal += precio * cantidad;
                });

                document.getElementById("subtotal-carrito").textContent = "$" + subtotal.toLocaleString('es-AR', {
                    minimumFractionDigits: 2
                });

                const envio = entregaEnvio.checked ? 7200 : 0;
                document.getElementById("monto-envio").textContent = "$" + envio.toLocaleString('es-AR', {
                    minimumFractionDigits: 2
                });

                document.getElementById("total-carrito").textContent = "$" + (subtotal + envio).toLocaleString(
                    'es-AR', {
                    minimumFractionDigits: 2
                });

                // Actualizar la cantidad de productos agregados
                document.getElementById("cantidad-productos").textContent = `Productos agregados: ${carritoItems.children.length}`;

                // Mostrar u ocultar "carrito vacío" o "carrito lleno"
                if (carritoItems.children.length === 0) {
                    document.getElementById("carrito-contenido").classList.add("d-none");
                    document.getElementById("carrito-vacio").classList.remove("d-none");
                } else {
                    document.getElementById("carrito-contenido").classList.remove("d-none");
                    document.getElementById("carrito-vacio").classList.add("d-none");
                }
            }

            async function actualizarCantidad(row, id, delta) {
                const cantidadActualElement = row.querySelector(".cantidad");
                const cantidadActual = parseInt(cantidadActualElement.textContent);
                const nuevaCantidad = cantidadActual + delta;

                if (nuevaCantidad < 1) { // Si la nueva cantidad es 0 o menos, eliminar el producto
                    eliminarItem(row, id);
                    return;
                }

                const formData = new FormData();
                formData.append("id_carrito_producto", id);
                formData.append("cantidad", nuevaCantidad);

                try {
                    const res = await fetch("<?= base_url('carrito-producto/actualizar-cantidad') ?>", {
                        method: "POST",
                        body: formData
                    });

                    const data = await res.json();

                    if (data.success) {
                        cantidadActualElement.textContent = nuevaCantidad;
                        row.querySelector(".subtotal").textContent = "$" + data.subtotal.toLocaleString("es-AR", {
                            minimumFractionDigits: 2
                        });
                        recalcularTotales();
                    } else {
                        alert(data.message);
                    }
                } catch (error) {
                    console.error("Error al actualizar la cantidad:", error);
                    alert("Ocurrió un error al actualizar la cantidad del producto.");
                }
            }

            async function eliminarItem(row, id) {
                if (!confirm("¿Eliminar este producto del carrito?")) return;

                const formData = new FormData();
                formData.append("id_carrito_producto", id);

                try {
                    const res = await fetch("<?= base_url('carrito-producto/eliminar') ?>", {
                        method: "POST",
                        body: formData
                    });

                    const data = await res.json();

                    if (data.success) {
                        row.remove();
                        recalcularTotales();
                    } else {
                        alert("Ocurrió un error al eliminar el producto.");
                    }
                } catch (error) {
                    console.error("Error al eliminar el producto:", error);
                    alert("Ocurrió un error al eliminar el producto.");
                }
            }

            // Event Listeners para los botones de cantidad y eliminar
            carritoItems.addEventListener('click', function (event) {
                const target = event.target;
                const row = target.closest('tr[data-id]');
                if (!row) return; // No es un botón de carrito o no está en una fila de carrito

                const id = row.dataset.id;

                if (target.classList.contains('btn-mas')) {
                    actualizarCantidad(row, id, 1);
                } else if (target.classList.contains('btn-menos')) {
                    actualizarCantidad(row, id, -1);
                } else if (target.classList.contains('btn-eliminar')) {
                    eliminarItem(row, id);
                }
            });


            // Botón vaciar carrito
            document.querySelector(".btn-vaciar")?.addEventListener("click", async () => {
                if (confirm("¿Vaciar el carrito?")) {
                    try {
                        const res = await fetch("<?= base_url('carrito/vaciar') ?>");
                        const data = await res.json();
                        if (data.success) {
                            // Limpiar la tabla y actualizar totales
                            carritoItems.innerHTML = '<tr><td colspan="5" class="text-center">El carrito está vacío.</td></tr>';
                            recalcularTotales();
                        } else {
                            alert("Ocurrió un error al vaciar el carrito.");
                        }
                    } catch (error) {
                        console.error("Error al vaciar el carrito:", error);
                        alert("Ocurrió un error al vaciar el carrito.");
                    }
                }
            });

            // Recalcular totales al cargar la página para asegurar que estén correctos
            recalcularTotales();
        });

        function abrirModalCarrito() {
            document.getElementById('modal-carrito').classList.add('show');
            // Recargar el contenido del carrito al abrir el modal (opcional, pero útil si el carrito se actualiza en otro lado)
            // location.reload(); // Esto recargaría toda la página, lo que no es ideal para un modal.
            // Una mejor opción sería hacer una petición AJAX para obtener el carrito actualizado y renderizarlo.
        }

        function cerrarModalCarrito() {
            document.getElementById('modal-carrito').classList.remove('show');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php if (session()->getFlashdata('abrir_carrito')): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            abrirModalCarrito();
        });
    </script>
    <?php endif; ?>

</body>

</html>