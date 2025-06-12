</section>
    <div class="container-fluid catalogo" id="inicio-productos">
        <div class="row">
            <div class="col-12 col-md-4 seccion-izquierda d-flex flex-column justify-content-start">
                <div class="buscador-wrapper mt-md-5 mb-4 px-3">
                    <input type="text" class="form-control form-control-dark" id="buscador"
                        placeholder="Buscar producto...">
                </div>
                <div class="accordion accordion-dark" id="filtrosAcordeon">
                    <!-- Marca -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#marca" aria-expanded="true" aria-controls="marca">
                                Marca
                            </button>
                        </h2>
                        <div id="marca" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="nox">
                                    <label class="form-check-label" for="nox">Nox</label>
                                </div>
                                <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="bullpadel">
                                    <label class="form-check-label" for="bullpadel">Bullpadel</label>
                                </div>
                                <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="puma">
                                    <label class="form-check-label" for="puma">Puma</label>
                                </div>
                                <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="head">
                                    <label class="form-check-label" for="head">Head</label>
                                </div>
                                <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="adidas">
                                    <label class="form-check-label" for="adidas">Adidas</label>
                                </div>
                                <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="siux">
                                    <label class="form-check-label" for="siux">Siux</label>
                                </div>
                                <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="babolat">
                                    <label class="form-check-label" for="siux">Babolat</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Género -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#genero" aria-expanded="false" aria-controls="genero">
                                Género
                            </button>
                        </h2>
                        <div id="genero" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="form-check mb-3"><input class="form-check-input" type="checkbox"
                                        id="femenino"><label class="form-check-label" for="femenino">Femenino</label>
                                </div>
                                <div class="form-check mb-3"><input class="form-check-input" type="checkbox"
                                        id="masculino"><label class="form-check-label" for="masculino">Masculino</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Producto -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#producto" aria-expanded="false" aria-controls="producto">
                                Producto
                            </button>
                        </h2>
                        <div id="producto" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="form-check mb-3"><input class="form-check-input" type="checkbox"
                                        id="paletas"><label class="form-check-label" for="paletas">Paletas</label></div>
                                <div class="form-check mb-3"><input class="form-check-input" type="checkbox"
                                        id="pelotas"><label class="form-check-label" for="pelotas">Pelotas</label></div>
                                <div class="form-check mb-3"><input class="form-check-input" type="checkbox"
                                        id="paleteras"><label class="form-check-label" for="paleteras">Paleteras</label>
                                </div>
                                <div class="form-check mb-3"><input class="form-check-input" type="checkbox"
                                        id="muñequeras"><label class="form-check-label"
                                        for="muñequeras">Muñequeras</label></div>
                                <div class="form-check mb-3"><input class="form-check-input" type="checkbox"
                                        id="grips"><label class="form-check-label" for="grips">Grips</label></div>
                            </div>
                        </div>
                    </div>

                    <!-- Precio -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#precio" aria-expanded="false" aria-controls="precio">
                                Precio
                            </button>
                        </h2>
                        <div id="precio" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="d-flex align-items-center gap-3">
                                    <label for="precioDesde" class="form-label mb-0">Desde:</label>
                                    <input type="number" class="form-control form-control-sm" id="precioDesde"
                                        placeholder="$0" style="width: 100px;">

                                    <label for="precioHasta" class="form-label mb-0">Hasta:</label>
                                    <input type="number" class="form-control form-control-sm" id="precioHasta"
                                        placeholder="$500000" style="width: 100px;">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="px-3 mt-4">
                        <button class="btn btn-dark w-100 aplicar" style="background-color: #00ff846a;">Aplicar
                            filtros</button>
                    </div>

                </div>

            </div>
            <div class="col-12 col-md-8 seccion-derecha">
                <div class="container py-5">
                    <div class="row g-4">

                    <!-- Tarjetas de producto -->
            <?php foreach ($productos as $producto): ?>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="tarjeta-producto"
                        data-nombre="<?= esc($producto['nombre']) ?>"
                        data-descripcion="<?= esc($producto['descripcion']) ?>"
                        data-marca="<?= esc($producto['marca']) ?>"
                        data-material="<?= esc($producto['material']) ?>"
                        data-genero="<?= esc($producto['categoria']) ?>"
                        data-imagen="<?= base_url('uploads/' . ($producto['imagen_url'] ?? 'default.jpg')) ?>">
                       
                        <div class="tarjeta-imagen">
                            <img src="<?= base_url('uploads/' . ($producto['imagen_url'] ?? 'default.jpg')) ?>"
                                 alt="Paleta <?= esc($producto['nombre']) ?>">
                        </div>

                        <div class="tarjeta-info">
                            <h5 class="producto-nombre"><?= esc($producto['nombre']) ?></h5>
                            <p class="producto-precio">$<?= number_format($producto['precio'], 0, ',', '.') ?></p>
                            <button class="btn-comprar">Ver más</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            
                        <!-- Tarjetas de producto -->
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Elite"
                                data-descripcion="Diseñada para jugadoras de alto nivel, la Elite ofrece gran control, precisión y una excelente salida de bola, ideal para un juego técnico y estratégico."
                                data-marca="Bullpadel" data-material="Carbono y Goma EVA" data-genero="Mujer"
                                data-imagen="./assets/img/Mujer/bullpadelEliteWoman.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/Mujer/bullpadelEliteWoman.png" alt="Paleta Elite">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Elite</h5>
                                    <p class="producto-precio">$470.000</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Equation Light Advanced"
                                data-descripcion="Combinación perfecta de control, ligereza y confort. Ideal para jugadoras intermedias que buscan precisión sin esfuerzo y mayor comodidad en cada golpe."
                                data-marca="Nox" data-material="Fibra de vidrio y Goma EVA" data-genero="Mujer"
                                data-imagen="./assets/img/Mujer/noxEquationLightAdvanced.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/Mujer/noxEquationLightAdvanced.png" alt="Paleta Equation">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Equation Light Advanced</h5>
                                    <p class="producto-precio">$313.600 </p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Metalbone Carbon Control"
                                data-descripcion="Precisión extrema y tacto excepcional. Ideal para jugadoras que priorizan el control en cada golpe, con una estructura ligera y firme para máximo rendimiento defensivo." data-marca="Adidas"
                                data-material="Carbono" data-genero="Mujer"
                                data-imagen="./assets/img/Mujer/adidasMetalboneCarbonControl.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/Mujer/adidasMetalboneCarbonControl.png" alt="Paleta Metalbone">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Metalbone Carbon Control</h5>
                                    <p class="producto-precio">$451.999</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Flow"
                                data-descripcion="Ligera, potente y versátil, la Flow es la elección de Alejandra Salazar: pensada para jugadoras que buscan agresividad en el juego sin renunciar al control y la manejabilidad."
                                data-marca="Bullpadel" data-material="Carbono y Goma EVA" data-genero="Mujer"
                                data-imagen="./assets/img/Mujer/bullpadelFlow.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/Mujer/bullpadelFlow.png" alt="Paleta Flow">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Flow</h5>
                                    <p class="producto-precio">$550.000</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Vertex"
                                data-descripcion="Paleta de forma diamante con excelente potencia y balance alto, ideal para jugadoras ofensivas que buscan un rendimiento profesional sin perder control."
                                data-marca="Bullpadel" data-material="Carbono y Goma EVA" data-genero="Mujer"
                                data-imagen="./assets/img/Mujer/bullpadelVertex.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/Mujer/bullpadelVertex.png" alt="Paleta Vertex">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Vertex</h5>
                                    <p class="producto-precio">$342.000</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>
          <!-- Sección Hombres -->
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="AT10"
                                data-descripcion="Diseñada junto a Agustín Tapia, la AT10 combina control y salida de bola con una gran manejabilidad. Ideal para jugadores técnicos que no quieren perder potencia."
                                data-marca="Nox" data-material="Carbono y Goma EVA" data-genero="Hombre"
                                data-imagen="./assets/img/men/at10.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/men/at10.png" alt="Paleta Nox">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">AT10</h5>
                                    <p class="producto-precio">$450.000</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Fenix"
                                data-descripcion="Potente y equilibrada, la Fenix 12K está pensada para jugadores ofensivos que buscan pegada sin perder control. Ideal para nivel avanzado o profesional."
                                data-marca="Siux" data-material="Carbono y Goma EVA" data-genero="Hombre"
                                data-imagen="./assets/img/men/fenix.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/men/fenix.png" alt="Paleta Siux">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Fenix</h5>
                                    <p class="producto-precio">$548.000</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Gravity"
                                data-descripcion="Control y precisión en una pala con amplio punto dulce. Ideal para jugadores que buscan comodidad y maniobrabilidad sin perder potencia."
                                data-marca="Head" data-material="Carbono y Goma EVA" data-genero="Hombre"
                                data-imagen="./assets/img/men/gravity.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/men/gravity.png" alt="Paleta Head">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Gravity</h5>
                                    <p class="producto-precio">$548.000</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Speed"
                                data-descripcion="Potencia y control equilibrados para jugadores intermedios que buscan un golpeo rápido y preciso con gran comodidad."
                                data-marca="OdPro" data-material="Carbono y Goma EVA" data-genero="Hombre"
                                data-imagen="./assets/img/men/odpro.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/men/odpro.png" alt="Paleta OdPro">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Speed</h5>
                                    <p class="producto-precio">$319.000</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Radical"
                                data-descripcion="Versátil y equilibrada, la Radical Head ofrece potencia y control para jugadores avanzados que buscan precisión y comodidad en cada golpe."
                                data-marca="Head" data-material="Carbono y Goma EVA" data-genero="Hombre"
                                data-imagen="./assets/img/men/radical.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/men/radical.png" alt="Paleta Head">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Radical</h5>
                                    <p class="producto-precio">$305.000</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Technical"
                                data-descripcion="En la paleta del Lobo encontrás potencia explosiva y control avanzado para jugadores ofensivos que buscan precisión en cada golpe."
                                data-marca="Babolat" data-material="Carbono y Goma EVA" data-genero="Hombre"
                                data-imagen="./assets/img/men/technical.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/men/technical.png" alt="Paleta Babolat">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Technical</h5>
                                    <p class="producto-precio">$450.000</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>
