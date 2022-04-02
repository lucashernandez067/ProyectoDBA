
<!DOCTYPE html>
<html lang="es">
<head>
	<?php 
		include('resources/views/layouts/head.php');
	?>
	<title>Iniciar Sesión</title>
</head>

<body>
	<div class="full-box login-container cover p-5">
		<form id="form" action="<?= $this->serverPath ?>Login/auth" method="POST" autocomplete="off" class="logInForm Nwas-validated">
			<a class="btn btn-outline-link text-white p-2" href="<?= $this->serverPath ?>">Volver</a><br><br>
			<center><img src="resources/assets/img/logo/LogoMueblesNGR1.jpg" alt="Muebles NGR" width="100"></center>
			<br>
			<h2 class="text-center text-uppercase">Iniciar Sesión</h2>
			<br><br>
			<div class="form-group label-floating">
				<label class="control-label" for="UserDoc" ><b>Documento</b></label>
				<input class="form-control"  id="UserDoc" name="documento" type="text" autofocus="autofocus">
				<div><span class="help-block">Escriba su número de identificación</span></div>
				<noscript><p class="text-white"><small><i>Escriba su número de identificación</i></small></p></noscript>
			</div>
			<div class="form-group label-floating">
				<label class="control-label" for="UserPass" ><b>Contraseña</b></label>
				<input class="form-control"  id="UserPass" name="password" type="password">
				<div><span class="help-block">Escribe tu contraseña</span></div>
				<noscript><p class="text-white"><small><i>Escribe tu contraseña</i></small></p></noscript><br>
			</div>
			<br>
			<div class="form-group text-center">
				<input type="submit" value="Iniciar sesión" class="btn btn-info">
				<br><br>
				<p>¿No tienes cuenta? <a class="link-decorated" href="<?= $this->serverPath ?>Signin" style="color: #03A9F4;">Regístrate</a></p>
				<p><a class="link-decorated" href="<?= $this->serverPath ?>RecuperarContraseña" style="color: #03A9F4;">¿Olvidó Su Contraseña?</a></p>
			</div>
			<noscript>
				<div class="form-group text-center">
					<small><i><p class="text-white bg-danger p-2">Es posible que algunas Funciones no estén disponibles sin Javascript. Por favor habilite Javascript en la Configuración del Navegador.</p></i></small>
				</div>
			</noscript>
			
			<?php
				if(isset($_SESSION['messages'])) {
					switch ($_SESSION['messages']) {
						case 1:
							Helpers::message(
								'El usuario ingresado no se encuentra registrado en el sistema.',
								'danger'
							);
						break;
						case 2:
							Helpers::message(
								'La contraseña ingresada es incorrecta.',
								'danger'
							);
						break;
						case 3:
							Helpers::message(
								'Esta cuenta se encuantra inactiva en el sistema.',
								'danger'
							);
						break;
						case 4:
							Helpers::message(
								'No tiene permisos para ingresar al sistema.',
								'danger'
							);
						break;
						case 5:
							Helpers::message(
								'Usuario Registrado Correctamente.',
								'success'
							);
						break;
						case 6:
							Helpers::message(
								'Contraseña Actualizada Correctamente.',
								'success'
							);
						break;								
					}
					unset($_SESSION['messages']);
				}
			?>
		</form>
    </div>
	<?php 
		include('resources/views/layouts/scripts.php');
	?>
	<script src="<?= $this->serverPath ?>resources/assets/js/LoginValidations.js"></script>
</body>
</html>
