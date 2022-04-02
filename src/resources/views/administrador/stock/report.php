<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Example 1</title>
  <style>
    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    html {
      font-family: sans-serif;
      line-height: 1.15;
      -webkit-text-size-adjust: 100%;
      -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }

    article,
    aside,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    main,
    nav,
    section {
      display: block;
    }

    body {
      margin: 0;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #212529;
      text-align: left;
      background-color: #fff;
    }

    [tabindex="-1"]:focus:not(:focus-visible) {
      outline: 0 !important;
    }

    .container {
      width: 100%;
      padding-right: 0.75rem;
      padding-left: 0.75rem;
      margin-right: auto;
      margin-left: auto;
    }

    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }

    a {
      color: #5D6975;
      text-decoration: underline;
    }

    body {
      position: relative;
      width: 21cm;
      height: 29.7cm;
      margin: 0 auto;
      color: #001028;
      background: #FFFFFF;
      font-family: Arial, sans-serif;
      font-size: 12px;
      font-family: Arial;
    }

    header {
      padding: 10px 0;
      margin-bottom: 30px;
    }

    h1 {
      border-top: 1px solid #5D6975;
      border-bottom: 1px solid #5D6975;
      color: #5D6975;
      font-size: 2.4em;
      line-height: 1.4em;
      font-weight: normal;
      text-align: center;
      margin: 0 0 20px 0;
      background: url(dimension.png);
    }

    #project {
      float: left;
    }


    #company {
      float: right;
      text-align: right;
    }

    #project div,
    #company div {
      white-space: nowrap;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 20px;
    }

    .small {
      font-size: 1.2em;
    }

    .table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    }

    .table th,
    .table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
    }

    .table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
    }

    .table tbody + tbody {
    border-top: 2px solid #dee2e6;
    }

    .table-sm th,
    .table-sm td {
    padding: 0.3rem;
    }

    .table-bordered {
    border: 1px solid #dee2e6;
    }

    .table-bordered th,
    .table-bordered td {
    border: 1px solid #dee2e6;
    }

    .table-bordered thead th,
    .table-bordered thead td {
    border-bottom-width: 2px;
    }

    .table-borderless th,
    .table-borderless td,
    .table-borderless thead th,
    .table-borderless tbody + tbody {
    border: 0;
    }

    .table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.05);
    }

    .table-hover tbody tr:hover {
    color: #212529;
    background-color: rgba(0, 0, 0, 0.075);
    }

    .table-primary,
    .table-primary > th,
    .table-primary > td {
    background-color: #b8daff;
    }

    .table-primary th,
    .table-primary td,
    .table-primary thead th,
    .table-primary tbody + tbody {
    border-color: #7abaff;
    }

    .table-hover .table-primary:hover {
    background-color: #9fcdff;
    }

    .table-hover .table-primary:hover > td,
    .table-hover .table-primary:hover > th {
    background-color: #9fcdff;
    }

    .table-secondary,
    .table-secondary > th,
    .table-secondary > td {
    background-color: #d6d8db;
    }

    .table-secondary th,
    .table-secondary td,
    .table-secondary thead th,
    .table-secondary tbody + tbody {
    border-color: #b3b7bb;
    }

    .table-hover .table-secondary:hover {
    background-color: #c8cbcf;
    }

    .table-hover .table-secondary:hover > td,
    .table-hover .table-secondary:hover > th {
    background-color: #c8cbcf;
    }

    .table-success,
    .table-success > th,
    .table-success > td {
    background-color: #c3e6cb;
    }

    .table-success th,
    .table-success td,
    .table-success thead th,
    .table-success tbody + tbody {
    border-color: #8fd19e;
    }

    .table-hover .table-success:hover {
    background-color: #b1dfbb;
    }

    .table-hover .table-success:hover > td,
    .table-hover .table-success:hover > th {
    background-color: #b1dfbb;
    }

    .table-info,
    .table-info > th,
    .table-info > td {
    background-color: #bee5eb;
    }

    .table-info th,
    .table-info td,
    .table-info thead th,
    .table-info tbody + tbody {
    border-color: #86cfda;
    }

    .table-hover .table-info:hover {
    background-color: #abdde5;
    }

    .table-hover .table-info:hover > td,
    .table-hover .table-info:hover > th {
    background-color: #abdde5;
    }

    .table-warning,
    .table-warning > th,
    .table-warning > td {
    background-color: #ffeeba;
    }

    .table-warning th,
    .table-warning td,
    .table-warning thead th,
    .table-warning tbody + tbody {
    border-color: #ffdf7e;
    }

    .table-hover .table-warning:hover {
    background-color: #ffe8a1;
    }

    .table-hover .table-warning:hover > td,
    .table-hover .table-warning:hover > th {
    background-color: #ffe8a1;
    }

    .table-danger,
    .table-danger > th,
    .table-danger > td {
    background-color: #f5c6cb;
    }

    .table-danger th,
    .table-danger td,
    .table-danger thead th,
    .table-danger tbody + tbody {
    border-color: #ed969e;
    }

    .table-hover .table-danger:hover {
    background-color: #f1b0b7;
    }

    .table-hover .table-danger:hover > td,
    .table-hover .table-danger:hover > th {
    background-color: #f1b0b7;
    }

    .table-light,
    .table-light > th,
    .table-light > td {
    background-color: #fdfdfe;
    }

    .table-light th,
    .table-light td,
    .table-light thead th,
    .table-light tbody + tbody {
    border-color: #fbfcfc;
    }

    .table-hover .table-light:hover {
    background-color: #ececf6;
    }

    .table-hover .table-light:hover > td,
    .table-hover .table-light:hover > th {
    background-color: #ececf6;
    }

    .table-dark,
    .table-dark > th,
    .table-dark > td {
    background-color: #c6c8ca;
    }

    .table-dark th,
    .table-dark td,
    .table-dark thead th,
    .table-dark tbody + tbody {
    border-color: #95999c;
    }

    .table-hover .table-dark:hover {
    background-color: #b9bbbe;
    }

    .table-hover .table-dark:hover > td,
    .table-hover .table-dark:hover > th {
    background-color: #b9bbbe;
    }

    .table-active,
    .table-active > th,
    .table-active > td {
    background-color: rgba(0, 0, 0, 0.075);
    }

    .table-hover .table-active:hover {
    background-color: rgba(0, 0, 0, 0.075);
    }

    .table-hover .table-active:hover > td,
    .table-hover .table-active:hover > th {
    background-color: rgba(0, 0, 0, 0.075);
    }

    .table .thead-dark th {
    color: #fff;
    background-color: #343a40;
    border-color: #454d55;
    }

    .table .thead-light th {
    color: #495057;
    background-color: #e9ecef;
    border-color: #dee2e6;
    }

    .table-dark {
    color: #fff;
    background-color: #343a40;
    }

    .table-dark th,
    .table-dark td,
    .table-dark thead th {
    border-color: #454d55;
    }

    .table-dark.table-bordered {
    border: 0;
    }

    .table-dark.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(255, 255, 255, 0.05);
    }

    .table-dark.table-hover tbody tr:hover {
    color: #fff;
    background-color: rgba(255, 255, 255, 0.075);
    }

    table th,
    table td {
      text-align: center;
    }

    table th {
      padding: 5px 20px;
      color: #5D6975;
      border-bottom: 1px solid #C1CED9;
      white-space: nowrap;        
      font-weight: normal;
    }
    footer {
      color: #5D6975;
      width: 100%;
      height: 30px;
      position: absolute;
      bottom: 0;
      border-top: 1px solid #C1CED9;
      padding: 8px 0;
      text-align: center;
    }
  </style>
