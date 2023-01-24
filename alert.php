<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
?>
    <div class="alert alert-danger alert-dismissible fade show " role="alert">
        <strong>Error!</strong> Rellenar todos los campos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>



<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Registrado!</strong> Se agregaron los datos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>


<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Cambiado!</strong> Se modificaron los datos con éxito.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>


<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Vuelve a intentarlo.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>


<?php
if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Eliminado!</strong> Se ha eliminado.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>