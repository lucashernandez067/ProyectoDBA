<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <?php 
		include('resources/views/layouts/head.php');
	?>
    <title><?= $update ? 'Productos - Actualizar' : 'Productos - Registrar'; ?></title>
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
                            <li class="breadcrumb-item"><a href="<?= $this->serverPath ?>Administrador">Administrador</a></li>
                            <li class="breadcrumb-item"><a href="<?= $this->serverPath ?>Productos">Productos</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $update ? 'Actualizar' : 'Registrar'; ?></li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-edit mr-1 mt-1"></i>
                                Formulario para <?= $update ? 'actualizar' : 'registrar'; ?> un producto                   
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <form id="form" action="<?= $this->serverPath ?><?= $update ? 'Productos/edit' : 'Productos/create'; ?>" method="POST" autocomplete="off" class="Nwas-validated mt-1">                                                                       
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="nombre" ><b>Nombre</b></label>
                                            <input class="form-control"  id="nombre" name="nombre" type="text" placeholder="Ingrese el nombre del producto." <?php if ($update) { ?> value="<?= $_SESSION['producto'][0]->productoNombre; ?>" <?php } else { echo 'autofocus'; }?>>
                                            <div><span class="help-block"></span></div>                                            
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="codigo" ><b>Código</b></label>
                                            <input class="form-control"  id="codigo" name="codigo" type="text" placeholder="Ingrese el código del producto." <?php if ($update) { ?> value="<?= $_SESSION['producto'][0]->productoCodigo; ?>" <?php } ?>>
                                            <div><span class="help-block"></span></div>                                            
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="categoria"><b>Categoría</b></label>
                                            <select class="custom-select" id="categoria" name="categoria" required>
                                                <option <?php if (!$update) { echo 'selected'; }?> disabled value="0">Seleccione la categoría del producto.</option>
                                                <?php foreach ($this->categorias as $categoria) { ?>
                                                <option <?php if ($update) { if ($categoria->id_Categoria == $_SESSION['producto'][0]->fk_id_Categoria) { echo 'selected';} }?> value="<?= $categoria->id_Categoria; ?>"><?= $categoria->categoria; ?></option>
                                                <?php } ?>
                                            </select>                                            
                                            <div><span class="help-block"></span></div>                                            
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="proveedor"><b>Proveedor</b></label>
                                            <select class="custom-select" id="proveedor" name="proveedor" required>
                                                <option <?php if (!$update) { echo 'selected'; }?> disabled value="0">Seleccione el proveedor del producto.</option>
                                                <?php 
                                                    foreach ($this->proveedores as $proveedor) {  
                                                        $proveedor->id_ProveedorMaterial = $proveedor->fk_id_estadoProveedor == 2 ? 0 : $proveedor->id_ProveedorMaterial;
                                                ?>
                                                <option <?php if ($proveedor->fk_id_estadoProveedor == 2) { echo 'disabled'; }?> <?php if ($update) { if ($proveedor->id_ProveedorMaterial == $_SESSION['producto'][0]->fk_id_ProveedorMaterial) { echo 'selected';} }?>  value="<?= $proveedor->id_ProveedorMaterial; ?>"><?= $proveedor->proveedorNombre; ?><?php if ($proveedor->fk_id_estadoProveedor == 2) { echo ' (Inactivo)'; }?></option>
                                                <?php } ?>
                                            </select>                                            
                                            <div><span class="help-block"></span></div>                                            
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="descripcion"><b>Descripción</b></label>
                                            <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripción del producto." rows="3"><?php if ($update) { ?><?= $_SESSION['producto'][0]->productoDescripcion; ?><?php } ?></textarea>
                                            <div><span class="help-block"></span></div>                                            
                                        </div>
                                        <?php if (!$update) { ?>
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="cantidad" ><b>Cantidad Inicial</b></label>
                                            <input class="form-control"  id="cantidad" name="cantidad" type="number" placeholder="Ingrese la cantidad de productos.">
                                            <div><span class="help-block"></span></div>                                            
                                        </div>
                                        <?php } ?>
                                        <br>
                                        <div class="form-group text-center">
                                            <input type="submit" value="<?= $update ? 'Actualizar' : 'Registrar'; ?>" class="btn btn-info">
                                            <a href="<?= $this->serverPath ?>Productos" class="btn btn-danger">Cancelar</a>                                      
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
	<script src="<?= $this->serverPath ?>resources/assets/js/ProductoValidations.js"></script>
</body>

</html>