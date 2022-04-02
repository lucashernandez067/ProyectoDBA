<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <button class="btn btn-link btn-sm order-0 ml-2" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>
    <a class="navbar-brand" href="#">Muebes NGR</a>

    <!-- Navbar-->
    <ul class="navbar-nav ml-auto mr-0 mr-md-2 my-2 my-md-0">
        <li class="nav-item dropdown mr-2">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right accountDropdown" aria-labelledby="userDropdown">
                <center>
                    <a href="#">
                        <img src="<?= $this->serverPath ?>resources/assets/img/perfil/user-solid.png" class="accountImage">
                    </a>
                    <br><br>
                    <p>
                        <?php
                            echo $_SESSION["usuario"]->usuarioNombre;
                        ?>
                    </p>
                    <h6 class="dropdown-header">
                        <?php
                            echo $_SESSION["rolNombre"];
                        ?>
                    </h6>
                    <hr>
                    <?php
                        if (isset($_SESSION['Superadministrador'])) {
                    ?>
                    <a href="<?= $this->serverPath; ?>Superadministrador" title="Usuarios" class="btn btn-info">
                        <i class="fas fa-users"></i>
                    </a>
                    <?php 
                        }
                    ?>
                    <a href="<?= $this->serverPath; ?>Usuario/datos" title="Información Personal" class="btn btn-success">
                        <i class="fas fa-user"></i>
                    </a>
                    <a id="logout" title="Salir del sistema" class="btn btn-danger btn-exit-system">
                        <i class="fas fa-power-off text-light"></i>
                    </a>
                    <br><br>
                </center>
            </div>
        </li>
        <a title="Manual de Usuario" href="<?= $this->serverPath ?>resources/assets/pdf/Manual de Usuario.pdf" target="_blank" class="circulo btn btn-info">
            <i class="fas fa-question my-1"></i>
        </a>
    </ul>
</nav>