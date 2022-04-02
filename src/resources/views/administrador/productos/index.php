<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php 
		include('resources/views/layouts/head.php');
	?>
    <title>Productos</title>
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
                        <h1 class="mt-4">Gestión de Productos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="Administrador" title="Gestión de Stock">Administrador</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Productos</li>
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
                                            'La categoría ya existe.',
                                            'error'                                         
                                        );
                                        Helpers::message(
                                            '<b>¡Error!</b> El proveedor ya existe.',
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
                                        Lista de Productos
                                    </div>
                                    <div class="ml-auto bd-highlight">
                                        <a href="<?= $this->serverPath ?>Productos/registrar"
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
                                            <th>Fecha de registro</th>
                                            <th>Nombre del Producto</th>
                                            <th>Código</th>
                                            <th>Categoría</th>
                                            <th>Descipción</th>
                                            <th>Proveedor</th>
                                            <th>Cantidad</th>                                            
                                            <th style="width: 10px">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach ($this->productos as $producto) { 
                                            $producto->fk_id_Categoria = self::findCategoria($producto->fk_id_Categoria);
                                            $producto->fk_id_ProveedorMaterial = self::findProveedor($producto->fk_id_ProveedorMaterial);
                                            $producto->cantidad = isset($producto->cantidad) ? $producto->cantidad : 0;
                                        ?>
                                        <tr>
                                            <td><?= $producto->productoFechaRegistro; ?></td>
                                            <td><?= $producto->productoNombre; ?></td>
                                            <td><?= $producto->productoCodigo; ?></td>
                                            <td><?= $producto->fk_id_Categoria; ?></td>
                                            <td><?= $producto->productoDescripcion; ?></td>
                                            <td><?= $producto->fk_id_ProveedorMaterial; ?></td>
                                            <td><?= $producto->cantidad; ?></td>
                                            <td>
                                                <a href="<?= $this->serverPath ?>Productos/actualizar/<?= $producto->id_Producto; ?>"
                                                    class="btn btn-outline-success"><i class="fas fa-pen"></i></a>
                                                <button
                                                    onclick="return confirmDelete(
                                                        '<?= $this->serverPath ?>Productos/eliminar/<?= $producto->id_Producto; ?>', 
                                                        'el producto <?= $producto->productoNombre; ?>'
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