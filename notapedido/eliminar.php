<?php
if(!isset($_GET['codigo'])){
    header('Location: notapedido.php?mensaje=error');
    exit();
}

include_once '../model/conexion.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("DELETE from notapedido where id = ?; ");
$resultado = $sentencia->execute([$codigo]);

if ($resultado === TRUE) {
    header("Location: notapedido.php?mensaje=eliminado");
} else {
    header("Location: notapedido.php?mensaje=error");
    exit();
}
?>