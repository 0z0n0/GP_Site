<?php
//print_r($_POST);
if(empty($_POST["oculto"]) || empty($_POST["txtEmpresa"]) || empty($_POST["txtProducto"]) || empty($_POST["Cantidad"]) || empty($_POST["FechaCorte"]) ||empty($_POST["txtCortador"])){
    header('Location: ordencorte.php?mensaje=falta');
    exit();
}
include_once '../model/conexion.php';
$empresa = $_POST["txtEmpresa"];
$producto = $_POST["txtProducto"];
$cantidad = $_POST["Cantidad"];
$fechaCorte = $_POST["FechaCorte"];
$cortador = $_POST["txtCortador"];
echo $empresa;
echo $producto;
echo $cantidad;
echo $fechaCorte;
echo $cortador;


$sentencia = $bd ->prepare("INSERT INTO gp (empresa, producto, cantidad, fecha, cortador) VALUES (?,?,?,?,?);");
$resultado = $sentencia->execute([$empresa, $producto, $cantidad, $fechaCorte, $cortador ]);

if ($resultado === TRUE) {
    header('location: ordencorte.php?mensaje=registrado');
} else {
    header('Location: ordencorte.php?mensaje=error');
    print_r($resultado);
    exit();
}



?>