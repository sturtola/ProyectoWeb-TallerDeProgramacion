<div class="container mt-5 text-white">
    <div class="card bg-dark p-4">
        <h2 class="text-center mb-4">Factura – Pedido N° <?= esc($pedido['id_pedido']) ?></h2>

        <div class="mb-3">
            <strong>Cliente:</strong> <?= esc($pedido['nombre']) ?> <?= esc($pedido['apellido']) ?><br>
            <strong>Email:</strong> <?= esc($pedido['email']) ?><br>
            <strong>Fecha:</strong> <?= date('d/m/Y H:i', strtotime($pedido['fecha'])) ?><br>
            <strong>Estado:</strong> <span class="badge bg-info"><?= esc($pedido['estado']) ?></span>
        </div>

        <p><strong>Método de pago:</strong> <?= esc($pedido['metodo_pago']) ?></p>
        <p><strong>Tipo de entrega:</strong> <?= esc($pedido['tipo_entrega']) ?></p>

        <?php if (!empty($pedido['domicilio'])): ?>
            <p><strong>Domicilio de entrega:</strong> 
                <?= esc($pedido['domicilio']['calle']) ?> <?= esc($pedido['domicilio']['numero']) ?>, 
                <?= esc($pedido['domicilio']['provincia']) ?> 
                <?= !empty($pedido['domicilio']['descripcion']) ? ' - ' . esc($pedido['domicilio']['descripcion']) : '' ?>
            </p>
        <?php endif; ?>

        <hr class="border-light">

        <h4>Productos:</h4>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cant.</th>
                    <th>Precio unit.</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $p): ?>
                    <tr>
                        <td><?= esc($p['nombre']) ?></td>
                        <td><?= esc($p['cantidad']) ?></td>
                        <td>$<?= number_format($p['precio_unitario'], 2, ',', '.') ?></td>
                        <td>$<?= number_format($p['subtotal'], 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p><strong>Subtotal:</strong> $<?= number_format($pedido['subtotal'], 2, ',', '.') ?></p>
        <p><strong>Envío:</strong> $<?= number_format($pedido['envio'], 2, ',', '.') ?></p>
        <p><strong>Total:</strong> $<?= number_format($pedido['total'], 2, ',', '.') ?></p>

        <hr class="border-light">
        <form action="<?= base_url('admin/pedidos/actualizar_estado') ?>" method="post" class="d-flex align-items-center gap-3">
            <input type="hidden" name="id_pedido" value="<?= esc($pedido['id_pedido']) ?>">
            <select name="estado" class="form-select w-auto">
                <option <?= $pedido['estado'] == 'pendiente' ? 'selected' : '' ?>>pendiente</option>
                <option <?= $pedido['estado'] == 'pagado' ? 'selected' : '' ?>>pagado</option>
                <option <?= $pedido['estado'] == 'empaquetado' ? 'selected' : '' ?>>empaquetado</option>
                <option <?= $pedido['estado'] == 'enviado' ? 'selected' : '' ?>>enviado</option>
                <option <?= $pedido['estado'] == 'retirado' ? 'selected' : '' ?>>retirado</option>
            </select>
            <button class="btn btn-success">Actualizar estado</button>
        </form>
    </div>
</div>