<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <?php 
		include('resources/views/layouts/head.php');
	?>
    <title></title>
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
                        <h1 class="mt-4">Permisos del Usuario: <?= $_SESSION['nombre']; ?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="Superadministrador">Superadministrador</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-edit mr-1 mt-1"></i>
                                Formulario para añadirle un permiso al usuario <?= $_SESSION['nombre']; ?>          
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <form id="form" action="<?= $this->serverPath; ?>PermisosDelUsuario/create" method="POST" autocomplete="off" class="Nwas-validated mt-1">                                                                       
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="permiso"><b>Permiso</b></label>
                                            <select multiple  class="custom-select" id="permiso" name="permiso" required>
                                                <option selected disabled value="0">Seleccione el permiso para el usuario.</option>
                                                <?php foreach ($this->permisos as $permiso) { ?>
                                                <option value="<?= $permiso->id_Rol; ?>"><?= $permiso->rolNombre; ?></option>
                                                <?php } ?>
                                            </select>                                            
                                            <div><span class="help-block"></span></div>                                            
                                        </div>
                                        <br>
                                        <div class="form-group text-center">
                                            <input type="submit" value="Registrar" class="btn btn-info">
                                            <a href="<?= $this->serverPath ?>PermisosDelUsuario" class="btn btn-danger">Cancelar</a>                                      
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
	<script src="<?= $this->serverPath ?>resources/assets/js/PermisosDelUsuarioValidations.js"></script>
</body>

</html>