<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php 
		include('resources/views/layouts/head.php');
	?>
    <title>Movimientos</title>
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
                        <h1 class="mt-4">Gestión de Movimientos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="Administrador" title="Gestión de Stock">Administrador</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Movimientos</li>
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
                                            'No se ha podido registrar el movimiento.',
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
                                        Lista de Movimientos
                                    </div>
                                    <div class="ml-auto bd-highlight">
                                        <a href="<?= $this->serverPath ?>Movimientos/registrar"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-plus"></i>
                                            Registrar
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body"> 
                                <table id="dataTable" class="table table-hover table-responsive-sm table-responsive-md"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Fecha de Registro</th>
                                            <th>Producto</th>
                                            <th>Movimiento</th>
                                            <th>Cantidad</th>
                                            <th>Usuario</th>                                
                                            <th>Justificación</th>                                
                                            <th style="width: 10px">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach ($this->movimientos as $movimiento) { 
                                            
                                            $iconoMovimiento = 
                                                $movimiento->fk_id_EstadoProducto == 1 
                                                ? '<i class="text-success fas fa-arrow-down"></i>' 
                                                : '<i class="text-danger fas fa-arrow-up"></i>';  
                        
                                            $movimiento->fk_id_Producto = self::findProducto($movimiento->fk_id_Producto);
                                            $movimiento->fk_id_EstadoProducto = self::findEstadoProducto($movimiento->fk_id_EstadoProducto);
                                            $movimiento->fk_usuarioDocumento = self::findUsuario($movimiento->fk_usuarioDocumento);            
                                        ?>
                                        <tr>
                                            <td><?= $movimiento->stockFechaRegistro; ?></td>
                                            <td><?= $movimiento->fk_id_Producto; ?></td>
                                            <td><?= $iconoMovimiento; ?> <?= $movimiento->fk_id_EstadoProducto; ?></td>
                                            <td><?= $movimiento->stockCantidad; ?></td>
                                            <td><?= $movimiento->fk_usuarioDocumento; ?></td>
                                            <td><?= $movimiento->stockJustificacion; ?></td>
                                            <td>
                                                <a href="<?= $this->serverPath ?>Proveedores/actualizar/<?= $movimiento->id_ProveedorMaterial; ?>"
                                                    class="btn btn-outline-success"><i class="fas fa-pen"></i></a>
                                                <button
                                                    onclick="return confirmDelete(
                                                        '<?= $this->serverPath ?>Proveedores/eliminar/<?= $movimiento->id_ProveedorMaterial; ?>', 
                                                        'al proveedor <?= $movimiento->proveedorNombre; ?>'
                                                    )"
                                                    class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                            </td>
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