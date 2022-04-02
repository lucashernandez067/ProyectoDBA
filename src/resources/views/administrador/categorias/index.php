<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php 
		include('resources/views/layouts/head.php');
	?>
    <title>Categorías</title>
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
                        <h1 class="mt-4">Gestión de Categorías</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="Administrador" title="Gestión de Stock">Administrador</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Categorías</li>
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
                                            '<b>¡Error!</b> La categoría ya existe.',
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
                                            'fa-exclamation-triangle'
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
                                            'fa-check'
                                        );                                        
                                    break;
                                    case 7:
                                        Helpers::alert(
                                            'Categoría en uso',
                                            'error'                                         
                                        );
                                        Helpers::message(
                                            '<b>¡Error!</b> Esta categoría se encuentra asociada a un producto.',
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
                                        Lista de Categorías
                                    </div>
                                    <div class="ml-auto bd-highlight">
                                        <a href="<?= $this->serverPath ?>Categorias/registrar"
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
                                            <th>Nombre de la Categoria</th>
                                            <th>Descripción</th>
                                            <th style="width: 10px">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($this->categorias as $categoria) { ?>
                                        <tr>
                                            <td><?= $categoria->categoria; ?></td>
                                            <td><?= $categoria->categoriaDescripcion; ?></td>
                                            <td>
                                                <a href="<?= $this->serverPath ?>Categorias/actualizar/<?= $categoria->id_Categoria; ?>"
                                                    class="btn btn-outline-success"><i class="fas fa-pen"></i></a>
                                                <button
                                                    onclick="return confirmDelete(
                                                        '<?= $this->serverPath ?>Categorias/eliminar/<?= $categoria->id_Categoria; ?>', 
                                                        'la categoría <?= $categoria->categoria; ?>'
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