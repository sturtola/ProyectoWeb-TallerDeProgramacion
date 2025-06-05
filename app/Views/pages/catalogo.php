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
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Elite"
                                data-descripcion="Paleta de excelente control para jugadoras técnicas."
                                data-marca="Bullpadel" data-material="Carbono y Goma EVA" data-genero="Mujer"
                                data-imagen="./assets/img/Mujer/bullpadelEliteWoman.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/Mujer/bullpadelEliteWoman.png" alt="Paleta Elite">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Elite</h5>
                                    <p class="producto-precio">$280.000</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Equation Light Advanced"
                                data-descripcion="Paleta ligera y balanceada ideal para jugadoras intermedias."
                                data-marca="Nox" data-material="Fibra de vidrio y Goma EVA" data-genero="Mujer"
                                data-imagen="./assets/img/Mujer/noxEquationLightAdvanced.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/Mujer/noxEquationLightAdvanced.png" alt="Paleta Equation">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Equation Light Advanced</h5>
                                    <p class="producto-precio">$280.000</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Metalbone Carbon Control"
                                data-descripcion="Control total y gran manejabilidad." data-marca="Adidas"
                                data-material="Carbono" data-genero="Mujer"
                                data-imagen="./assets/img/Mujer/adidasMetalboneCarbonControl.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/Mujer/adidasMetalboneCarbonControl.png" alt="Paleta Metalbone">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Metalbone Carbon Control</h5>
                                    <p class="producto-precio">$280.000</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Flow"
                                data-descripcion="Diseñada para jugadoras profesionales que buscan potencia."
                                data-marca="Bullpadel" data-material="Carbono y Goma EVA" data-genero="Mujer"
                                data-imagen="./assets/img/Mujer/bullpadelFlow.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/Mujer/bullpadelFlow.png" alt="Paleta Flow">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Flow</h5>
                                    <p class="producto-precio">$280.000</p>
                                    <button class="btn-comprar">Ver más</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="tarjeta-producto" data-nombre="Vertex"
                                data-descripcion="Paleta de alto rendimiento para jugadoras exigentes."
                                data-marca="Bullpadel" data-material="Carbono y Goma EVA" data-genero="Mujer"
                                data-imagen="./assets/img/Mujer/bullpadelVertex.png">
                                <div class="tarjeta-imagen">
                                    <img src="./assets/img/Mujer/bullpadelVertex.png" alt="Paleta Vertex">
                                </div>
                                <div class="tarjeta-info">
                                    <h5 class="producto-nombre">Vertex</h5>
                                    <p class="producto-precio">$280.000</p>
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