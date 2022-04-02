<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Rol de Usuario</div>
            <!-- <a class="nav-link" href="index.html"> -->
            <div class="px-2">
                <select class="custom-select bg-dark text-light" id="rol" onchange="location = this.value">
                    <option hidden value="" title="select" label="" selected disabled><?= $this->rolNombre ?></option>
                    <?php 
                        if(isset($_SESSION['usuarioP'])) {
                            ?><option <?= $this->rolNombre == 'Usuario' ? 'class="bg-primary"' : '' ?> value="<?= $this->serverPath; ?>Usuario">Usuario</option><?php
                        }
                        if(isset($_SESSION['Superadministrador'])) {
                            ?><option <?= $this->rolNombre == 'Superadministrador' ? 'class="bg-primary"' : '' ?> value="<?= $this->serverPath; ?>Superadministrador">Superadministrador</option><?php          
                        }
                        if(isset($_SESSION['administrador'])) {
                            ?><option <?= $this->rolNombre == 'Administrador' ? 'class="bg-primary"' : '' ?> value="<?= $this->serverPath; ?>Administrador">Administrador</option><?php
                        }
                    ?>
                </select>
            </div>
            <div class="sb-sidenav-menu-heading">Opciones</div>

            <!-- SideBar Usuario -->
            <?php if ($this->rolNombre == 'Usuario') { ?>
            <a class="nav-link <?php echo $_REQUEST['c'] ==  'Usuario' ? 'active' : ''; ?>"
                href="<?php echo $_REQUEST['c'] ==  'Usuario' ? '#' : $this->serverPath . 'Usuario'; ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                Inicio
            </a>
            <a class="nav-link <?php echo $_REQUEST['c'] ==  'Usuario/datos' ? 'active' : ''; ?>"
                href="<?php echo $_REQUEST['c'] ==  'Usuario/datos' ? '#' : $this->serverPath . 'Usuario/datos'; ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-user-tag"></i></div>
                Datos de Usuario
            </a>
            <?php } ?>

            <!-- SideBar Superadministrador -->
            <?php if ($this->rolNombre == 'Superadministrador') { ?>
            <a class="nav-link <?php echo $_REQUEST['c'] ==  'Superadministrador' || $_REQUEST['c'] ==  'PermisosDelUsuario' ? 'active' : ''; ?>"
                href="<?php echo $_REQUEST['c'] ==  'Superadministrador' ? '#' : $this->serverPath . 'Superadministrador'; ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                Inicio | Usuarios
            </a>
            <a class="nav-link <?php echo $_REQUEST['c'] ==  'Superadministrador' || $_REQUEST['c'] ==  'PermisosDelUsuario' ? 'active' : ''; ?>"
                href="<?php echo $_REQUEST['c'] ==  'Superadministrador' ? '#' : $this->serverPath . 'Superadministrador'; ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                Registros de Usuarios
            </a>
            <a class="nav-link <?php echo $_REQUEST['c'] ==  'Superadministrador' || $_REQUEST['c'] ==  'PermisosDelUsuario' ? 'active' : ''; ?>"
                href="<?php echo $_REQUEST['c'] ==  'Superadministrador' ? '#' : $this->serverPath . 'Superadministrador'; ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                Consultar Est. de Usuario
            </a>
            <a class="nav-link <?php echo $_REQUEST['c'] ==  'Superadministrador' || $_REQUEST['c'] ==  'PermisosDelUsuario' ? 'active' : ''; ?>"
                href="<?php echo $_REQUEST['c'] ==  'Superadministrador' ? '#' : $this->serverPath . 'Superadministrador'; ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
               Registrar estado de usuario
            </a>
            <a class="nav-link <?php echo $_REQUEST['c'] ==  'Superadministrador' || $_REQUEST['c'] ==  'PermisosDelUsuario' ? 'active' : ''; ?>"
                href="<?php echo $_REQUEST['c'] ==  'Superadministrador' ? '#' : $this->serverPath . 'Superadministrador'; ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                Permisos de registro
            </a>
            <a class="nav-link <?php echo $_REQUEST['c'] ==  'Superadministrador' || $_REQUEST['c'] ==  'PermisosDelUsuario' ? 'active' : ''; ?>"
                href="<?php echo $_REQUEST['c'] ==  'Superadministrador' ? '#' : $this->serverPath . 'Superadministrador'; ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                Registros de usuarios permitidos
            </a>
            <a class="nav-link <?php echo $_REQUEST['c'] ==  'Superadministrador' || $_REQUEST['c'] ==  'PermisosDelUsuario' ? 'active' : ''; ?>"
                href="<?php echo $_REQUEST['c'] ==  'Superadministrador' ? '#' : $this->serverPath . 'Superadministrador'; ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                Registrar Nuevos estados de productos
            </a>
            <?php } ?>

            <!-- SideBar Administrador -->
            <?php if ($this->rolNombre == 'Administrador') { ?>
            <?php 
                $var1Stock = "nav-link collapsed";
                $var2Stock = false;
                $var3Stock = 'collapse';
                $activeItem = '';

                $subItemStock1 = $_REQUEST['c'] ==  'Stock';
                $subItemStock2 = $_REQUEST['c'] ==  'Entradas';
                $subItemStock3 = $_REQUEST['c'] ==  'Salidas';
                $subItemStock4 = $_REQUEST['c'] ==  'Movimientos';

                if ($subItemStock1 || $subItemStock2  || $subItemStock3 || $subItemStock4) {
                    $var1Stock = "nav-link";
                    $var2Stock = true;
                    $var3Stock = 'collapse show';
                    $activeItem = 'active';
                }
            ?>
            <a class="<?= $var1Stock . ' ' . $activeItem; ?>" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                aria-expanded="<?php $var2Stock; ?>" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                Inicio | Stock
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="<?= $var3Stock; ?>" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link <?php echo $_REQUEST['c'] == 'Stock' ? 'active' : ''; ?>" 
                        href="<?php echo $_REQUEST['c'] ==  'Stock' ? '#' : $this->serverPath . 'Stock'; ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>                
                        Ver Stock
                    </a>
                    <a class="nav-link <?php echo $_REQUEST['c'] == 'Movimientos' ? 'active' : ''; ?>" 
                        href="<?php echo $_REQUEST['c'] ==  'Movimientos' ? '#' : $this->serverPath . 'Movimientos'; ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-retweet"></i></div>
                        Movimientos
                    </a>
                    <a class="nav-link <?php echo $_REQUEST['c'] == 'Entradas' ? 'active' : ''; ?>" 
                        href="<?php echo $_REQUEST['c'] ==  'Entradas' ? '#' : $this->serverPath . 'Entradas'; ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-arrow-down"></i></div>
                        Entradas
                    </a>
                    <a class="nav-link <?php echo $_REQUEST['c'] == 'Salidas' ? 'active' : ''; ?>" 
                        href="<?php echo $_REQUEST['c'] ==  'Salidas' ? '#' : $this->serverPath . 'Salidas'; ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-arrow-up"></i></div>
                        Salidas
                    </a>
                </nav>
            </div>
            <a class="nav-link <?php echo $_REQUEST['c'] == 'Productos' ? 'active' : ''; ?>"
                href="<?php echo $_REQUEST['c'] ==  'Productos' ? '#' : $this->serverPath . 'Productos'; ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-couch"></i></div>
                Productos
            </a>
           
            <a class="nav-link <?php echo $_REQUEST['c'] == 'Categorias' ? 'active' : ''; ?>"
                href="<?php echo $_REQUEST['c'] ==  'Categorias' ? '#' : $this->serverPath . 'Categorias'; ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                Gestión de Categorías
            </a>
            <a class="nav-link <?php echo $_REQUEST['c'] == 'Proveedores' ? 'active' : ''; ?>"
                href="<?php echo $_REQUEST['c'] ==  'Proveedores' ? '#' : $this->serverPath . 'Proveedores'; ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-people-carry"></i></div>
                Proveedores de Material
            </a>

            <?php } ?>

        </div>
    </div>
</nav>