<h1>Detalle del Pedido #<?= $pedido['id_pedido'] ?></h1>

<p><strong>Cliente:</strong> <?= esc($usuario['nombre']) . ' ' . esc($usuario['apellido']) ?></p>
<p><strong>Estado:</strong> <?= ucfirst(esc($pedido['estado'])) ?></p>

<h3>Productos</h3>
<table class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $prod): ?>
            <tr>
                <td><?= esc($prod['nombre_producto']) ?></td>
                <td><?= $prod['cantidad'] ?></td>
                <td>$<?= number_format($prod['precio_unitario'], 2, ',', '.') ?></td>
                <td>$<?= number_format($prod['subtotal'], 2, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php if ($domicilio): ?>
    <h3>Domicilio de Envío</h3>
    <p><?= esc($domicilio['calle']) ?> <?= esc($domicilio['numero']) ?>, <?= esc($domicilio['provincia']) ?></p>
    <p><?= esc($domicilio['descripcion']) ?></p>
<?php endif; ?>

<form id="form-estado" method="post" action="<?= base_url('/admin/pedidos/cambiarEstado') ?>">
    <input type="hidden" name="id_pedido" value="<?= $pedido['id_pedido'] ?>">
    <label for="estado">Cambiar Estado:</label>
    <select name="estado" id="estado" class="form-select" onchange="document.getElementById('form-estado').submit()">
        <option value="pendiente" <?= $pedido['estado'] === 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
        <option value="pagado" <?= $pedido['estado'] === 'pagado' ? 'selected' : '' ?>>Pagado</option>
        <option value="empaquetado" <?= $pedido['estado'] === 'empaquetado' ? 'selected' : '' ?>>Empaquetado</option>
        <option value="enviado" <?= $pedido['estado'] === 'enviado' ? 'selected' : '' ?>>Enviado</option>
        <option value="retirado" <?= $pedido['estado'] === 'retirado' ? 'selected' : '' ?>>Retirado</option>
    </select>
</form>