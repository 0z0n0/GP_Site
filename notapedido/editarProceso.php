<?php
print_r($_POST);
if(!isset($_POST['codigo'])){
    header('Location: notapedido.php?mensaje=error');    
}

include '../model/conexion.php';
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
$estado = $_POST["txtEstado"];

/* vendedor = ?, localidad = ?, direccion = ?, telefono = ?, textarea = ?, total = ?, sena = ?, */
/* $vendedor,$localidad,$direccion,$telefono,$descripcion,$total,$sena, */
$sentencia = $bd->prepare("UPDATE notapedido SET empresa = ?, fecha = ?,  saldo = ?, estado = ?  where id = ?; ");
$resultado = $sentencia->execute([$empresa,$fecha,$saldo,$estado,$codigo]);

if ($resultado === TRUE) {
    header("Location: notapedido.php?mensaje=editado");
} else {
    header("Location: notapedido.php?mensaje=error");
    exit();
}

?>