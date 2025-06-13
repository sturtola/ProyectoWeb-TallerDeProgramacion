
<h2>Agregar Producto</h2>
<form action="<?= base_url('producto_controller/guardar') ?>" method="post">
    <label>Nombre:</label><input type="text" name="nombre" required><br>
    <label>Descripción:</label><textarea name="descripcion" required></textarea><br>
    <label>Precio:</label><input type="number" step="0.01" name="precio" required><br>
    <label>Stock:</label><input type="number" name="stock" required><br>
    <label>Imagen:</label><input type="file" name="imagen" accept="image/*"><br>    
    <label>Categoría:</label>
    <select name="categoria" required>
        <option value="mujer">Mujer</option>
        <option value="hombre">Hombre</option>
        <option value="accesorio">Accesorio</option>
    </select><br>
    <label>Marca:</label><input type="text" name="marca" required><br>
    <label>Material:</label><input type="text" name="material" required><br>
    <label>Modelo:</label><input type="text" name="modelo"><br>
    <label>Descuento (%):</label><input type="number" step="0.01" name="descuento"><br>

    <button type="submit">Guardar</button>
</form>
<a href="<?= base_url('producto_controller') ?>">Volver</a>
