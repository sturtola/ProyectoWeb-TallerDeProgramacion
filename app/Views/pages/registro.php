<div class="container d-flex justify-content-center" style="padding-top: 20vh; padding-bottom: 10vh;" id="inicio-registro">
  <div class="card shadow border-0" style="width: 70vh;">
    <div class="card-body" style="background-color: rgba(22, 22, 22, 0.867); color: white;">
      <h2 class="card-title mb-4 text-center fw-light display-6">Registrarse</h2>

      <form>
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control border-0" id="nombre" placeholder="Ej: Juan" required style="background-color: rgba(9, 9, 9, 0.87);">
        </div>
        <div class="mb-3">
          <label for="apellido" class="form-label">Apellido</label>
          <input type="text" class="form-control border-0" id="apellido" placeholder="Ej: Perez" required style="background-color: rgba(9, 9, 9, 0.87);">
        </div>
        <div class="mb-3">
          <label for="registroEmail" class="form-label">Email</label>
          <input type="email" class="form-control border-0" id="registroEmail" placeholder="Ej: juanpperez@email.com" required style="background-color: rgba(9, 9, 9, 0.87);">
        </div>
        <div class="mb-3">
          <label for="registroPassword" class="form-label">Contraseña</label>
          <input type="password" class="form-control border-0" id="registroPassword" placeholder="Contraseña..." required style="background-color: rgba(9, 9, 9, 0.87);">
        </div>
        <div class="mb-3">
          <label for="telefono" class="form-label">Teléfono (opcional)</label>
          <input type="tel" class="form-control border-0" id="telefono" placeholder="Ej: (3774)-504134" style="background-color: rgba(9, 9, 9, 0.87);">
        </div>
        <button type="submit" class="btn btn-success w-100">Registrarse</button>
        <p class="text-center mt-3">
          ¿Ya tenés una cuenta?
          <a href="<?= base_url('/IniciarSesion#inicio-sesion') ?>">Iniciar Sesión</a>
        </p>
      </form>
    </div>
  </div>
</div>
