<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura - Pedido N° <?= esc($pedido['id_pedido'] ?? 'N/A') ?> - Auren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa; /* Un fondo muy claro para simular el blanco */
            color: #212529; /* Texto oscuro para contraste */
            display: flex;
            flex-direction: column; /* Para centrar el contenido y que el footer quede abajo */
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding: 20px 0;
        }

        .invoice-container {
            background-color: #ffffff;
            border: 1px solid #dee2e6; /* Borde sutil para la factura */
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
            border-bottom: 1px solid #dee2e6; /* Línea separadora */
            padding-bottom: 15px;
        }

        .invoice-header .left-col,
        .invoice-header .right-col {
            flex: 1;
        }

        .invoice-header .left-col {
            text-align: left;
        }

        .invoice-header .right-col {
            text-align: right;
        }

        .invoice-header .logo {
            max-height: 80px; /* Ajusta el tamaño del logo */
            width: auto;
        }

        .invoice-header h1 {
            font-size: 1.8rem;
            margin-bottom: 5px;
            color: #212529;
        }

        .invoice-header p {
            margin-bottom: 3px;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            border-bottom: 1px solid #dee2e6; /* Línea separadora */
            padding-bottom: 20px;
        }

        .invoice-details .client-info,
        .invoice-details .company-info {
            flex: 1;
            padding-right: 20px; /* Espacio entre las columnas */
        }

        .invoice-details .company-info {
            padding-right: 0;
            padding-left: 20px; /* Espacio entre las columnas */
            border-left: 1px solid #dee2e6; /* Línea vertical divisoria */
        }

        .invoice-details h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #343a40;
        }

        .invoice-details p {
            margin-bottom: 5px;
            font-size: 0.95rem;
        }
        
        .invoice-details p strong {
            color: #212529;
        }

        .invoice-table {
            width: 100%;
            margin-bottom: 30px;
            border-collapse: collapse; /* Para que las líneas se unan */
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #dee2e6; /* Bordes para cada celda */
            padding: 10px 15px;
            text-align: left;
            color: #212529;
        }

        .invoice-table thead th {
            background-color: #f0f0f0; /* Un gris muy claro para el encabezado de la tabla */
            font-weight: bold;
        }

        .invoice-table tfoot td {
            font-weight: bold;
            background-color: #f8f9fa; /* Fondo ligeramente diferente para el total */
        }

        .invoice-summary {
            margin-top: 20px;
            text-align: right;
        }

        .invoice-summary p {
            margin-bottom: 5px;
            font-size: 1.1rem;
            color: #212529;
        }

        .invoice-summary .total {
            font-size: 1.4rem;
            font-weight: bold;
            color: #000000;
            border-top: 2px solid #212529;
            padding-top: 10px;
            margin-top: 15px;
        }

        .delivery-box {
            border: 1px solid #dee2e6;
            padding: 15px;
            margin-top: 30px;
            margin-bottom: 30px;
            background-color: #f8f9fa;
        }
        
        .delivery-box h4 {
            color: #343a40;
            margin-bottom: 10px;
        }

        .invoice-actions {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }

        .btn-action {
            background-color: #6c757d; /* Gris para acciones */
            border: none;
            color: #ffffff;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-action:hover {
            background-color: #5a6268;
            color: #ffffff;
            transform: scale(1.02);
        }

        .btn-back-home {
            background-color: #007bff; /* Azul de Bootstrap para "Volver al Inicio" */
            border: none;
            color: #ffffff;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-back-home:hover {
            background-color: #0056b3;
            color: #ffffff;
            transform: scale(1.02);
        }

        .footer-invoice {
            text-align: center;
            margin-top: 40px;
            font-size: 0.85rem;
            color: #6c757d;
            border-top: 1px solid #dee2e6;
            padding-top: 20px;
            width: 100%;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .invoice-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .invoice-header .left-col,
            .invoice-header .right-col {
                text-align: center;
                width: 100%;
            }

            .invoice-header .right-col {
                margin-top: 20px; /* Espacio entre el logo y los datos de la factura en móviles */
            }

            .invoice-details {
                flex-direction: column;
            }

            .invoice-details .client-info,
            .invoice-details .company-info {
                padding-right: 0;
                padding-left: 0;
                border-left: none;
                margin-bottom: 20px;
            }
            .invoice-details .company-info {
                border-top: 1px solid #dee2e6;
                padding-top: 20px;
            }

            .invoice-container {
                padding: 20px;
            }

            .invoice-actions {
                flex-direction: column;
            }
        }
        /* Estilos específicos para impresión */
        @media print {
            body {
                background-color: #fff;
                margin: 0;
                padding: 0;
            }
            .invoice-container {
                box-shadow: none;
                border: none;
                margin: 0;
                padding: 0;
                max-width: 100%;
                width: 100%;
            }
            .invoice-actions {
                display: none; /* Ocultar botones de acción en la impresión */
            }
            /* Asegurar que los colores y bordes se mantengan en impresión */
            .invoice-table th, .invoice-table td,
            .invoice-header, .invoice-details, .delivery-box, .footer-invoice {
                border-color: #000 !important;
            }
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
            <div class="right-col">
                <img src="<?= base_url('assets/img/nombremarca1.png') ?>" alt="Logo Auren" class="logo">
            </div>
        </div>

        <div class="invoice-details">
            <div class="client-info">
                <h3>DATOS DEL CLIENTE</h3>
                <p><strong>Nombre:</strong> <?= esc($pedido['nombre'] ?? 'N/A') ?> <?= esc($pedido['apellido'] ?? 'N/A') ?></p>
                <p><strong>Email:</strong> <?= esc($pedido['email'] ?? 'N/A') ?></p>
                <?php if (!empty($pedido['telefono'])): ?>
                    <p><strong>Teléfono:</strong> <?= esc($pedido['telefono']) ?></p>
                <?php endif; ?>
                <p><strong>Forma de Pago:</strong> <?= ucfirst(esc($pedido['metodo_pago'] ?? 'N/A')) ?></p>
                <p><strong>Tipo de Entrega:</strong> <?= ucfirst(esc($pedido['tipo_entrega'] ?? 'N/A')) ?></p>
            </div>
            <div class="company-info">
                <h3>DATOS DE LA EMPRESA</h3>
                <p><strong>Auren Padel Store</strong></p>
                <p>Email: info@auren.com.ar</p>
                <p>Teléfono: +54 9 11 1234-5678</p>
                <p>Dirección: Calle Ficticia 123, Ciudad, País</p>
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
                <?php if (!empty($productos)): ?>
                    <?php foreach ($productos as $p): ?>
                        <tr>
                            <td><?= esc($p['nombre_producto'] ?? 'N/A') ?></td>
                            <td><?= esc($p['cantidad'] ?? 0) ?></td>
                            <td>$<?= number_format($p['precio_unitario'] ?? 0, 2, ',', '.') ?></td>
                            <td>$<?= number_format($p['subtotal'] ?? 0, 2, ',', '.') ?></td>
                        </tr>
                        <?php $subtotal_productos += ($p['subtotal'] ?? 0); ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay productos en este pedido.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php 
            $costo_envio = 0;
            if (isset($pedido['tipo_entrega']) && $pedido['tipo_entrega'] === 'envio_domicilio') {
                $costo_envio = 7200; // Costo fijo de envío
            }
            $total_con_envio = $subtotal_productos + $costo_envio;
        ?>

        <div class="invoice-summary">
            <p><strong>Subtotal de Productos:</strong> $<?= number_format($subtotal_productos, 2, ',', '.') ?></p>
            <?php if ($costo_envio > 0): ?>
                <p><strong>Costo de Envío:</strong> $<?= number_format($costo_envio, 2, ',', '.') ?></p>
            <?php endif; ?>
            <p class="total"><strong>TOTAL:</strong> $<?= number_format($total_con_envio, 2, ',', '.') ?></p>
        </div>

        <?php if (!empty($pedido['domicilio']) && (isset($pedido['tipo_entrega']) && $pedido['tipo_entrega'] === 'envio_domicilio')): ?>
            <div class="delivery-box">
                <h4>Datos del Envío</h4>
                <p><strong>Dirección:</strong> <?= esc($pedido['domicilio']['calle'] ?? 'N/A') ?> <?= esc($pedido['domicilio']['numero'] ?? 'N/A') ?>, <?= esc($pedido['domicilio']['provincia'] ?? 'N/A') ?></p>
                <?php if (!empty($pedido['domicilio']['descripcion'])): ?>
                    <p><strong>Detalles adicionales:</strong> <?= esc($pedido['domicilio']['descripcion']) ?></p>
                <?php endif; ?>
            </div>
        <?php elseif (isset($pedido['tipo_entrega'])): ?>
             <div class="delivery-box">
                <h4>Tipo de Entrega:</h4>
                <p>Retiro en Tienda</p>
             </div>
        <?php endif; ?>

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
        <a href="<?= base_url('admin_dashboard') ?>" class="btn btn-back-home">
            <i class="bi bi-house-door"></i> Volver al Inicio
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        document.getElementById('downloadPdf').addEventListener('click', function () {
            const invoiceContent = document.getElementById('invoice-content');
            // Opciones de configuración para html2pdf
            const options = {
                margin: 10,
                filename: 'Factura_Auren_Pedido_<?= esc($pedido['id_pedido'] ?? 'N/A') ?>.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2, logging: true, dpi: 192, letterRendering: true },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };
            html2pdf().from(invoiceContent).set(options).save();
        });

        document.getElementById('printInvoice').addEventListener('click', function () {
            window.print();
        });
    </script>
</body>
</html>