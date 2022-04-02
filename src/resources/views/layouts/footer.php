<?php
    $datetime = new DateTime();
    $year = $datetime->format('Y');
?>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">
                &copy; <?= $year ?> Inventarios Muebles NGR. Todos los derechos reservados.
            </div>
            <div>
                <a href="#">Políticas de privacidad</a>
                &middot;
                <a href="#">Terminos y Condiciones</a>
            </div>
        </div>
    </div>
</footer>