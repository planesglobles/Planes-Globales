<?php
    $num_audiencia=ISSET ($_REQUEST['num_audiencia']) ? $_REQUEST['num_audiencia'] : null ;
    $lugar=ISSET ($_REQUEST['lugar']) ? $_REQUEST['lugar'] : null ;
    $fecha=ISSET ($_REQUEST['fecha']) ? $_REQUEST['fecha'] : null ;
    $hora=ISSET ($_REQUEST['hora']) ? $_REQUEST['hora'] : null ;
    $proposito_audiencia=ISSET ($_REQUEST['proposito_audiencia']) ? $_REQUEST['proposito_audiencia'] : null ;
    $objetivo_audiencia=ISSET ($_REQUEST['objetivo_audiencia']) ? $_REQUEST['objetivo_audiencia'] : null ;

    //Conexion a la DB
    require_once ('conexion.php');
    $miPDO=new PDO($hostPDO,$usuarioDB,$contraseyaDB); 
    

    //$hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        //Consulta UPDATE o Actualizar
        $miUpdate = $miPDO->prepare("UPDATE audiencias SET num_audiencia='$num_audiencia',lugar = '$lugar', fecha = '$fecha', hora = '$hora', proposito_audiencia = '$proposito_audiencia', objetivo_audiencia = '$objetivo_audiencia' 
        WHERE num_audiencia='$num_audiencia';");
        //Ejecutar Update
        $miUpdate->execute();
            //Redireccionar a leer
    header('Location: consultaudiencia.php');

    }else{
        //Preparar SELECT
        $miConsulta=$miPDO ->prepare ("SELECT * FROM audiencias WHERE num_audiencia='$num_audiencia';");
        //Ejecutar consulta
        $miConsulta->execute();

    }

    //Obtener resultado
    $audiencias=$miConsulta->fetch();
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
  background-size: 130rem;
  
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
  max-height: 870px;
  padding: 10px;
}
</style>
    <body>
    <section class="container" >
    <form action="" method="POST">
    <center><img class="avatar" src="../img/logoproyecto.png" alt="" width="350px" height="110px"></center>
    <br>
    <div class="form-group">
      <label for="num_audiencia">Numero de Audiencia</label>
      <input type="text" class="form-control" placeholder="Modifica el numero de audiencia" name="num_audiencia" value="<?= $audiencias['num_audiencia']?>">
    </div>
    <br>
    <div class="form-group">
      <label for="lugar">Lugar</label>
      <input type="text" class="form-control" placeholder="modifica el lugar" name="lugar" value="<?= $audiencias['lugar']?>">
    <br><br>
    <div class="form-group">
      <label for="fecha">Fecha</label>
      <input type="date" class="form-control" placeholder="Modifica la fecha" name="fecha" value="<?= $audiencias['fecha']?>">
    </div><br>
    <div class="form-group">
      <label for="hora">Hora</label>
      <input type="time" class="form-control" placeholder="Modifica la hora" name="hora" value="<?= $audiencias['hora']?>">
    </div><br>
    <div class="form-group">
      <label for="proposito_audiencia">Proposito de la Audiencia</label>
      <input type="text" class="form-control" placeholder="Modifica el proposito" name="proposito_audiencia" value="<?= $audiencias['proposito_audiencia']?>">
    </div><br>
    <div class="form-group">
      <label for="objetivo_audiencia">Objetivo de la Audiencia</label>
      <input type="text" class="form-control" placeholder="Modifica la ciudad" name="objetivo_audiencia" value="<?= $audiencias['objetivo_audiencia']?>">
    </div><br>

    <center><button type="submit" name="submit" value="modificar" class="btn btn-primary">Modificar</button></center>
    <br>
   </form>
        </body>
        </html>