<?php
$conn = mysqli_connect('LOCALHOST:3306','root','','crud');
if(!isset($_POST['buscar'])){
    $_POST['buscar']= "";
    $buscar = $_POST['buscar'];
}
$buscar = $_POST['buscar'];


$sentencia =("SELECT * FROM gp WHERE empresa LIKE '%".$buscar."%' OR cantidad LIKE '%".$buscar."%' OR producto LIKE '%".$buscar."%' OR fecha LIKE '%".$buscar."%' OR cortador LIKE '%".$buscar."%';");


$sql_query= mysqli_query($conn,$sentencia);

?>