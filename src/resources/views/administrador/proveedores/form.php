<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <?php 
		include('resources/views/layouts/head.php');
	?>
    <title><?= $update ? 'Proveedores - Actualizar' : 'Proveedores - Registrar'; ?></title>
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
                        <h1 class="mt-4">Gestión de Proveedores</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= $this->serverPath ?>Administrador">Administrador</a></li>
                            <li class="breadcrumb-item"><a href="<?= $this->serverPath ?>Proveedores">Proveedores</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $update ? 'Actualizar' : 'Registrar'; ?></li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-edit mr-1 mt-1"></i>
                                Formulario para <?= $update ? 'actualizar' : 'registrar'; ?> un proveedor                   
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <form id="form" action="<?= $this->serverPath ?><?= $update ? 'Proveedores/edit' : 'Proveedores/create'; ?>" method="POST" autocomplete="off" class="Nwas-validated mt-1">                                                                       
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="nombre" ><b>Nombre</b></label>
                                            <input class="form-control"  id="nombre" name="nombre" type="text" placeholder="Ingrese el nombre del proveedor." <?php if ($update) { ?> value="<?= $_SESSION['proveedor'][0]->proveedorNombre; ?>" <?php } else { echo 'autofocus'; }?>>
                                            <div><span class="help-block"></span></div>                                            
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="telefono" ><b>Teléfono</b></label>
                                            <input class="form-control"  id="telefono" name="telefono" type="text" placeholder="Ingrese el teléfono del proveedor." <?php if ($update) { ?> value="<?= $_SESSION['proveedor'][0]->proveedorTelefono; ?>" <?php } ?>>
                                            <div><span class="help-block"></span></div>                                            
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="direccion" ><b>Dirección</b></label>
                                            <input class="form-control"  id="direccion" name="direccion" type="text" placeholder="Ingrese la dirección del proveedor." <?php if ($update) { ?> value="<?= $_SESSION['proveedor'][0]->ProveedorDireccion; ?>" <?php } ?>>
                                            <div><span class="help-block"></span></div>                                            
                                        </div>
                                        <br>
                                        <div class="form-group text-center">
                                            <input type="submit" value="<?= $update ? 'Actualizar' : 'Registrar'; ?>" class="btn btn-info">
                                            <a href="<?= $this->serverPath ?>Proveedores" class="btn btn-danger">Cancelar</a>                                      
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
	<script src="<?= $this->serverPath ?>resources/assets/js/ProveedorValidations.js"></script>
</body>

</html>