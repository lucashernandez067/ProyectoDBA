<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php 
		include('resources/views/layouts/head.php');
	?>
    <title>Stock</title>
</head>

<body>
    <div id="main" class="sb-nav-fixed">

        <header>
            <?php include('resources/views/layouts/nav.php'); ?>
        </header>

        <div id="bodyPath">
            <div id="bodyPath_sideBar">
                <?php include('resources/views/layouts/sideBar.php'); ?>
            </div>

            <div id="bodyPath_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Gestión de Stock</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="Administrador" title="Gestión de Stock">Administrador</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Stock</li>
                        </ol>

                        <?php
                            if(isset($_SESSION['messages'])) {
                                switch ($_SESSION['messages']) {
                                    case 1:
                                        Helpers::alert(
                                            'Registrado Correctamente.',
                                            'success'                                         
                                        );
                                        Helpers::message(
                                            '<b>¡Éxito!</b> Registrado Correctamente.',
                                            'success',
                                            'fa-check'
                                        );                                        
                                    break;
                                    case 2:
                                        Helpers::alert(
                                            'No se ha podido registrar el producto.',
                                            'error'                                         
                                        );
                                        Helpers::message(
                                            '<b>¡Error!</b> La cantidad de productos no puede ser menor a 0.',
                                            'danger',
                                            'fa-exclamation-circle'
                                        );
                                    break;
                                    case 3:
                                        Helpers::alert(
                                            'Actualizado Correctamente.',
                                            'success'                                         
                                        );
                                        Helpers::message(
                                            '<b>¡Éxito!</b> Actualizado Correctamente.',
                                            'success',
                                            'fa-check'
                                        );                                        
                                    break;
                                    case 4:
                                        Helpers::alert(
                                            'No se realizaron cambios.',
                                            'warning'                                         
                                        );
                                        Helpers::message(
                                            '<b>¡Ups!</b> No realizó ningún cambio en los datos ya existentes.',
                                            'warning',
                                            'fa-exclamation-triangle'
                                        );                                        
                                    break;
                                    case 5:
                                        Helpers::alert(
                                            'Se eliminó correctamente.',
                                            'success'                                         
                                        );
                                        Helpers::message(
                                            '<b>¡Éxito!</b> Se eliminó correctamente.',
                                            'success',
                                            'fa-check'
                                        );                                        
                                    break;
                                    case 6:
                                        Helpers::alert(
                                            'Registro inexistente',
                                            'error'                                         
                                        );
                                        Helpers::message(
                                            '<b>¡Error!</b> Está tratando de eliminar registros inexistentes.',
                                            'danger',
                                            'fa-exclamation-triangle'
                                        );                                        
                                    break;  
                                    case 7:
                                        Helpers::alert(
                                            'Estado Actualizado',
                                            'success'                                         
                                        );
                                        Helpers::message(
                                            '<b>¡Éxito!</b> Se actualizó el estado correctamente.',
                                            'success',
                                            'fa-check'
                                        );                                       
                                    break; 
                                    case 8:
                                        Helpers::alert(
                                            'Registro inexistente',
                                            'error'                                         
                                        );
                                        Helpers::message(
                                            '<b>¡Error!</b> Está tratando de cambiar el estado de registros inexistentes.',
                                            'danger',
                                            'fa-exclamation-triangle'
                                        );                                        
                                    break;                                      
                                }
                                unset($_SESSION['messages']);
                            }
                        ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="d-flex bd-highlight">
                                    <div class="bd-highlight">
                                        <i class="fas fa-table mr-1 mt-1"></i>
                                        Lista de productos en stock
                                    </div>
                                    <div class="ml-auto bd-highlight">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Generar Reporte
                                            </button>
                                            <div class="dropdown-menu">
                                                <h6 class="dropdown-header">Seleccione un formato</h6>
                                                <a class="dropdown-item" href="Stock/generarPdf"><i class="fas fa-file-pdf"></i> PDF</a>
                                            </div>
                                        </div>
                                        <a href="<?= $this->serverPath ?>Entradas/registrar"
                                            class="btn btn-success" title="Registrar <?= self::findEstadoProducto(1); ?>"><i class="fas fa-arrow-up"></i> Registrar <?= self::findEstadoProducto(1); ?></a>
                                        <a href="<?= $this->serverPath ?>Salidas/registrar"
                                            class="btn btn-danger" title="Registrar <?= self::findEstadoProducto(2); ?>"><i class="fas fa-arrow-down"></i> Registrar <?= self::findEstadoProducto(2); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body"> 
                                <table id="dataTable" class="table table-hover table-responsive-sm table-responsive-md"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Código del Producto</th>
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
                                            // $producto->fk_id_Producto = self::findProducto($producto->fk_id_Producto);   
                                        ?>
                                        <tr>
                                            <td><?= $producto->productoCodigo; ?></td>
                                            <td><?= $producto->productoNombre; ?></td>
                                            <td><?= $producto->cantidad; ?></td>
                                            <td><?= $producto->ultimoMovimiento ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>                               
                            </div>
                        </div>
                    </div>
                </main>
                <?php include('resources/views/layouts/footer.php'); ?>
            </div>
        </div>
    </div>
    <?php 
		include('resources/views/layouts/scripts.php');
	?>
</body>

</html>