</head>

<body class="container">
  <header class="clearfix">
    <h1>Muebles NGR</h1>
    <h3><?= $reportName; ?></h3>
    <div id="project">
      <div><b>Módulo: </b>Stock.</div>
      <div><b>Usuario:  </b><?=$_SESSION["usuario"]->usuarioNombre;?>.</div>
      <div><b>Correo del Usuario:  </b><?=$_SESSION["usuario"]->usuarioCorreoElectronico;?>.</div>
      <div><b>Fecha del Reporte:  </b><?= $dateTime; ?>.</div>
    </div>
  </header>
  <p><b>Lista de Productos en Stock:</b></p>
  <main>
    <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <th width="10px">Código</th>
              <th>Producto</th>
              <th>Cantidad en Stock</th>
              <th>Fecha del Último Movimiento</th>
          </tr>
      </thead>
      <tbody>
          <?php 
              foreach ($this->productos as $producto) { 
              $producto->cantidad = isset($producto->cantidad) ? $producto->cantidad : 0;
              $producto->ultimoMovimiento = self::findLastMove($producto->id_Producto);      
          ?>
          <tr>
              <td width="10px"><?= $producto->productoCodigo; ?></td>
              <td><?= $producto->productoNombre; ?></td>
              <td><?= $producto->cantidad; ?></td>
              <td><?= $producto->ultimoMovimiento ?></td>
          </tr>
          <?php } ?>
      </tbody>
    </table>
  </main>
  <footer>
      &copy; <?= $year ?> Inventarios Muebles NGR. Todos los derechos reservados.
  </footer>
</body>

</html>