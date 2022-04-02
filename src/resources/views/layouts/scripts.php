<script src="<?= $this->serverPath ?>resources/assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= $this->serverPath ?>resources/assets/js/scripts.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

<script src="<?= $this->serverPath ?>resources/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= $this->serverPath ?>resources/assets/js/chart-area-demo.js"></script>
<script src="<?= $this->serverPath ?>resources/assets/js/chart-bar-demo.js"></script>
<script src="<?= $this->serverPath ?>resources/assets/js/jquery.dataTables.min.js"></script>

<script src="<?= $this->serverPath ?>resources/assets/js/dataTables.bootstrap4.min.js"></script>

<?php 

if (@$_REQUEST['c'] != 'Login') {
if (@$_REQUEST['c'] != 'Signin') {

?>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        "order": [[ 0, "desc" ]],
        "scrollX": true,
        "language": {
            "infoEmpty": "No hay registros para mostrar",
            "info": "Mostrando del _START_ al _END_ para _TOTAL_ registros",
            "emptyTable": "No hay registros en la tabla",
            "zeroRecords": "No se han encontrado resultados",
            "search": "Buscar:",
            "Processing": "Procesando...",
            "LoadingRecords": "Cargando...",
            "infoFiltered": "(De _MAX_ registros se encontraron _TOTAL_ dato/s coincidentes)",
            "infoEmpty": "No hay registros para mostrar",
            "emptyTable": "No hay registros en la tabla",
            "lengthMenu": 'Mostrar <select>' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="40">40</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">total de</option>' +
                '</select> filas',
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente",
                "last": "última",
                "first": "Primera"
            }
        }
    });
});
</script>
<script>
document.getElementById("logout").addEventListener("click", myFunction);

function myFunction() {
    Swal.fire({
        title: 'Cerrar Sesión',
        text: "¿Salir del sistema?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#007bff',
        cancelButtonColor: '#dc3545',
        confirmButtonText: '<i class="fas fa-check"></i> Salir ',
        cancelButtonText: '<i class="fas fa-times"></i> Cancelar '
    }).then((result) => {
        if (result.value) {
            window.location.href = "<?= $this->serverPath.'Security/destroy' ?>";
        }
    })
}
</script>
<?php 
}
}
?>
<script>
function verificarFormUsPermitido() {
    var documento = document.form.userDoc;
    if (documento.value == "") {
        documento.setCustomValidity('No ha ingresado su documento');
    }
    if (documento.value != "") {
        documento.setCustomValidity('');
    }
}
</script>
<script>
function confirmDelete(path, input) {

    if (path && input) {
        Swal.fire({
            title: `¿Desea eliminar ${input}?`,
            text: 'Esta acción es irreversible.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#dc3545',
            confirmButtonText: '<i class="fas fa-check"></i> Eliminar ',
            cancelButtonText: '<i class="fas fa-times"></i> Cancelar '
        }).then((result) => {
            if (result.value) {
                window.location.href = path;
            }
        })
    }

}
</script>