<?php
    $num_proceso=ISSET ($_REQUEST['num_proceso']) ? $_REQUEST['num_proceso'] : null ;
    $fecha=ISSET ($_REQUEST['fecha']) ? $_REQUEST['fecha'] : null ;
    $estado=ISSET ($_REQUEST['estado']) ? $_REQUEST['estado'] : null ;

    //Conexion a la DB
    require_once ('conexion.php');
    $miPDO=new PDO($hostPDO,$usuarioDB,$contraseyaDB); 
    

    //$hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        //Consulta UPDATE o Actualizar
        $miUpdate = $miPDO->prepare("UPDATE estadodeproceso SET num_proceso='$num_proceso',fecha = '$fecha', estado = '$estado'
        WHERE num_proceso='$num_proceso';");
        //Ejecutar Update
        $miUpdate->execute();
            //Redireccionar a leer
    header('Location: consultaestado.php');

    }else{
        //Preparar SELECT
        $miConsulta=$miPDO ->prepare ("SELECT * FROM estadodeproceso WHERE num_proceso='$num_proceso';");
        //Ejecutar consulta
        $miConsulta->execute();

    }

    //Obtener resultado
    $estadodeproceso=$miConsulta->fetch();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Modificar</title>
  <link rel="icon" type="icon/png" href="../img/globales.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
  body{
  background-image: url("../img/2comercial.jpg");
  background-repeat:no-repeat;
  box-sizing: border-box;
  background-position-x:center;
  background-position-y:center;
  background-size: 120rem;
  
}
.container{
  justify-content: center;
  align-items: center;
}
.container form{
  background: #D6D6D6;
  opacity: 0.9;
  margin-top: 5rem;
  border-radius: 30px;
  max-height: 980px;
  padding: 10px;
}
</style>
<body>
    <section class="container" >
    <form action="" method="POST">
    <center><img class="avatar" src="../img/logoproyecto.png" alt="" width="350px" height="110px"></center>
    <br>
    <div class="form-group">
      <label for="num_proceso">Numero de Estado</label>
      <input type="text" class="form-control" placeholder="Modifica el numero de estado" name="num_proceso" value="<?= $estadodeproceso['num_proceso']?>">
    </div>
    <br>
    <div class="form-group">
      <label for="fecha">Fecha</label>
      <input type="date" class="form-control" placeholder="Modifica la fecha" name="fecha" value="<?= $estadodeproceso['fecha']?>">
    </div><br>
    <div class="form-group">
      <label for="estado">Estado</label>
      <input type="text" class="form-control" placeholder="Modifica el estado" name="estado" value="<?= $estadodeproceso['estado']?>">
    </div><br>

    <center><button type="submit" name="submit" value="modificar" class="btn btn-primary">Modificar</button></center>
    <br>
   </form>
        </body>
        </html>