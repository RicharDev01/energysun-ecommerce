<?php

use App\Config\Parameters;

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Reporte de Factura</title>
  <style>
    /* General */
    body {
      font-family: Arial, sans-serif;
      color: #ffffff;
      background-color: #17343F;
    }

    /* Encabezado */
    .header {
      background-color: #17343F;
      color: #ffffff;
      padding: 20px;
    }

    .header table {
      width: 100%;
    }

    .header h1 {
      margin: 0;
      font-size: 28px;
    }

    .header p {
      font-size: 14px;
      margin: 5px 0;
    }

    /* Sección de información del cliente */
    .customer-info {
      padding: 20px;
      border-bottom: 4px solid #17343F;
      margin: 20px 0;
    }

    .customer-info h2 {
      color: #17343F;
      font-size: 18px;
    }

    .customer-info p {
      margin: 5px 0;
    }

    /* Tabla de detalles de la factura */
    .invoice-details {
      width: 100%;
      border-collapse: collapse;
    }

    .invoice-details th,
    .invoice-details td {
      padding: 10px;
      text-align: center;
      border: 1px solid #9EF37A;
    }

    .invoice-details th {
      background-color: #9EF37A;
      color: #17343F;
    }

    .invoice-details tbody tr:nth-child(even) {
      background-color: #2C4B57;
    }

    /* Total */
    .total {
      margin-top: 20px;
      text-align: right;
      font-size: 16px;
      padding: 10px;
    }
  </style>

</head>

<body>
  <!-- Encabezado -->
  <div class="header">

    <table>
      <tr>

        <td class="info__cliente" style="width: 70%; text-align: left;">
          <h1>EnergySun</h1>
          <p>Factura #: <?php echo '0001' ?></p>
          <p>Fecha de Emisión: <?php echo '27/10/2024'; ?></p>
          <p>Método de Pago: <?php echo 'medios electronicos'; ?></p>
        </td>

        <td class="logotipo" style="width: 25%; text-align: right;" colspan="">
          <img src="<?= Parameters::BASE_URL ?>/resources/images/logo-energysun-blanco.png" width="100" alt="">
          <h3>EnergySun</h3>
        </td>
      </tr>
    </table>

  </div>

  <!-- Información del Cliente -->
  <div class="customer-info">
    <h2>Datos del Cliente</h2>
    <p><strong>Nombre:</strong>
      <!-- <?= $cliente['CLI_PRIMER_NOM'] . ' ' . $cliente['CLI_SEGUNDO_NOM'] . ' ' . $cliente['CLI_PRIMER_APE'] . ' ' . $cliente['CLI_SEGUNDO_APE'] ?> -->
      <?php echo 'Mario Ricardo Pineda'; ?>
    </p>
    <p><strong>Teléfono:</strong> <?= '76021442' ?></p>
  </div>

  <!-- Detalles de la Factura -->
  <table class="invoice-details">
    <thead>
      <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio Unitario</th>
        <th>Impuesto</th>
        <th>Descuento</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <!-- <?php foreach ($detalles as $detalle): ?>
                <tr>
                    <td><?= $detalle['PROD_NOMBRE'] ?></td>
                    <td><?= $detalle['DET_CANTIDAD'] ?></td>
                    <td>$<?= number_format($detalle['PROD_PRECIO'], 2) ?></td>
                    <td><?= $detalle['DET_IMPUESTO'] ?>%</td>
                    <td><?= $detalle['DET_DESCUENTOS'] ?>%</td>
                    <td>$<?= number_format($detalle['DET_TOTAL'], 2) ?></td>
                </tr>
            <?php endforeach; ?> -->
      <tr>
        <td><?php echo 'Nombre del producto'; ?></td>
        <td><?php echo 2 ?></td>
        <td>$<?php number_format(2024.5, 2) ?></td>
        <td><?php 13 ?>%</td>
        <td><?= 25 ?>%</td>
        <td>$<?= number_format(1256.5, 2) ?></td>
      </tr>
      <tr>
        <td><?php echo 'Nombre del producto'; ?></td>
        <td><?php echo 2 ?></td>
        <td>$<?php number_format(2024.5, 2) ?></td>
        <td><?php 13 ?>%</td>
        <td><?= 25 ?>%</td>
        <td>$<?= number_format(1256.5, 2) ?></td>
      </tr>
      <tr>
        <td><?php echo 'Nombre del producto'; ?></td>
        <td><?php echo 2 ?></td>
        <td>$<?php number_format(2024.5, 2) ?></td>
        <td><?php 13 ?>%</td>
        <td><?= 25 ?>%</td>
        <td>$<?= number_format(1256.5, 2) ?></td>
      </tr>
    </tbody>
  </table>

  <!-- Total General -->
  <div class="total">
    <!-- <strong>Total Factura:</strong> $<?= number_format($total_factura, 2) ?> -->
    <strong>Total Factura:</strong> $<?= number_format(1256.5, 2) ?>
  </div>
</body>

</html>