<h1>Listado de Pedidos</h1>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID Pedido</th>
            <th>Cliente</th>
            <th>Productos</th>
            <th>Subtotal</th>
            <th>Total</th>
            <th>Tipo Entrega</th>
            <th>Método Pago</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($pedidos as $pedido): ?>
        <tr>
            <td><?= $pedido['id_pedido'] ?></td>
            <td><?= esc($pedido['usuario']['nombre']) . ' ' . esc($pedido['usuario']['apellido']) ?></td>
            <td>
                <?php 
                    $productosPedido = $pedidoProductoModel = new \App\Models\PedidoProductoModel();
                    $productos = $productosPedido->where('id_pedido', $pedido['id_pedido'])->findAll();
                    foreach ($productos as $prod) {
                        echo esc($prod['nombre_producto']) . ' (x' . $prod['cantidad'] . ')<br>';
                    }
                ?>
            </td>
            <td>$<?= number_format($pedido['subtotal'], 2, ',', '.') ?></td>
            <td>$<?= number_format($pedido['total'], 2, ',', '.') ?></td>
            <td><?= ucfirst(esc($pedido['tipo_entrega'])) ?></td>
            <td><?= ucfirst(esc($pedido['metodo_pago'])) ?></td>
            <td><?= ucfirst(esc($pedido['estado'])) ?></td>
            <td>
                <a href="<?= base_url('/admin/pedidos/ver/' . $pedido['id_pedido']) ?>" class="btn btn-primary btn-sm">Ver</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>