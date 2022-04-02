<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
		include('resources/views/layouts/head.php');
	?>
	<title>Cambiar contraseña</title>
</head>

<body>
	<div class="full-box login-container cover p-5">
		<form id="form" action="<?= $this->serverPath ?>RecuperarContraseña/changePwd" method="POST" autocomplete="off" class="logInForm Nwas-validated">
			<a class="btn btn-outline-link text-white p-2" href="<?= $this->serverPath . 'Login' ?>">Volver</a><br><br>
			<h2 class="text-center text-uppercase text-danger">Cambiar contraseña</h2>
			<br>
			<div class="form-group py-2 label-floating">
				<label class="control-label text-light" for="UserPass" ><b>Contraseña*</b></label>
				<input class="form-control"  id="UserPass" name="password" type="password" autofocus="autofocus">
				<div><span class="help-block text-light">Escribe una nueva contraseña.</span></div>
				<p>
					<i> 
						&nbsp; Debe ser de más de 6 caracteres, con
						mayúscula inicial, y debe contener caracteres especiales como proceso de seguridad.
					</i>
				</p>
				<noscript>
					<small>
						<i>
							<p>Escribe una nueva contraseña.<br>&nbsp; <i>Debe ser de más de 6
									caracteres, con mayúscula inicial, y debe contener caracteres especiales como
									proceso de seguridad.</i></p>
							</p>
						</i>
					</small>
				</noscript>
			</div>
			<div class="form-group py-2 label-floating">
				<label class="control-label text-light" for="userPass1" ><b>Confirmar Contraseña*</b></label>
				<input class="form-control"  id="userPass1" name="password1" type="password">
				<div><span class="help-block text-light">Vuelve a escribir la contraseña.</span></div>				
			</div>
			<br>
			<div class="form-group text-center">
				<input type="submit" value="Cambiar" class="btn btn-info px-4" style="color: #FFF;">
				<a class="btn btn-raised btn-danger" href="RecuperarContraseña/cancel">Cancelar</a>
				<br><br>
			</div>
			<noscript>
				<div class="form-group text-center">
					<small><i><p class="text-white bg-danger p-2">Es posible que algunas Funciones no estén disponibles sin Javascript. Por favor habilite Javascript en la Configuración del Navegador.</p></i></small>
				</div>
			</noscript>
		</form>
    </div>
	<?php 
		include('resources/views/layouts/scripts.php');
	?>
	<script src="<?= $this->serverPath ?>resources/assets/js/cambiarContraseñaValidations.js"></script>
</body>
</html>
