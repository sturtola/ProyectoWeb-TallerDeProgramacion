<section class="comercializacion" id="inicio-contacto">
    <section class="contenedor-titulos" style="padding-top: 120px">
        <div class="led-marco-entrega" style="width: 200px">
            <div class="container-marcoled-entrega">
                <h3 class="titulos-cm">Identificación</h3>
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


    <!-- ============================
    SECCIÓN: FORMULARIO DE CONTACTO
=============================== -->
    <div class="container">
        <div class="card shadow border-0">
            <div class="card-body" style="background-color: rgba(22, 22, 22, 0.867); color: white;">
                <h2 class="card-title mb-4 text-center fw-light display-6">Envianos tu consulta</h2>

                <?php if (session()->getFlashdata('message')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('message') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('validation')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('validation')->listErrors() ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('consulta_controller/guardar') ?>" method="post">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control border-0" id="nombre" name="nombre"
                            style="background-color: rgba(9, 9, 9, 0.87);" value="<?= old('nombre') ?>" required
                            placeholder="Ej: Juan Pérez">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control border-0" id="email" name="email"
                            style="background-color: rgba(9, 9, 9, 0.87);" value="<?= old('email') ?>" required
                            placeholder="Ej: juanperez@email.com">
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="text" class="form-control border-0" id="telefono" name="telefono"
                            style="background-color: rgba(9, 9, 9, 0.87);" value="<?= old('telefono') ?>"
                            placeholder="Ej: (3774)-504134">
                    </div>

                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje:</label>
                        <textarea class="form-control border-0" id="mensaje"
                            style="background-color: rgba(9, 9, 9, 0.87);" name="mensaje" rows="5" required
                            placeholder="Escribe tu consulta aquí..."><?= old('mensaje') ?></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark btn-lg"
                            style="background-color: rgba(9, 9, 9, 0.87);">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
