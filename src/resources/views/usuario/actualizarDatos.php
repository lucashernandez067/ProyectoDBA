<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php 
		include('resources/views/layouts/head.php');
	?>
    <title>Actualizar mis Datos</title>    
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
                        <h1 class="mt-4">Usuario - Datos Personales</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../Usuario">Usuario</a></li>
                            <li class="breadcrumb-item"><a href="../Usuario/datos">Datos Personales</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Actualizar</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-edit mr-1 mt-1"></i>
                                Formulario para actualizar los datos personales del usuario
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <form id="form" action="<?= $this->serverPath ?><?= $update ? 'Categorias/edit' : 'Categorias/create'; ?>" method="POST" autocomplete="off" class="Nwas-validated mt-1">                                                                                                               
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="tipoDocumento"><b>Tipo de Documento</b></label>
                                            <select name="tipoDocumento" class="form-control" id="userTypeDoc" title="Elija un Tipo de Documento"
                                                alt="Tipos de Documento" required="value > 0">
                                                <option value="" disabled>Seleccione una Opción...</option>
                                                <?php
                                                    if ($this->tiposDocumento) {
                                                        foreach ($this->tiposDocumento as $tipoDocumento) {
                                                            $selected = $tipoDocumento->id_TipoDocumento == $_SESSION['usuario']->fk_id_TipoDocumento ? 'selected' : '';                                                            
                                                            echo "<option value='$tipoDocumento->id_TipoDocumento'" . $selected . ">$tipoDocumento->tipoDocumento</option>";
                                                        }
                                                    } else {
                                                        echo "<option value='1'>Cédula de Ciudadanía</option>";
                                                    }
                                                ?>
                                            </select>
                                            <div><span class="help-block"></span></div>                                            
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="nombre" ><b>Nombre</b></label>
                                            <input class="form-control"  id="nombre" name="nombre" type="text" placeholder="Ingrese el nombre de la categoría." value="<?= $_SESSION['usuario']->usuarioNombre; ?>">
                                            <div><span class="help-block"></span></div>                                            
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="nombre" ><b>Correo Electrónico</b></label>
                                            <input class="form-control" id="userEmail" name="correo" type="email" value="<?= $_SESSION['usuario']->usuarioCorreoElectronico; ?>">
                                            <div><span class="help-block"></span></div>                                            
                                        </div>
                                        <br>
                                        <div class="form-group text-center">
                                            <input type="submit" value="Actualizar" class="btn btn-info">
                                            <a href="<?= $this->serverPath ?>Usuario/datos" class="btn btn-danger">Cancelar</a>                                      
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
	<script src="<?= $this->serverPath ?>resources/assets/js/actualizarDatosValidations.js"></script>
</body>

</html>