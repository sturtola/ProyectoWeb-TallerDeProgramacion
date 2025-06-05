<!-- Views/back/listar_usuarios.php -->
<h2>Listado de Usuarios</h2>

<a href="<?= site_url('usuario/crear') ?>" class="btn btn-primary">Agregar Usuario</a>

<table border="1" cellpadding="10">
  <thead>
    <tr>
      <th>ID</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Email</th><th>Rol</th><th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($usuarios as $usuario): ?>
      <tr>
        <td><?= $usuario['id'] ?></td>
        <td><?= $usuario['nombre'] ?></td>
        <td><?= $usuario['apellido'] ?></td>
        <td><?= $usuario['telefono'] ?></td>
        <td><?= $usuario['email'] ?></td>
        <td><?= $usuario['rol'] ?></td>
        <td>
          <a href="<?= site_url('usuario/editar/' . $usuario['id']) ?>">Editar</a>
          <form action="<?= site_url('usuario/eliminar/' . $usuario['id']) ?>" method="post" style="display:inline;">
            <button type="submit" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
