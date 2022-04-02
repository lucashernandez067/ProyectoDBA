<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
		include('resources/views/layouts/head.php');
	?>
	<title>Validar Usuario</title>
</head>

<body>
	<div class="full-box login-container cover p-5">
		<form action="<?= $this->serverPath ?>RecuperarContraseña/verifyDocument" method="POST" autocomplete="off" class="logInForm Nwas-validated">
			<a class="btn btn-outline-link text-white p-2" href="<?= $this->serverPath . 'Login' ?>">Volver</a><br><br>
			<h2 class="text-center text-uppercase text-danger">Verificación de Seguridad</h2>
            <br>
            <p class="text-center">Señor Usuario, se va a hacer una comprobación de su identidad, para verificar su solicitud de recuperación de la contraseña.</p>
			<p class="text-center">Por favor diligencie la siguiente información:</p>
			<br>
			<div class="form-group label-floating">
				<label class="control-label" for="UserDoc" ><b>Documento</b></label>
				<input class="form-control"  id="UserDoc" name="documento" type="text" pattern="[0-9 ]+" + required autofocus="autofocus">
				<span class="help-block">Escriba su número de identificación</span><br>
				<noscript><p class="text-white"><small><i>Escriba su número de identificación</i></small></p></noscript>
			</div>
			<br>
			<div class="form-group text-center">
				<input type="submit" value="Validar" class="btn btn-info px-4" style="color: #FFF;">
				<br><br>
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
							'El documento no se encuentra registrado en el sistema.',
							'danger'
						);
					break;
					case 2:
						Helpers::message(
							'Usted no se encuentra autorizado para registrarse.',
							'danger'
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
</body>
</html>
