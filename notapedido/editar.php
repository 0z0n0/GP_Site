<?php include '../header.php' ?>

<?php
    if(!isset($_GET["codigo"])){
        header('location: notapedido.php?mensaje=error');
        exit();
    }

    include_once '../model/conexion.php';
    $codigo = $_GET["codigo"];

    $sentencia = $bd -> prepare('select * from notapedido where id = ?;');
    $sentencia->execute([$codigo]);
    $notapedido = $sentencia->fetch(PDO::FETCH_OBJ);    
?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                ingresar datos:
                </div>
                <form class="p-4" action="editarProceso.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label"> Empresa: </label>
                        <input type="text" class="form-control" name="txtEmpresa" require value="<?php echo $notapedido->empresa?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha: </label>
                        <input type="text" class="form-control" name="FechaPedido" value="<?php echo $notapedido->fecha?>" require>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Saldo: </label>
                        <input type="text" class="form-control" name="txtSaldo" value="<?php echo $notapedido->saldo?>" require>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Estado: </label>
                        <input type="text" class="form-control" name="txtEstado" value="<?php echo $notapedido->estado?>" require>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $notapedido->id?>">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../footer.php' ?>