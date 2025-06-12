<h2>Editar Usuario</h2>
<form action="<?= base_url('usuario_controller/actualizar/' . $usuario['id_usuario']) ?>" method="post">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= $usuario['nombre'] ?>" required><br>

    <label>Apellido:</label>
    <input type="text" name="apellido" value="<?= $usuario['apellido'] ?>" required><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?= $usuario['email'] ?>" required><br>

    <label>Teléfono:</label>
    <input type="text" name="telefono" value="<?= $usuario['telefono'] ?>"><br>

    <label>Contraseña (dejar vacío si no se cambia):</label>
    <input type="password" name="contraseña"><br>

    <label>Rol:</label>
    <select name="rol" required>
        <option value="cliente" <?= $usuario['rol'] == 'cliente' ? 'selected' : '' ?>>Cliente</option>
        <option value="admin" <?= $usuario['rol'] == 'admin' ? 'selected' : '' ?>>Admin</option>
    </select><br>

    <button type="submit">Actualizar</button>
</form>
<a href="<?= base_url('usuario_controller') ?>">Volver</a>
