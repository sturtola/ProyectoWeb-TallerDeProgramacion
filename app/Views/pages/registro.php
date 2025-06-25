<div class="container d-flex justify-content-center" style="padding-top: 10vh; padding-bottom: 10vh;"
    id="inicio-registro">
    <div class="card shadow" style="width: 70vh; border-radius: 10px; border-color: rgb(22, 22, 22);">
        <div class="card-body" style="background-color: rgb(22, 22, 22); color: white;">
            <h3 class="card-title mb-4 text-center fw-light display-6">Registrarse</h3>
            <!-- Mensajes de error o éxito -->
            <?php if(session('error')): ?>
            <div class="alert alert-danger"><?= session('error') ?></div>
            <?php endif; ?>

            <?php if(session('success')): ?>
            <div class="alert alert-success"><?= session('success') ?></div>
            <?php endif; ?>

            <?php if(session('validation')): ?>
            <div class="alert alert-danger">
                <?= session('validation')->listErrors() ?>
            </div>
            <?php endif; ?>
            <form action="<?= base_url('auth/registrar') ?>" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control border-0" id="nombre" placeholder="Ej: Juan"
                        style="background-color: rgba(9, 9, 9, 0.87);" value="<?= old('nombre') ?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" name="apellido" class="form-control border-0" id="apellido"
                        placeholder="Ej: Perez" required value="<?= old('apellido') ?>"
                        style="background-color: rgba(9, 9, 9, 0.87);">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control border-0" id="email"
                        placeholder="Ej: juanpperez@email.com" required value="<?= old('email') ?>"
                        style="background-color: rgba(9, 9, 9, 0.87); color: white;">
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" name="contraseña" class="form-control border-0" id="contraseña"
                        placeholder="Contraseña..." required
                        style="background-color: rgba(9, 9, 9, 0.87); color: white;">
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Confirmar Contraseña</label>
                    <input type="password" name="contraseña_confirmar" class="form-control border-0"
                        id="contraseña_confirmar" placeholder="Confirmar Contraseña..." required
                        style="background-color: rgba(9, 9, 9, 0.87); color: white;">
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" name="telefono" class="form-control border-0" id="telefono"
                        placeholder="Ej: (3774)-504134" required value="<?= old('telefono') ?>"
                        style="background-color: rgba(9, 9, 9, 0.87); color: white;">
                </div>
                <button type="submit" class="btn btn-dark btn-lg w-100"
                    style="background-color:rgba(238, 178, 0, 0.69); font-size: medium;">Registrarse</button>
                <p class="text-center mt-3">
                    ¿Ya tenés una cuenta?
                    <a href="<?= base_url('/IniciarSesion#inicio-sesion') ?>">Iniciar Sesión</a>
                </p>
            </form>
        </div>
    </div>
</div>