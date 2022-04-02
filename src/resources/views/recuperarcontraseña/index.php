<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
		include('resources/views/layouts/head.php');
	?>
	<title>Ingresar Código</title>
</head>

<body>
	<div class="full-box login-container cover p-5">
		<form action="<?= $this->serverPath ?>RecuperarContraseña/verifyCodigoVerif" method="POST" autocomplete="off" class="logInForm Nwas-validated">
			<a class="btn btn-outline-link text-white p-2" href="<?= $this->serverPath . 'Login' ?>">Volver</a><br><br>
			<h2 class="text-center text-uppercase text-danger">Código de Verificación</h2>
            <br>
            <p class="text-center">Señor Usuario, se ha enviado un código de verificación al correo: <?= $_SESSION['correoCodigoVerif']; ?> para realizar el cambio de su contraseña .</p>
			<p class="text-center">Por favor diligencie la siguiente información:</p>
			<br>
			<div class="form-group label-floating">
				<label class="control-label" for="codigoVerif" ><b>Código de Verificación</b></label>
				<input class="form-control"  id="codigoVerif" name="codigoVerif" type="password" + required autofocus="autofocus">
				<span class="help-block">Escriba el código que se envió a su correo.</span><br>
				<noscript><p class="text-white"><small><i>Escriba el código que se envió a su correo.</i></small></p></noscript>
			</div>
			<br>
			<div class="form-group text-center">
				<input type="submit" value="Validar" class="btn btn-info px-4" style="color: #FFF;">
				<a class="btn btn-raised btn-danger" href="RecuperarContraseña/cancel">Cancelar</a>
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
							'Código Icorrecto.',
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
