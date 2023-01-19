<?php
//print_r($_POST);
if(empty($_POST["oculto"]) ||
    empty($_POST["FechaPedido"]) ||
    empty($_POST["txtLocalidad"]) ||
    empty($_POST["txtDireccion"]) ||
    empty($_POST["txtDescripcion"]) ||
    empty($_POST["txtTelefono"]) ||
    empty($_POST["txtTotal"]) ||    
    empty($_POST["txtVendedor"]) ||
    empty($_POST["txtSaldo"])){
    header('Location: index.php?mensaje=falta');
    exit();
}
include_once 'model/conexion.php';
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

echo $empresa;
echo $fecha;
echo $localidad;
echo $direccion;
echo $descripcion;


$sentencia = $bd ->prepare("INSERT INTO notapedido (empresa, fecha,vendedor, localidad, direccion, telefono, textarea, total, sena, saldo) VALUES (?,?,?,?,?,?,?,?,?,?);");
$resultado = $sentencia->execute([$empresa, $fecha,$vendedor, $localidad, $direccion, $telefono, $descripcion, $total, $sena, $saldo]);

if ($resultado === TRUE) {
    header('location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    print_r($resultado);
    exit();
}



?>