<h2>Agregar Usuario</h2>

<form action="<?= site_url('usuario/guardar') ?>" method="post" >
    
  <label>Nombre:</label>
  <input type="text" name="nombre" required><br>

  <label>Apellido:</label>
  <input type="text" name="apellido" required><br>

  <label>Telefono:</label>
  <input type="number" name="telefono"><br>

  <label>Email:</label>
  <input type="email" name="email" required><br>

  <label>Contraseña:</label>
  <input type="password" name="contraseña" required><br>

  <label>Rol:</label>
  <select name="rol">
    <option value="admin">Administrador</option>
    <option value="cliente">Cliente</option>
  </select><br>

  <button type="submit">Guardar</button>
</form>

