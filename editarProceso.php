<?php
print_r($_POST);
if(!isset($_POST['codigo'])){
    header('Location: index.php?mensaje=error');    
}

include 'model/conexion.php';
$codigo = $_POST['codigo'];
$empresa = $_POST["txtEmpresa"];
$fecha = $_POST["FechaPedido"];
$localidad = $_POST["txtLocalidad"];
$direccion = $_POST["txtDireccion"];
$telefono = $_POST["txtTelefono"];
$total = $_POST["txtTotal"];
$sena = $_POST["txtSena"];
$saldo = $_POST["txtSaldo"];
$vendedor = $_POST["txtVendedor"];
$descripcion = $_POST["txtDescripcion"];


$sentencia = $bd->prepare("UPDATE notapedido SET empresa = ?, fecha = ?, vendedor = ?, localidad = ?, direccion = ?, telefono = ?, textarea = ?, total = ?, sena = ?, saldo = ?  where id = ?; ");
$resultado = $sentencia->execute([$empresa,$fecha,$vendedor,$localidad,$direccion,$telefono,$descripcion,$total,$sena,$saldo,$codigo]);

if ($resultado === TRUE) {
    header("Location: index.php?mensaje=editado");
} else {
    header("Location: index.php?mensaje=error");
    exit();
}

?>