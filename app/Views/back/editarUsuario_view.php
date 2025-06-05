<!-- Views/back/editar_usuario.php -->
<h2>Editar Usuario</h2>

<form action="<?= site_url('usuario/actualizar/' . $usuario['id']) ?>" method="post">
  <label>Nombre:</label>
  <input type="text" name="nombre" value="<?= $usuario['nombre'] ?>" required><br>

  <label>Apellido:</label>
  <input type="text" name="apellido" value="<?= $usuario['appellido'] ?>" required><br>

  <label>Telefono:</label>
  <input type="number" name="telefono" value="<?= $usuario['telefono'] ?>"><br>

  <label>Email:</label>
  <input type="email" name="email" value="<?= $usuario['email'] ?>" required><br>

  <label>Rol:</label>
  <select name="rol">
    <option value="admin" <?= $usuario['rol'] == 'admin' ? 'selected' : '' ?>>Administrador</option>
    <option value="cliente" <?= $usuario['rol'] == 'cliente' ? 'selected' : '' ?>>Cliente</option>
  </select><br>

  <button type="submit">Actualizar</button>
</form>
