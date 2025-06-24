<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura - Pedido N° <?= esc($pedido['id_pedido'] ?? 'N/A') ?> - Auren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #212529;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding: 20px 0;
        }

        .invoice-container {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
            margin: 20px auto;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 15px;
        }

        .invoice-header .left-col,
        .invoice-header .right-col {
            flex: 1;
        }

        .invoice-header .logo {
            max-height: 120px;
            width: auto;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
        }

        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 20px;
        }

        .invoice-details .client-info,
        .invoice-details .company-info {
            flex: 1;
            padding-right: 20px;
        }

        .invoice-details .company-info {
            padding-left: 20px;
            border-left: 1px solid #dee2e6;
        }

        .invoice-table {
            width: 100%;
            margin-bottom: 30px;
            border-collapse: collapse;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #dee2e6;
            padding: 10px 15px;
            text-align: left;
        }

        .invoice-table thead th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .invoice-summary {
            margin-top: 20px;
            text-align: right;
        }

        .invoice-summary p {
            font-size: 1.1rem;
        }

        .invoice-summary .total {
            font-size: 1.4rem;
            font-weight: bold;
            border-top: 2px solid #212529;
            padding-top: 10px;
            margin-top: 15px;
        }

        .delivery-box {
            border: 1px solid #dee2e6;
            padding: 15px;
            background-color: #f8f9fa;
            margin-top: 30px;
        }

        .footer-invoice {
            text-align: center;
            margin-top: 40px;
            font-size: 0.85rem;
            color: #6c757d;
            border-top: 1px solid #dee2e6;
            padding-top: 20px;
        }

        .invoice-actions {
            text-align: center;
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }

        .btn-action,
        .btn-back-home {
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #fff;
            border: none;
        }

        .btn-action {
            background-color: #6c757d;
        }

        .btn-action:hover {
            background-color: #5a6268;
            transform: scale(1.02);
        }

        .btn-back-home {
            background-color: #007bff;
        }

        .btn-back-home:hover {
            background-color: #0056b3;
            transform: scale(1.02);
        }

        @media print {
            .invoice-actions { display: none; }
        }
    </style>
</head>
<body>
    <div class="invoice-container" id="invoice-content">
        <div class="invoice-header">
            <div class="left-col">
                <h1>Factura Tipo A</h1>
                <p><strong>N° de Factura:</strong> <?= esc($pedido['id_pedido'] ?? 'N/A') ?></p>
                <p><strong>Fecha:</strong> <?= date('d/m/Y H:i', strtotime($pedido['fecha'] ?? 'now')) ?></p>
            </div>
            <div class="right-col text-end">
                <img src="<?= base_url('assets/img/nombremarca1.png') ?>" alt="Logo Auren" class="logo">
            </div>
        </div>

        <div class="invoice-details">
            <div class="client-info">
                <h3>DATOS DEL CLIENTE</h3>
                <p><strong>Nombre:</strong> <?= esc($pedido['nombre'] ?? '') ?> <?= esc($pedido['apellido'] ?? '') ?></p>
                <p><strong>Email:</strong> <?= esc($pedido['email'] ?? '') ?></p>
                <p><strong>Teléfono:</strong> <?= !empty($pedido['telefono']) ? esc($pedido['telefono']) : '-' ?></p>
            </div>
            <div class="company-info">
                <h3>DATOS DE LA EMPRESA</h3>
                <p><strong>Auren Padel Store</strong></p>
                <p>Email: auren@gmail.com</p>
                <p>Teléfono: +54 3704 770647</p>
                <p>Dirección: Junin 1557, CP 3400, Corrientes, Argentina</p>
            </div>
        </div>

        <h4>Detalle de Productos:</h4>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $subtotal_productos = 0; ?>
                <?php foreach ($productos as $p): ?>
                    <tr>
                        <td><?= esc($p['nombre_producto']) ?></td>
                        <td><?= esc($p['cantidad']) ?></td>
                        <td>$<?= number_format($p['precio_unitario'], 2, ',', '.') ?></td>
                        <td>$<?= number_format($p['subtotal'], 2, ',', '.') ?></td>
                    </tr>
                    <?php $subtotal_productos += $p['subtotal']; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php 
            $costo_envio = ($pedido['tipo_entrega'] === 'envio_domicilio') ? 7200 : 0;
            $total_con_envio = $subtotal_productos + $costo_envio;
        ?>

        <div class="invoice-summary">
            <p><strong>Costo de Envío:</strong> $<?= number_format($costo_envio, 2, ',', '.') ?></p>
            <p class="total"><strong>TOTAL:</strong> $<?= number_format($total_con_envio, 2, ',', '.') ?></p>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="delivery-box">
                    <h4>Tipo de Entrega</h4>
                    <p><?= $pedido['tipo_entrega'] === 'envio' ? 'Envío a domicilio' : 'Retiro en tienda' ?></p>
                    <?php if ($pedido['tipo_entrega'] === 'envio' && !empty($pedido['domicilio'])): ?>
                        <p><strong>Provincia:</strong> <?= esc($pedido['domicilio']['provincia'] ?? '-') ?></p>
                        <p><strong>Calle:</strong> <?= esc($pedido['domicilio']['calle'] ?? '-') ?></p>
                        <p><strong>Número:</strong> <?= esc($pedido['domicilio']['numero'] ?? '-') ?></p>
                        <p><strong>Descripción:</strong> <?= esc($pedido['domicilio']['descripcion'] ?? '-') ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="delivery-box">
                    <h4>Forma de Pago</h4>
                    <p><?= ucfirst(esc($pedido['metodo_pago'] ?? 'N/A')) ?></p>
                </div>
            </div>
        </div>

        <div class="footer-invoice">
            <p>Gracias por tu compra en Auren Padel Store. ¡Esperamos verte de nuevo!</p>
            <p>www.auren.com.ar</p>
        </div>
    </div>

    <div class="invoice-actions container">
        <button id="downloadPdf" class="btn btn-action">
            <i class="bi bi-file-earmark-pdf"></i> Descargar PDF
        </button>
        <button id="printInvoice" class="btn btn-action">
            <i class="bi bi-printer"></i> Imprimir Factura
        </button>
        <a href="<?= base_url('/') ?>" class="btn btn-back-home">
            <i class="bi bi-house-door"></i> Volver al Inicio
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        document.getElementById('downloadPdf').addEventListener('click', function () {
            const invoiceContent = document.getElementById('invoice-content');
            html2pdf().from(invoiceContent).set({
                margin: 10,
                filename: 'Factura_Auren_Pedido_<?= esc($pedido['id_pedido'] ?? 'N/A') ?>.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            }).save();
        });

        document.getElementById('printInvoice').addEventListener('click', function () {
            window.print();
        });
    </script>
</body>
</html>