<div class="container-fluid catalogo">
    <div class="row">
        <div class="col-12 col-md-4 seccion-izquierda">
            <div class="accordion accordion-dark" id="filtrosAcordeon">
                <!-- Marca -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#marca" aria-expanded="true" aria-controls="marca">
                            Marca
                        </button>
                    </h2>
                    <div id="marca" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="nox"><label class="form-check-label" for="nox">Nox</label></div>
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="bullpadel"><label class="form-check-label" for="bullpadel">Bullpadel</label></div>
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="puma"><label class="form-check-label" for="puma">Puma</label></div>
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="head"><label class="form-check-label" for="head">Head</label></div>
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="adidas"><label class="form-check-label" for="adidas">Adidas</label></div>
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="siux"><label class="form-check-label" for="siux">Siux</label></div>
                        </div>
                    </div>
                </div>

                <!-- Género -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#genero" aria-expanded="false" aria-controls="genero">
                            Género
                        </button>
                    </h2>
                    <div id="genero" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="femenino"><label class="form-check-label" for="femenino">Femenino</label></div>
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="masculino"><label class="form-check-label" for="masculino">Masculino</label></div>
                        </div>
                    </div>
                </div>

                <!-- Producto -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#producto" aria-expanded="false" aria-controls="producto">
                            Producto
                        </button>
                    </h2>
                    <div id="producto" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="paletas"><label class="form-check-label" for="paletas">Paletas</label></div>
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="pelotas"><label class="form-check-label" for="pelotas">Pelotas</label></div>
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="paleteras"><label class="form-check-label" for="paleteras">Paleteras</label></div>
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="muñequeras"><label class="form-check-label" for="muñequeras">Muñequeras</label></div>
                            <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="grips"><label class="form-check-label" for="grips">Grips</label></div>
                        </div>
                    </div>
                </div>

                <!-- Precio -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#precio" aria-expanded="false" aria-controls="precio">
                            Precio
                        </button>
                    </h2>
                    <div id="precio" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="d-flex align-items-center gap-3">
                                <label for="precioDesde" class="form-label mb-0">Desde:</label>
                                <input type="number" class="form-control form-control-sm" id="precioDesde" placeholder="$0" style="width: 100px;">

                                <label for="precioHasta" class="form-label mb-0">Hasta:</label>
                                <input type="number" class="form-control form-control-sm" id="precioHasta" placeholder="$500000" style="width: 100px;">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-12 col-md-8 seccion-derecha">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-12 col-md-12 col-lg-4 mb-4">
                        <div class="tarjeta">
                            <img src="./assets/img/women/EliteGemma.png">
                        </div>
                        <div>
                            <p style="color: white; padding-top: 10px;">Elite Gemma</p>
                            <p style="color: white;">$280.000</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-12 col-lg-4 mb-4">
                        <div class="tarjeta">
                            <img src="./assets/img/women/fibrawoman.png">
                        </div>
                        <div>
                            <p style="color: white; padding-top: 10px;">Fibra Woman</p>
                            <p style="color: white;">$280.000</p>
                        </div>

                    </div>

                    <div class="col-12 col-md-12 col-lg-4 mb-4">
                        <div class="tarjeta">
                            <img src="./assets/img/women/flow.png">
                        </div>
                        <div>
                            <p style="color: white; padding-top: 10px;">Flow</p>
                            <p style="color: white;">$280.000</p>
                        </div>

                    </div>

                    <div class="col-12 col-md-12 col-lg-4 mb-4">
                        <div class="tarjeta">
                            <img src="./assets/img/women/gatabriner.jpg">
                        </div>
                        <div>
                            <p style="color: white; padding-top: 10px;">Gata Briner</p>
                            <p style="color: white;">$280.000</p>
                        </div>

                    </div>

                    <div class="col-12 col-md-12 col-lg-4 mb-4">
                        <div class="tarjeta">
                            <img src="./assets/img/Mujer/EliteGemma.png">
                        </div>
                        <div>
                            <p style="color: white; padding-top: 10px;">Elite Gemma</p>
                            <p style="color: white;">$280.000</p>
                        </div>

                    </div>

                    <div class="col-12 col-md-12 col-lg-4 mb-4">
                        <div class="tarjeta">
                            <img src="./assets/img/Mujer/EliteGemma.png">
                        </div>
                        <div>
                            <p style="color: white; padding-top: 10px;">Elite Gemma</p>
                            <p style="color: white;">$280.000</p>
                        </div>

                    </div>

                    <div class="col-12 col-md-12 col-lg-4 mb-4">
                        <div class="tarjeta">
                            <img src="./assets/img/Mujer/EliteGemma.png">
                        </div>
                        <p>Elite Gemma</p>
                        <p>$280.000</p>

                    </div>


                </div>
            </div>

        </div>
    </div>
</div>