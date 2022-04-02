<?php

if (@$_REQUEST['c'] == 'Signin' || @$_REQUEST['c'] == 'RecuperarContraseña') {
    $alternativeMethod = preg_split('[/]', $_SERVER['REQUEST_URI']);

    if(is_numeric(end($alternativeMethod))) {
        $this->serverPath = $this->serverPath . '../';
    }
}

if (@$_REQUEST['c'] == 'Login' || @$_REQUEST['c'] == 'Signin' || @$_REQUEST['c'] == 'RecuperarContraseña') {

?>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" href="<?= $this->serverPath ?>resources/assets/img/logo/favicon_ngr.ico">
	<link rel="stylesheet" href="<?= $this->serverPath ?>resources/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?= $this->serverPath ?>resources/assets/css/userStyles.css">

<?php 
} else {
    if (@$_REQUEST['m']) {
        $this->serverPath = $this->serverPath . '../';
    }
    
    $alternativeMethod = preg_split('[/]', $_SERVER['REQUEST_URI']);

    if(is_numeric(end($alternativeMethod))) {
        $this->serverPath = $this->serverPath . '../';
    }
?>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Muebles NGR" />
    <meta name="author" content="Brayan Rojas, Juan Gamba & Luis Hernandez." />
    <link rel="icon" href="<?= $this->serverPath ?>resources/assets/img/logo/favicon_ngr.ico">
    <link rel="stylesheet" href="<?= $this->serverPath ?>resources/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= $this->serverPath ?>resources/assets/css/main.css">
    <link rel="stylesheet" href="<?= $this->serverPath ?>resources/assets/css/dataTables.bootstrap4.min.css">
    <script src="https://kit.fontawesome.com/3ba21c1b77.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php 
}
?>