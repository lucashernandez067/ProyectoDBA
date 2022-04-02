<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?= $this->serverPath ?>resources/assets/img/logo/favicon_ngr.ico">
    <link rel="stylesheet" href="<?= $this->serverPath ?>resources/assets/css/styles.css">
    <link rel="stylesheet" href="<?= $this->serverPath ?>resources/assets/css/bootstrap.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <title>Inicio | Muebles NGR</title>
</head>

<body data-spy="scroll" data-target="#navbarBlogMueblesNGR" data-offset="0">
    <!-- Excepción de Navbar para Index, Login y Registro -->
    <nav id="navbarBlogMueblesNGR" class="navbar navbar-expand-md navbar-dark bg-coffee sticky-top">
        <a class="navbar-brand" href="Index"><img src="resources/assets/img/logo/LogoMueblesNGR1.jpg" alt="Muebles NGR"
                width="100" height="auto"></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu" title="Menú">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="menu" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto" role="navigation">
                <li class="nav-item">
                    <a href="#aboutus" class="nav-link btn btn-coffee text-white rounded-0" title="Sobre nosotros">Sobre
                        Nosotros</a>
                </li>
                <li class="nav-item">
                    <a href="#findus" class="nav-link btn btn-coffee text-white rounded-0"
                        title="Nuestra ubicación">Encuéntranos</a>
                </li>
                <!-- <li class="nav-item">
                <a href="#contactus" class="nav-link btn btn-coffee text-white rounded-0" title="Envíanos un mensaje">Contáctanos</a>
            </li> -->
            </ul>
        </div>
    </nav>
    <!--End Banner-->
    <!--Section Presentation-->
    <!-- Sección de Bienvenida -->
    <header id="welcome" class="main-header py-5">
        <div class="background-overlay text-white py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-center align-self-center pt-5 text-center">
                        <h1 id="titleBlog" class="display-1">Muebles NGR</h1>
                        <p>(Frase de la empresa)</p>
                        <br>
                        <br>
                        <a href="http://www.mueblesngr.amawebs.com/" target="_blank" class="btn btn-lg btn-outline-coffee text-white">Nuestro Sitio</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END Section Welcome -->
    <!-- Section About us -->
    <section id="aboutus">
        <div class="container">
            <br><br><br>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="header-content-left">
                        <br>
                        <h1 class="display-4">Sobre Nosotros</h1>
                        <p class="mt-5">
                            Somos una empresa con varios años de experiencia en la fabricación,
                            comercialización de muebles para el hogar.Ofrecemos una gran variedad
                            en Salas, Comedores, Alcobas, muebles modulares y accesorios.
                        </p>
                        <p>
                            Estamos en innovación permanente para brindar a nuestros clientes lo mejor en
                            cuanto a diseño,calidad,garantia y precios bajos.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="header-content-right">
                        <p>
                            <span><b>MISION</b></span><br>
                            Somos una Empresa constituida legalmente. Con varios años de experiencia.dedicada a
                            contribuir
                            con el bienestar de nuestros clientes ofreciendo los mejores muebles con
                            una amplia variedad de diseños y con características de alta calidad.
                            <br><span><b>VISION</b></span><br>
                            Lograr consolidarnos como una destacada,reconocida e importante empresa.
                            <br><span><b>VALORES</b></span><br>
                            Respeto, compromiso entusiasmo, justicia, creatividad, honestidad, profesionalismo,
                            compañerismo y cooperación.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END Section About us-->
    <!-- Section Find us -->
    <section id="findus">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Encuéntranos</h1>
                    <div class="container-fluid p-0 m-0">
                        <div class="row">
                            <div class="col-8">
                                <div class="map-responsive">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9362.580494492455!2d-74.14742750558565!3d4.675064292164634!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xec4cf93759356a38!2smuebles%20NGR.!5e0!3m2!1ses!2sco!4v1601751916922!5m2!1ses!2sco"
                                        frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                            </div>
                            <div class="col-4">
                                <p>Dirección: <b>Cra. 102 #19-43</b>, Bogotá, Cundinamarca</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END Section Find us -->
    <!-- Sección de Contacto (si se requiere) -->
    <!-- <section id="contactus" class="py-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <h1>Contáctanos</h1>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </section> -->
    <!-- END Sección de Contacto -->
    <section>
        <footer class="container-fluid bg-coffee text-center text-white py-5">
            <div class="row">
                <div class="col-12">
                    <p id="text-copyright">&copy; 2020. Inventarios Muebles<a class="btn-link-access" href="Login" > NGR</a>.&reg; Proyecto CIS &trade;. Todos los Derechos Reservados.<br> Diseñado por: Brayan Rojas, Juan Gamba & Luis Hernandez.<br>
                    </p>
                </div>
            </div>
        </footer>
    </section>
    <!--End Footer Section-->
    <?php 
		include('resources/views/layouts/scripts.php')
  	?>
</body>

</html>