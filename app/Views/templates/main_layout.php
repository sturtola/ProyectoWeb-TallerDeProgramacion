<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?= $title ?? 'Auren' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/icon.png') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/auren_style.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <title>Auren</title>
</head>

<body class="comercializacion">
    <header>
        <!-- Menú de navegación -->
        <?= view('components/navbar') ?>
    </header>

    <main>
        <?= $content ?? '' ?>
    </main>

    <footer>
        <!-- Pie de página -->
        <?= view('components/footer') ?>
    </footer>

    <?php if (session()->get('logueado') && session()->get('rol') === 'cliente'): ?>
        <!-- Botón flotante -->
        <button type="button" class="btn btn-success rounded-circle shadow carrito-float" data-bs-toggle="modal"
            data-bs-target="#carritoModal">
            <i class="fas fa-shopping-cart fa-lg"></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="carritoModal" tabindex="-1" aria-labelledby="carritoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="carritoModalLabel">Tu carrito</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                        $carrito = session()->get('carrito');
                        if (!$carrito || count($carrito) === 0): ?>
                            <p class="text-center">Tu carrito está vacío.</p>
                        <?php else: ?>
                            <ul class="list-group">
                                <?php foreach ($carrito as $item): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <?= esc($item['nombre']) ?> - <?= esc($item['cantidad']) ?> x $<?= esc($item['precio']) ?>
                                        <span
                                            class="badge bg-primary rounded-pill">$<?= esc($item['cantidad'] * $item['precio']) ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('carrito') ?>" class="btn btn-primary">Ir al carrito completo</a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>

<script>
    document,addEventListener("DOMContentLoaded", function(){
        if(window.location.hash === "#inicio-sesion") {
            const target = document.querySelector(window.location.hash);
            if (target){
                setTimeout(() => {
                    target.scrollIntoView({ behavior: "smooth", block: "start"});
                }, 100);
            }
        }
    });
</script>





</body>

</html>