<!-- Accesorios -->
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Canasto"
                                data-descripcion="Canasto clásico para pádel, ideal para transportar y almacenar pelotas con facilidad. Resistente y práctico para tus entrenamientos y partidos."
                                data-marca="Head" data-material="Tela" data-genero="Unisex"
                                data-imagen="./assets/img/accesorios/canasto.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/accesorios/canasto.png" alt="Canasto Head">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Canasto Head</h5>
                                    <p class="producto-precio">$200.000</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Pelotas Dunlop"
                                data-descripcion="Pelotas duraderas con rebote constante, ideales para entrenamientos y partidos."
                                data-marca="Dunlop" data-material="Fieltro" data-genero="Unisex"
                                data-imagen="./assets/img/accesorios/dunlop.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/accesorios/dunlop.png" alt="Pelotas Dunlop">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Pelotas Dunlop</h5>
                                    <p class="producto-precio">$12.900</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Cubre Grip Adidas"
                                data-descripcion="Protección cómoda y antideslizante para el mango de tu pala, que mejora el agarre y prolonga la vida útil del grip original."
                                data-marca="Adidas" data-material="Poliuretano" data-genero="Unisex"
                                data-imagen="./assets/img/accesorios/gripadidas.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/accesorios/gripadidas.png" alt="Cubre Grip Adidas">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Cubre Grip Adidas</h5>
                                    <p class="producto-precio">$15.000</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Hesacore"
                                data-descripcion="Empuñadura ergonómica que mejora el agarre, reduce vibraciones y disminuye la fatiga en el brazo, ideal para mayor confort y control."
                                data-marca="BullPadel" data-material="Termoplástica (TPR)" data-genero="Unisex"
                                data-imagen="./assets/img/accesorios/hesacore.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/accesorios/hesacore.png" alt="Hesacore BullPadel">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Hesacore BullPadel</h5>
                                    <p class="producto-precio">$13.000</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Protector"
                                data-descripcion="Cinta adhesiva resistente que protege la parte superior de la pala contra golpes y raspones, sin afectar el equilibrio ni el rendimiento."
                                data-marca="Palbea" data-material="Poliuretano" data-genero="Unisex"
                                data-imagen="./assets/img/accesorios/protector.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/accesorios/protector.png" alt="Protector">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Protector</h5>
                                    <p class="producto-precio">$6.000</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Resina"
                                data-descripcion="Resina líquida que mejora el grip al máximo, ideal para mantener las manos secas y asegurar un agarre firme durante todo el partido."
                                data-marca="2 Win Padel" data-material="Resina" data-genero="Unisex"
                                data-imagen="./assets/img/accesorios/resina.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/accesorios/resina.png" alt="Resina">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Resina</h5>
                                    <p class="producto-precio">$10.000</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

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
                                        <p><strong>Género:</strong> <span class="genero"></span></p>
                                        <div class="cantidad-container">
                                            <label for="cantidad">Cantidad:</label>
                                            <input type="number" id="cantidad" name="cantidad" min="1" value="1">
                                        </div>
                                        <button class="btn-agregar">Agregar al carrito</button>
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



    <!-- Solo el JS de Bootstrap (funcionalidad de carrusel) -->
    <script src="assets/js/bootstrap.bundle.min.js" integrity="" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>