<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php 
		include('resources/views/layouts/head.php');
	?>
    <title>Datos de Usuario</title>    
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
                            <li class="breadcrumb-item"><a href="Usuario">Usuario</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Datos Personales</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="d-flex bd-highlight">
                                    <div class="bd-highlight">
                                        <i class="fas fa-address-card"></i>
                                        Lista de Datos Registrados en el Sistema
                                    </div>
                                    <div class="ml-auto bd-highlight">
                                        <a href="<?= $this->serverPath ?>Usuario/actualizar"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-user-edit"></i>
                                            Actualizar Datos
                                        </a>
                                        <a href="<?= $this->serverPath ?>Categorias/registrar"
                                            class="btn btn-warning btn-sm">
                                            <i class="fas fa-key"></i>
                                            Cambiar Contraseña
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <center>
                                            <img src="<?= $this->serverPath ?>resources/assets/img/perfil/user-solid.png" class="accountImage">                                        
                                            <br>
                                            <br>
                                            <h5>
                                                <?= $_SESSION["usuario"]->usuarioNombre; ?>
                                            </h5>
                                            <h6 class="text-primary">
                                                <?= $_SESSION["rolNombre"]; ?>
                                            </h6>                                            
                                        </center>  
                                    </div>
                                    <div class="col-md-6">
                                        <div class="table-responsive" style="max-width: 630px;">
                                            <table class="table">
                                                <?php
                                                    $tipoDocumento = self::findTipoDocumento();
                                                    $permisos = self::findPermisos();                                                
                                                ?>
                                                <tr>
                                                    <th scope="row">Tipo de Documento:</th>
                                                    <td><?= $tipoDocumento; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Documento:</th>
                                                    <td><?= $_SESSION['usuario']->usuarioDocumento; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Nombre:</th>
                                                    <td><?= $_SESSION['usuario']->usuarioNombre; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Contraseña:</th>
                                                    <td>
                                                        ********
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Correo Electrónico:</th>
                                                    <td><?= $_SESSION['usuario']->usuarioCorreoElectronico; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Rol(es):</th>
                                                    <td>
                                                        <?php
                                                            foreach ($permisos as $permiso) {
                                                                echo $permiso;                                                 
                                                                echo '<br>';
                                                            } 
                                                        ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
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
</body>

</html>