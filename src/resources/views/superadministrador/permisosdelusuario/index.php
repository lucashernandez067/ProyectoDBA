<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php 
		include('resources/views/layouts/head.php');
	?>
    <title>Permisos del Usuario</title>
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

                        <?php
                            if(isset($_SESSION['messages'])) {
                                switch ($_SESSION['messages']) {
                                    case 1:
                                        Helpers::alert(
                                            'Añadido Correctamente.',
                                            'success'                                         
                                        );
                                        Helpers::message(
                                            '<b>¡Éxito!</b> Permiso añadido correctamente. (esta acción tomará efecto cuando el usuario cierre sesión)',
                                            'success',
                                            'fa-check'
                                        );                                        
                                    break;
                                    case 2:
                                        Helpers::alert(
                                            'El permiso ya existe.',
                                            'error'                                         
                                        );
                                        Helpers::message(
                                            '<b>¡Error!</b> El usuario ya posee este permiso.',
                                            'danger',
                                            'fa-exclamation-circle'
                                        );
                                    break;
                                    case 3:
                                        Helpers::alert(
                                            'Eliminado Correctamente.',
                                            'success'                                         
                                        );
                                        Helpers::message(
                                            '<b>¡Éxito!</b> Permiso Removido Correctamente. (esta acción tomará efecto cuando el usuario cierre sesión)',
                                            'success',
                                            'fa-check'
                                        );                                        
                                    break;
                                    case 4:
                                        Helpers::alert(
                                            'No Se Pudo Eliminar',
                                            'error'                                         
                                        );
                                        Helpers::message(
                                            '<b>¡Error!</b> No puede eliminar este permiso.',
                                            'danger',
                                            'fa-exclamation-circle'
                                        );                                        
                                    break;
                                    case 5:
                                        Helpers::alert(
                                            'No Se Pudo Eliminar',
                                            'warning'                                         
                                        );
                                        Helpers::message(
                                            '<b>¡Error!</b> Está tratando de eliminar registros inexistentes.',
                                            'warning',
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
                                        Lista de Permisos del Usuario
                                    </div>
                                    <div class="ml-auto bd-highlight">
                                        <a href="<?= $this->serverPath ?>PermisosDelUsuario/registrar"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-plus"></i>
                                            Añadir
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="dataTable" class="table table-hover table-responsive-sm table-responsive-md"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nombre del Permiso</th>
                                            <th style="with: 30%">Eliminar Permiso del Usuario</th>                                                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($this->permisosDelUsuario as $permiso) { ?>
                                        <tr>
                                            <td><?= $permiso[1]; ?></td>
                                            <td>
                                                <?php                                                     
                                                    if ($permiso[0] != 1) {
                                                ?>
                                                <button
                                                    onclick="return confirmDelete(
                                                        '<?= $this->serverPath ?>PermisosDelUsuario/eliminar/<?= $permiso[0]; ?>', 
                                                        'el permiso de <?= $permiso[1]; ?>'
                                                    )"
                                                    class="btn btn-outline-danger"><i class="fas fa-trash"></i>
                                                </button>
                                                <?php 
                                                    } 
                                                ?>
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