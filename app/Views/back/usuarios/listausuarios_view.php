<h2>Lista de Usuarios</h2>
<a href="<?= base_url('usuario_controller/agregar') ?>">Agregar Usuario</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Rol</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
    <tr>
        <td><?= $usuario['id_usuario'] ?></td>
        <td><?= $usuario['nombre'] ?></td>
        <td><?= $usuario['apellido'] ?></td>
        <td><?= $usuario['email'] ?></td>
        <td><?= $usuario['telefono'] ?></td>
        <td><?= $usuario['rol'] ?></td>
        <td>
            <a href="<?= base_url('usuario_controller/editar/' . $usuario['id_usuario']) ?>">Editar</a> |
            <a href="<?= base_url('usuario_controller/eliminar/' . $usuario['id_usuario']) ?>" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
