<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php 
		include('resources/views/layouts/head.php');
	?>
    <title>Usuarios</title>
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
                        <h1 class="mt-4">Inicio - Gestión de Usuarios</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="Superadministrador">Superadministrador</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
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
                                            '<b>¡Éxito!</b> Usuario Registrado Correctamente.',
                                            'success',
                                            'fa-check'
                                        );                                        
                                    break;
                                    case 2:
                                        Helpers::alert(
                                            'El usuario ya está registrado.',
                                            'error'                                         
                                        );
                                        Helpers::message(
                                            '<b>¡Error!</b> El usuario ya está registrado.',
                                            'danger',
                                            'fa-exclamation-circle'
                                        );
                                    break;
                                    case 3:
                                        Helpers::alert(
                                            'Registro inexistente',
                                            'error'                                         
                                        );
                                        Helpers::message(
                                            '<b>¡Error!</b> Está tratando de cambiar el estado de registros inexistentes.',
                                            'danger',
                                            'fa-check'
                                        );                                        
                                    break;
                                    case 4:
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
                                    case 5:
                                        Helpers::alert(
                                            'No se pudo actualizar el estado',
                                            'error'                                         
                                        );
                                        Helpers::message(
                                            '<b>¡Error!</b> No es posible cambiar su propio estado.',
                                            'danger',
                                            'fa-check'
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
                                        Lista de Usuarios Registrados
                                    </div>
                                    <div class="ml-auto bd-highlight">
                                        <a href="<?= $this->serverPath ?>Superadministrador/registrar"
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
                                            <th>Número de Documento</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Fecha de Registro</th>                                    
                                            <th style="width: 140px">Estado</th>                                    
                                            <th>Permisos</th>                                                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach ($this->usuarios as $usuario) { 
                                            $usuario->fk_id_EstadoUsuario = self::findEstado($usuario->fk_id_EstadoUsuario);
                                        ?>
                                            
                                        <tr>
                                            <td><?= $usuario->usuarioDocumento; ?></td>
                                            <td><?= $usuario->usuarioNombre; ?></td>
                                            <td><?= $usuario->usuarioCorreoElectronico; ?></td>
                                            <td><?= $usuario->usuarioFechaRegistro; ?></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm"><?= $usuario->fk_id_EstadoUsuario; ?></div>
                                                    <div class="col-sm">
                                                        <?php if ($_SESSION['usuario']->usuarioDocumento != $usuario->usuarioDocumento) { ?>
                                                        <a href="<?= $this->serverPath ?>Superadministrador/cambiarEstado/<?= $usuario->usuarioDocumento; ?>" 
                                                        class="btn btn-outline-warning">
                                                            <i class="fas fa-exchange-alt"></i>
                                                        </a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <form action="PermisosDelUsuario" method="POST">
                                                    <input type="hidden" name="documento" value="<?=$usuario->usuarioDocumento;?>">
                                                    <input type="hidden" name="nombre" value="<?=$usuario->usuarioNombre;?>">
                                                    <button  type="submit" class="btn btn-outline-info"><i class="fas fa-external-link-alt"></i></button>
                                                </form>
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