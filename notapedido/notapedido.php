<?php include '../header.php'?>
<?php
include_once "../model/conexion.php";
$sentencia = $bd->query("select * from notapedido");
$empresa = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<!-- NAV -->

<div class="container-fluid ">
  
    <div class="row">
      <div class="col-md">
        <header class="py-3">
          <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
              <a class="navbar-brand title text-white " href="../index.php">
                <img class="imgnav rotate-hor-bottom" src="../Logo_GP.svg" alt="">
                </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href='notapedido.php'>Nota Pedido</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="../ordencorte/ordencorte.php">Orden Corte</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </header>
      </div>
    </div>
  </div>

<!-- NAV -->
<div class="text-center fs-1 text fw-bold text-white tracking-in-expand"> Nota de Pedido </div>
<div class="container mt-5 ">
  
  <div class="row ">
    <div class="col-8">
        <!-- inicio Alerta -->
        <?php
        include_once "../alert.php";
        ?>
      <!-- Fin Alerta -->
      <!-- Ingresar Datos -->
        <div class="card border border-white shadow-lg">
          <div class="card-header">
            ingresar datos:
          </div>
          <form class="p-4" action="registrar.php" method="POST">
            <div class="mb-3">
              <label class="form-label"> Empresa: </label>
              <input type="text" class="form-control" name="txtEmpresa" autofocus require>
            </div>
            <div class="mb-3">
              <label class="form-label"> Número orden: </label>
              <input type="number" class="form-control" name="codigo" placeholder="Ejemplo: 6176">
            </div>
            <div class="mb-3">
              <label class="form-label"> Fecha Pedido: </label>
              <input type="text" class="form-control" name="FechaPedido" require>
            </div>
            <div class="mb-3">
              <label class="form-label"> Localidad: </label>
              <input type="text" class="form-control" name="txtLocalidad" require>
            </div>
            <div class="mb-3">
              <label class="form-label"> Dirección: </label>
              <input type="text" class="form-control" name="txtDireccion"  require>
            </div>
            <div class="mb-3">
              <label class="form-label"> Teléfono: </label>
              <input type="text" class="form-control" name="txtTelefono"  require>
            </div>
            <div class="mb-3">
              <label class="form-label"> Vendedor: </label>
              <input type="text" class="form-control" name="txtVendedor"  require>
            </div>
            <div class="mb-3 ">
              <textarea class="rounded" name="txtDescripcion" rows="10" cols="90" placeholder="Escribir aquí Producto, detalle y cantidad" style = "resize: none; display: block; margin-left: auto;margin-right: auto;"  ></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label"> Total: </label>
              <input type="text" class="form-control" name="txtTotal"  require>
            </div>
            <div class="mb-3">
              <label class="form-label"> Seña: </label>
              <input type="text" class="form-control" name="txtSena"  require>
            </div>
            <div class="mb-3">
              <label class="form-label"> Saldo: </label>
              <input type="text" class="form-control" name="txtSaldo"  require>
            </div>
            <div class="mb-3">
              <label class="form-label"> Estado: </label>
              <input type="text" class="form-control" name="txtEstado" placeholder="Ejemplo: En espera - En produccion - Finalizado - Bordando - etc." require>
            </div>
            <div class="d-grid">
              <input type="hidden" name="oculto" value="1">
              <input type="submit" class="btn btn-outline-light mt-3" value="Registrar">
            </div>
          </form>
        </div>
      <!-- Fin Ingresar Datos -->
    </div>
    <!-- Buscar -->
    <div class="col-4 ">
      <div class="card border border-white" >
          <div class="fw- bold card-header">
            BUSCAR
          </div>
          <form class="p-4" action="notapedido.php" method="POST">
            <div class="mb-1">
              <input type="text" class="form-control" name="buscar" require>
              <input type="submit" class="btn btn-outline-light mt-3" value="Buscar">
            </div>
          </form>
      </div>
    </div>
    <!-- Fin buscar -->
  </div>
</div>

<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col">
      <!-- Lista con Update y Delete -->
        <div class="card">
          <div class="card-header">
            Pedidos Cargados
          <div class="p-4">
            <table class="table aling-middle text-white">
              <thead>

                <tr class="tablaNotaPedido">
                  <!-- <th scope="col">#</th> -->
                  <th scope="col">N°</th>
                  <th scope="col">Empresa</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Vendedor</th>
                  <th scope="col">Localidad</th>
                  <th scope="col">Direccion</th>
                  <th scope="col">Telefono</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Total</th>
                  <th scope="col">Seña</th>
                  <th scope="col">Saldo</th>
                  <th scope="col">Estado</th>
                  <th scope="col" colspan="2">Opciones</th>
                </tr>

              </thead>
              <tbody>

                <?php
                foreach ($empresa as $dato) {
                ?>

                  <tr>
                    <!-- <td scope="row"><?php echo $dato->id ?></td> -->
                    <td> <?php echo $dato->codigo ?></td>
                    <td> <?php echo $dato->empresa ?></td>                    
                    <td> <?php echo $dato->fecha ?></td>
                    <td> <?php echo $dato->vendedor ?></td>
                    <td> <?php echo $dato->localidad ?></td>
                    <td> <?php echo $dato->direccion ?></td>
                    <td> <?php echo $dato->telefono ?></td>
                    <td> <?php echo $dato->textarea ?></td>
                    <td> <?php echo $dato->total ?></td>
                    <td> <?php echo $dato->sena ?></td>
                    <td><?php echo $dato->saldo ?></td>
                    <td><?php echo $dato->estado ?></td>
                    <td ><a class="text-success" href="editar.php?codigo=<?php echo $dato->id ?>"><i class="bi bi-pencil-square"></i></a></td>
                    <td ><a onclick="return confirm('¿Estás seguro de eliminar?')" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->id ?>"><i class="bi bi-trash3-fill"></i></a></td>

                  </tr>

                <?php
                }
                ?>

              </tbody>
            </table>
      <!--Fin Lista con Update y Delete -->
    </div>
  </div>
</div>

<?php include '../footer.php'?>
      