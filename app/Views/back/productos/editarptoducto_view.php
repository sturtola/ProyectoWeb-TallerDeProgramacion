
<h2>Editar Producto</h2>
<form action="<?= base_url('producto_controller/actualizar/' . $producto['id_producto']) ?>" method="post">
    <label>Nombre:</label><input type="text" name="nombre" value="<?= $producto['nombre'] ?>" required><br>
    <label>Descripción:</label><textarea name="descripcion" required><?= $producto['descripcion'] ?></textarea><br>
    <label>Precio:</label><input type="number" step="0.01" name="precio" value="<?= $producto['precio'] ?>" required><br>
    <label>Stock:</label><input type="number" name="stock" value="<?= $producto['stock'] ?>" required><br>
    <label>Imagen URL:</label><input type="text" name="imagen_url" value="<?= $producto['imagen_url'] ?>"><br>
    <label>Categoría:</label>
    <select name="categoria" required>
        <option value="mujer" <?= $producto['categoria'] == 'mujer' ? 'selected' : '' ?>>Mujer</option>
        <option value="hombre" <?= $producto['categoria'] == 'hombre' ? 'selected' : '' ?>>Hombre</option>
        <option value="accesorio" <?= $producto['categoria'] == 'accesorio' ? 'selected' : '' ?>>Accesorio</option>
    </select><br>
    <label>Marca:</label><input type="text" name="marca" value="<?= $producto['marca'] ?>" required><br>
    <label>Material:</label><input type="text" name="material" value="<?= $producto['material'] ?>" required><br>
    <label>Modelo:</label><input type="text" name="modelo" value="<?= $producto['modelo'] ?>"><br>
    <label>Descuento (%):</label><input type="number" step="0.01" name="descuento" value="<?= $producto['descuento'] ?>"><br>

    <button type="submit">Actualizar</button>
</form>
<a href="<?= base_url('producto_controller') ?>">Volver</a>
