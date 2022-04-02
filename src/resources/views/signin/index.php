<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<?php 
		include('resources/views/layouts/head.php');
	?>
	<title>Registrar Usuario</title>
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
						<h1 class="mt-4">Registrar Usuario - Superadministrador</h1>
						<ol class="breadcrumb mb-4">
							<li class="breadcrumb-item"><a href="Superadministrador">Superadministrador</a></li>
							<li class="breadcrumb-item active" aria-current="page">Usuarios</li>
						</ol>

						<div class="card mb-4">
							<div class="card-header">
								<i class="fas fa-edit mr-1 mt-1"></i>
								Formulario para registrar un usuario
							</div>
							<div class="card-body">
								<div class="container">
									<form id="form" method="POST" action="<?= $this->serverPath ?>Signin/register"
										class="register-container px-md-5" autocomplete="on" novalidate>
										<!--Link para Regresar-->
										<a class="btn btn-outline-link text-white p-2 volver"
											href="Signin/cancel">Volver</a><br><br>

										<h2 class="text-center text-uppercase text-info">Registrarse</h2>
										<br>
										<noscript>
											<div class="form-group py-2 label-floating">
												<div class="alert alert-danger text-white">
													No es posible enviar el formulario sin Javascript. Por favor
													habilite Javascript en la
													configuración de su navegador
												</div>
											</div>
										</noscript>
										<div class="form-group py-2 label-floating">
											<div class="alert alert-secondary alert-dimissible text-dark">
												<strong>El asterisco (*)</strong> indica campos obligatorios
												<button type="button" class="close overflow-hidden" data-dismiss="alert"
													aria-label="Close">
													<div><span aria-hidden="true">&times;</span></div>
												</button>
											</div>
										</div>
										<div class="form-group py-2 label-floating">
											<label class="control-label my-auto text-light" for="userNombre">Nombre
												Completo*</label>
											<input class="form-control" id="userNombre" name="nombre" type="text"
												autofocus="autofocus">
											<div><span class="help-block text-light">Escriba aquí su nombre en letras
													para personalizar el
													servicio</span></div>
											<noscript>
												<small><i>
														<p class="text-white">Escriba aquí su nombre en letras para
															personalizar el servicio</p>
													</i></small>
											</noscript>
										</div>
										<div class="form-group py-2">
											<label for="userTypeDoc" class="control-label text-light">Tipo de
												Documento*</label>
											<select name="tipoDocumento" class="form-control" id="userTypeDoc"
												title="Elija un Tipo de Documento" alt="Tipos de Documento"
												required="value > 0">
												<option value="" selected="selected">Seleccione una Opción...</option>
												<?php
						if ($this->tiposDocumento) {
							foreach ($this->tiposDocumento as $tipoDocumento) {
								echo "<option value='$tipoDocumento->id_TipoDocumento'>$tipoDocumento->tipoDocumento</option>";
							}
						} else {
							echo "<option value='1'>Cédula de Ciudadanía</option>";
						}
					?>
											</select>
											<div><span class="help-block text-light">Seleccione su Tipo de Documento de
													Identidad</span></div>
											<noscript>
												<small><i>
														<p class="text-white">Seleccione su Tipo de Documento de
															Identidad</p>
													</i></small>
											</noscript>
										</div>
										<div class="form-group py-2 label-floating">
											<label class="control-label text-light" for="userDoc">Documento*</label>
											<input value="<?php echo $_SESSION['documento']; ?>" class="form-control"
												id="userDoc" name="documento" type="text" disabled>
											<div>
												<span class="text-white"><i>(Este es el Documento que podrá usar para
														acceder al sistema)</i></span>
											</div>
										</div>

										<div class="form-group py-2 label-floating">
											<label class="control-label my-auto text-light" for="userEmail">Correo
												Electrónico*</label>
											<input class="form-control" id="userEmail" name="correo" type="email">
											<div><span class="help-block text-light">Escribe tu correo
													electrónico.<span></div>

											<p> &nbsp;<i>Debe ser un correo real para enviarle
													un código de seguridad en caso de que olvide su contraseña</i></p>
											<noscript>
												<small>
													<i>
														<p class="text-white">Escribe tu correo electrónico.
															<br>&nbsp;<i>Debe ser un correo real
																para enviarle un código de seguridad en
																caso de que olvide su contraseña
														</p>
													</i>
												</small>
											</noscript>
										</div>
										<div class="form-group py-2 label-floating">
											<label class="control-label text-light"
												for="UserPass"><b>Contraseña*</b></label>
											<input class="form-control" id="UserPass" name="password" type="password">
											<div><span class="help-block text-light">Escribe una nueva
													contraseña.</span></div>
											<p>
												<i>
													&nbsp; Debe ser de más de 6 caracteres, con
													mayúscula inicial, y debe contener caracteres especiales como
													proceso de seguridad.
												</i>
											</p>
											<noscript>
												<small>
													<i>
														<p>Escribe una nueva contraseña.<br>&nbsp; <i>Debe ser de más de
																6
																caracteres, con mayúscula inicial, y debe contener
																caracteres especiales como
																proceso de seguridad.</i></p>
														</p>
													</i>
												</small>
											</noscript>
										</div>
										<div class="form-group py-2 label-floating">
											<label class="control-label text-light" for="userPass1"><b>Confirmar
													Contraseña*</b></label>
											<input class="form-control" id="userPass1" name="password1" type="password">
											<div><span class="help-block text-light">Vuelve a escribir la
													contraseña.</span></div>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="checkAuthTerms"
												required>
											<label class="custom-control-label text-light" for="checkAuthTerms">
												Conozco y Acepto las
												<a class="link-decorated" href="pre_politcs.php" target="_blank"
													title="Políticas del Aplicativo. Dentro del mismo también podrá consultarlas.">
													Políticas de Uso del Aplicativo
												</a>*
											</label>
											<div><span class="help-block text-light"></span></div>
										</div>
										<br>
										<div class="form-group py-2 text-center">
											<input type="submit" value="Regístrarte" class="btn btn-raised btn-info">
											<a class="btn btn-raised btn-danger" href="Signin/cancel">Cancelar</a>
										</div>
									</form>
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
	<script src="<?= $this->serverPath ?>resources/assets/js/PermisosDelUsuarioValidations.js"></script>
</body>

</html>