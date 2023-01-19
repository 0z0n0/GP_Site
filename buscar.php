<?php
$conn = mysqli_connect('LOCALHOST:3306','root','','crud');
if(!isset($_POST['buscar'])){
    $_POST['buscar']= "";
    $buscar = $_POST['buscar'];
}
$buscar = $_POST['buscar'];


$sentencia =("SELECT * FROM notapedido WHERE 
                    empresa LIKE '%".$buscar."%'
                    OR fecha LIKE '%".$buscar."%'
                    OR vendedor LIKE '%".$buscar."%'
                    OR localidad LIKE '%".$buscar."%'
                    OR direccion LIKE '%".$buscar."%'
                    OR telefono LIKE '%".$buscar."%'
                    OR textarea LIKE '%".$buscar."%'
                    OR total LIKE '%".$buscar."%'
                    OR sena LIKE '%".$buscar."%'
                    OR saldo LIKE '%".$buscar."%';");


$sql_query= mysqli_query($conn,$sentencia);

?>