<?php include '../header.php' ?>
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
                    <a class="nav-link text-white" aria-current="page" href='../notapedido/notapedido.php'>Nota Pedido</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="ordencorte.php">Orden Corte</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </header>
      </div>
    </div>
  </div>
<?php 
include_once "../model/conexion.php";
$sentencia = $bd -> query("select * from gp");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
 
  <div class="text-center fs-1 text fw-bold text-white tracking-in-expand"> Orden de Corte</div>

  <div class="container mt-5 ">
    <div class="row justify-content-center">
      <div class="col-md-8">
        
        <!-- inicio Alerta -->
          <?php 
          include_once "../alert.php";
          ?>
        <!-- Inicio Buscar -->
          <div class="card border border-white">
            <div class="card-header">
              Buscar:
            </div>
            <form class="p-4" action="ordencorte.php" method="POST">
              <div class="mb-1">            
                <input type="text" class="form-control" name="buscar" require>
                <input type="submit" class="btn btn-outline-light btn-sm mt-3" value="Buscar">
              </div>          
            </form>
          </div>       
        <!-- Fin Buscar -->
        <!-- mostar resultados -->  
          
            <div class="card mt-3 border border-white ">
                <div class="card-header ">
                  Resultados
                </div>
                <div class="p-4">
                  <table class="table aling-middle text-white">
                    <thead>             

                      <tr>                
                        <th scope="col">Empresa</th> 
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Cortador</th>                
                      </tr>              

                    </thead>
                    <tbody>
                      
                      <?php
                        include 'buscar.php';

                        while($row = mysqli_fetch_array($sql_query)){                
                      ?>

                        <tr>                 
                          <td> <?= $row['empresa'] ?></td>
                          <td> <?= $row['producto'] ?></td>
                          <td> <?= $row['cantidad'] ?></td>
                          <td> <?= $row['fecha'] ?></td>
                          <td> <?= $row['cortador'] ?></td> 
                        </tr>
                      <?php
                        }
                      ?>

                    </tbody>
                  </table>
                  
                </div>
              </div>
          
        <!-- fin mostrar resultados -->
      </div>
      <div class="col-md-4">
        <!-- Ingresar Datos -->
          <div class="card border border-white">
            <div class="card-header">
              ingresar datos:
            </div>
            <form class="p-4" action="registrar.php" method="POST">
              <div class="mb-3">
                <label class="form-label"> Empresa: </label>
                <input type="text" class="form-control" name="txtEmpresa" autofocus require>
              </div>
              <div class="mb-3">
                <label class="form-label">Producto: </label>
                <select class="form-select" name="txtProducto" aria-label="Disabled select example" >
                  <option selected>Productos</option>
                  <option value="Babucha">Babucha</option>
                  <option value="Bandana">Bandana</option>
                  <option value="Bandera">Bandera</option>
                  <option value="Bermuda Cargo">Bermuda Cargo</option>
                  <option value="Bermuda Clásico">Bermuda Clásico</option>
                  <option value="Bermuda Joggins">Bermuda Joggins</option>
                  <option value="Bermuda Náutico">Bermuda Náutico</option>
                  <option value="Buzo">Buzo</option>                                
                  <option value="Camisa">Camisa</option>
                  <option value="Campera">Campera</option>
                  <option value="Campera doble">Campera doble</option>
                  <option value="Chaleco">Chaleco</option>
                  <option value="Chaleco Doble">Chaleco Doble</option>
                  <option value="Chaquetilla">Chaquetilla</option>                
                  <option value="Chomba">Chomba</option>
                  <option value="Chomba Mangas Largas">Chomba Mangas Largas</option> 
                  <option value="Cuellera">Cuellera</option>                
                  <option value="Delantal">Delantal</option>
                  <option value="Mantel">Mantel</option>
                  <option value="Musculosa">Musculosa</option>
                  <option value="Pantalón Cargo">Pantalón Cargo</option>
                  <option value="Pantalón Clásico">Pantalón Clásico</option>
                  <option value="Pantalón Joggins">Pantalón Joggins</option>
                  <option value="Pantalón Náutico">Pantalón Náutico</option>  
                  <option value="Remera">Remera</option>
                  <option value="Remera Mangas Largas">Remera Mangas Largas</option>                  
                </select>
                
              </div>
              <div class="mb-3">
                <label class="form-label"> Cantidad: </label>
                <input type="number" class="form-control" name="Cantidad" autofocus require>
              </div>

              <div class="mb-3">
                <label class="form-label"> Fecha del corte: </label>
                <input type="date" class="form-control" name="FechaCorte" autofocus require>
              </div>
              <div class="mb-3">
                <label class="form-label"> Cortador: </label>
                <input type="text" class="form-control" name="txtCortador" autofocus require>
              </div>
              <div class="d-grid">
                <input type="hidden" name="oculto" value="1">
                <input type="submit" class="btn btn-outline-light" value="Registrar">
              </div>
            </form>
          </div>
        <!-- Fin Ingresar Datos -->
      </div>
    </div>
  </div>
</body>

<div class="container mt-5">
  <div class="row justify-content-center">
  <div class="col-md-4">
    <!-- buscador -->
     <!--  <div class="card">
        <div class="card-header">
          Buscar:
        </div>
        <form class="p-4" action="index.php" method="POST">
          <div class="mb-3">            
            <input type="text" class="form-control" name="buscar" autofocus require>
            <input type="submit" class="btn btn-primary mt-3" value="Buscar">
          </div>          
        </form>
      </div> -->
    <!--Fin buscador -->
    </div> 

    <!-- mostar resultados -->  
      <!-- <div class="col-md-7 mb-5">
        <div class="card">
            <div class="card-header">
              Resultados
            </div>
            <div class="p-4">
              <table class="table aling-middle">
                <thead>             

                  <tr>                
                    <th scope="col">Empresa</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cortador</th>                
                  </tr>              

                </thead>
                <tbody>
                  
                  <?php
                    include 'buscar.php';

                    while($row = mysqli_fetch_array($sql_query)){                
                  ?>

                    <tr>                 
                      <td> <?= $row['empresa'] ?></td>
                      <td> <?= $row['producto'] ?></td>
                      <td> <?= $row['cantidad'] ?></td>
                      <td> <?= $row['fecha'] ?></td> 
                      <td> <?= $row['cortador'] ?></td>  
                    </tr>
                  <?php
                    }
                  ?>

                </tbody>
              </table>
              
            </div>
          </div>
      </div> -->
    <!-- fin mostrar resultados --> 
      </div>
      </div>



    <!-- fin buscador -->
<?php include '../footer.php' ?>

