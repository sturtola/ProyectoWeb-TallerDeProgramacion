<div class="container mt-5">
    <h2 class="mb-4">Listado de Consultas</h2>

    <?php if (session()->getFlashdata('message')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Mensaje</th>
                <th>Fecha de Envío</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($consultas)): ?>
                <?php foreach ($consultas as $consulta): ?>
                    <tr>
                        <td><?= $consulta['id_consulta'] ?></td>
                        <td><?= esc($consulta['nombre']) ?></td>
                        <td><?= esc($consulta['email']) ?></td>
                        <td><?= esc($consulta['telefono'] ?? '-') ?></td>
                        <td><?= esc($consulta['mensaje']) ?></td>
                        <td><?= $consulta['fecha_envio'] ?></td>
                        <td>
                            <a href="<?= base_url('consulta_controller/eliminar/' . $consulta['id_consulta']) ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('¿Estás seguro de que deseas eliminar esta consulta?')">
                               Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">No hay consultas registradas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>