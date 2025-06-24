
    <h1>Factura del Pedido #<?= $pedido['id_pedido'] ?></h1>

    <div class="section">
        <h2>Datos del cliente</h2>
        <p><strong>Usuario ID:</strong> <?= $pedido['id_usuario'] ?></p>
        <p><strong>Estado del pedido:</strong> <?= ucfirst($pedido['estado']) ?></p>
        <p><strong>Método de pago:</strong> <?= ucfirst($pedido['metodo_pago']) ?></p>
        <p><strong>Tipo de entrega:</strong> <?= ucfirst($pedido['tipo_entrega']) ?></p>
    </div>

    <?php if ($domicilio): ?>
    <div class="section">
        <h2>Domicilio de envío</h2>
        <p><strong>Calle:</strong> <?= esc($domicilio['calle']) ?> <?= esc($domicilio['numero']) ?></p>
        <p><strong>Provincia:</strong> <?= esc($domicilio['provincia']) ?></p>
        <p><strong>Descripción:</strong> <?= esc($domicilio['descripcion'] ?? '') ?></p>
    </div>
    <?php endif; ?>

    <div class="section">
        <h2>Productos</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $prod): ?>
                <tr>
                    <td><?= esc($prod['nombre_producto']) ?></td>
                    <td><?= esc($prod['cantidad']) ?></td>
                    <td>$<?= number_format($prod['precio_unitario'], 2, ',', '.') ?></td>
                    <td>$<?= number_format($prod['subtotal'], 2, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p class="total">Subtotal: $<?= number_format($pedido['subtotal'], 2, ',', '.') ?></p>
        <p class="total">Total: $<?= number_format($pedido['total'], 2, ',', '.') ?></p>
    </div>

    <div>
        <button onclick="window.print()">Imprimir / Descargar PDF</button>
    </div>