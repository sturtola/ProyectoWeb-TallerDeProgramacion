<div class="container d-flex justify-content-center" style="padding-top: 20vh; padding-bottom: 10vh;" id="inicio-sesion">
  <div class="card shadow border-0" style="width: 70vh;">
    <div class="card-body" style="background-color: rgba(22, 22, 22, 0.867); color: white;">
      <h2 class="card-title mb-4 text-center fw-light display-6">Iniciar Sesión</h2>

      <?php if (session()->getFlashdata('error')): ?>
        <p style="color:red"><?= session()->getFlashdata('error') ?></p>
      <?php endif; ?>


      <form action="<?= site_url('auth/login') ?>" method="post">
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" class="form-control border-0" id="email" name="email" style="background-color: rgba(9, 9, 9, 0.87);"
            value="<?= old('email') ?>" required placeholder="juanperez@email.com">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Contraseña:</label>
          <input type="password" class="form-control border-0" id="password" style="background-color: rgba(9, 9, 9, 0.87);"
            name="contaseña" rows="3" value="<?= old('contraseña') ?>" required placeholder="Contraseña...">
        </div>
        <button type="submit" class="btn btn-success w-100">Ingresar</button>
        <div class="mb-3">
          <p class="text-center mt-3">
            ¿No tenés una cuenta?
            <a href="<?= base_url('/Registrarse#inicio-registro') ?>">Registrate</a>
          </p>
        </div>
      </form>

    </div>
  </div>
</div>