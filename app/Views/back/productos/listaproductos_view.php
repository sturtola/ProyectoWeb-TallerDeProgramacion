<h2>Lista de Productos</h2>
<a href="<?= base_url('producto_controller/agregar') ?>">Agregar Producto</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th><th>Nombre</th><th>Precio</th><th>Stock</th><th>Categoría</th><th>Acciones</th>
    </tr>
    <?php foreach ($productos as $producto): ?>
    <tr>
        <td><?= $producto['id_producto'] ?></td>
        <td><?= $producto['nombre'] ?></td>
        <td><?= $producto['precio'] ?></td>
        <td><?= $producto['stock'] ?></td>
        <td><?= $producto['categoria'] ?></td>
        <td>
            <a href="<?= base_url('producto_controller/editar/' . $producto['id_producto']) ?>">Editar</a> |
            <a href="<?= base_url('producto_controller/eliminar/' . $producto['id_producto']) ?>" onclick="return confirm('¿Eliminar producto?')">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>