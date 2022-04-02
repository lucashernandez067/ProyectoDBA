<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <?php 
		include('resources/views/layouts/head.php');
	?>
    <title>Usuario</title>
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
                        <h1 class="mt-4">Inicio - Usuario</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Usuario</li>
                        </ol>

                        

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="container text-center my-3">
                                    <div class="page-header">
                                        <h1 class="text-titles display-3 d-none d-md-block d-lg-block d-xl-block">
                                            BIENVENIDO
                                        </h1>
                                        <h1 class="text-titles display-5 d-block d-sm-none d-sm-block d-md-none">
                                            BIENVENIDO
                                        </h1>
                                        <br>
                                        <p>Seleccione El Rol En El Menú Para Continuar</p>
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