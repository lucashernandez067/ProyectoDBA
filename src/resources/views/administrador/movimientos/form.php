<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <?php 
		include('resources/views/layouts/head.php');
	?>
    <title><?= $update ? 'Movimientos - Actualizar' : 'Movimientos - Registrar'; ?></title>
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
                            <li class="breadcrumb-item"><a href="<?= $this->serverPath ?>Administrador">Administrador</a></li>
                            <li class="breadcrumb-item"><a href="<?= $this->serverPath ?>Movimientos">Movimientos</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $update ? 'Actualizar' : 'Registrar'; ?></li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-edit mr-1 mt-1"></i>
                                Formulario para <?= $update ? 'actualizar' : 'registrar'; ?> un movimiento                   
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <form id="form" action="<?= $this->serverPath ?><?= $update ? 'Movimientos/edit' : 'Movimientos/create'; ?>" method="POST" autocomplete="off" class="Nwas-validated mt-1">                                                                       
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="producto"><b>Producto</b></label>
                                            <select class="custom-select" id="producto" name="producto" autofocus required>
                                                <option <?php if (!$update) { echo 'selected'; }?> disabled value="0">Seleccione el producto.</option>
                                                <?php foreach ($this->productos as $producto) { ?>
                                                <option <?php if ($update) { if ($categoria->id_Categoria == $_SESSION['producto'][0]->fk_id_Categoria) { echo 'selected';} }?> value="<?= $producto->id_Producto; ?>"><?= $producto->productoNombre; ?></option>
                                                <?php } ?>
                                            </select>                                            
                                            <div><span class="help-block"></span></div>                                            
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="movimiento"><b>Movimiento</b></label>
                                            <select class="custom-select" id="movimiento" name="movimiento" required>
                                                <option <?php if (!$update) { echo 'selected'; }?> disabled value="0">Seleccione el tipo de movimiento.</option>
                                                <?php foreach ($this->tiposMovimiento as $tipoMovimiento) { ?>
                                                <option <?php if ($update) { if ($tipoMovimiento->id_Categoria == $_SESSION['producto'][0]->fk_id_Categoria) { echo 'selected';} }?> value="<?= $tipoMovimiento->id_EstadoProducto; ?>"><?= $tipoMovimiento->estadoProducto; ?></option>
                                                <?php } ?>
                                            </select>                                            
                                            <div><span class="help-block"></span></div>                                            
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="cantidad" ><b>Cantidad</b></label>
                                            <input class="form-control"  id="cantidad" name="cantidad" type="number" placeholder="Ingrese la cantidad de productos." <?php if ($update) { ?> value="<?= $_SESSION['producto'][0]->productoCodigo; ?>" <?php } ?>>
                                            <div><span class="help-block"></span></div>                                            
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="descripcion"><b>Justificación (Descripción)</b></label>
                                            <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una breve descripción que justifique el movimiento realizado." rows="3"><?php if ($update) { ?><?= $_SESSION['producto'][0]->productoDescripcion; ?><?php } ?></textarea>
                                            <div><span class="help-block"></span></div>                                            
                                        </div>
                                        <br>
                                        <div class="form-group text-center">
                                            <input type="submit" value="<?= $update ? 'Actualizar' : 'Registrar'; ?>" class="btn btn-info">
                                            <a href="<?= $this->serverPath ?>Movimientos" class="btn btn-danger">Cancelar</a>                                      
                                        </div>
                                        <noscript>
                                            <div class="form-group text-center">
                                                <small><i><p class="text-white bg-danger p-2">Es posible que algunas Funciones no estén disponibles sin Javascript. Por favor habilite Javascript en la Configuración del Navegador.</p></i></small>
                                            </div>
                                        </noscript>                                        
                                    </form>
                                </div>                                
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
	<script src="<?= $this->serverPath ?>resources/assets/js/MovimientosValidations.js"></script>
</body>

</html>