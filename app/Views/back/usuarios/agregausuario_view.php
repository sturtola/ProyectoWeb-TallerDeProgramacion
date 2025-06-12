<h2>Agregar Usuario</h2>
<form action="<?= base_url('usuario_controller/guardar') ?>" method="post">
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br>

    <label>Apellido:</label>
    <input type="text" name="apellido" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Teléfono:</label>
    <input type="text" name="telefono"><br>

    <label>Contraseña:</label>
    <input type="password" name="contraseña" required><br>

    <label>Rol:</label>
    <select name="rol" required>
        <option value="cliente">Cliente</option>
        <option value="admin">Admin</option>
    </select><br>

    <button type="submit">Guardar</button>
</form>
<a href="<?= base_url('usuario_controller') ?>">Volver a la lista</a>