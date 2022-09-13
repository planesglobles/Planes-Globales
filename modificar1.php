<?php
        //recoger las variables
        $radicado=ISSET ($_REQUEST['radicado']) ? $_REQUEST['radicado'] : null;
        $tipo_proceso=ISSET ($_REQUEST['tipo_proceso']) ? $_REQUEST['tipo_proceso'] : null;
        $documento_identidad=ISSET ($_REQUEST['documento_identidad']) ? $_REQUEST['documento_identidad'] : null;
        $nombres=ISSET ($_REQUEST['nombres']) ? $_REQUEST['nombres'] : null;
        $apellidos=ISSET ($_REQUEST['apellidos']) ? $_REQUEST['apellidos'] : null;
        $ciudad=ISSET ($_REQUEST['ciudad']) ? $_REQUEST['ciudad'] : null;
        $ubicacion_proceso=ISSET ($_REQUEST['ubicacion_proceso']) ? $_REQUEST['ubicacion_proceso'] : null;

        //Conexion a la DB
        require_once ('conexion.php');
        $miPDO=new PDO($hostPDO,$usuarioDB,$contraseyaDB); 
        

        //$hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //Consulta UPDATE o Actualizar
            $miUpdate = $miPDO->prepare("UPDATE procesos SET radicado='$radicado',tipo_proceso = '$tipo_proceso', documento_identidad = '$documento_identidad', nombres = '$nombres', apellidos = '$apellidos', ciudad = '$ciudad', ubicacion_proceso = '$ubicacion_proceso' 
            WHERE radicado='$radicado';");
            //Ejecutar Update
            $miUpdate->execute();
                //Redireccionar a leer
        header('Location: consultaproceso.php');

        }else{
            //Preparar SELECT
            $miConsulta=$miPDO ->prepare ("SELECT * FROM procesos WHERE radicado='$radicado';");
            //Ejecutar consulta
            $miConsulta->execute();

        }

        //Obtener resultado
        $procesos=$miConsulta->fetch();
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
      <label for="radicado">Radicado</label>
      <input type="text" class="form-control" placeholder="Modifica el radicado" name="radicado" value="<?= $procesos['radicado']?>">
    </div>
    <br>
    <div class="form-group">
      <label for="tipo_proceso">Tipo de proceso</label>
      <input type="text" class="form-control" placeholder="modifica su tipo de proceso" name="tipo_proceso" value="<?= $procesos['tipo_proceso']?>">
    <br><br>
    <div class="form-group">
      <label for="documento_identidad">Documento de Identificacion</label>
      <input type="text" class="form-control" placeholder="Modifica el documento" name="documento_identidad" value="<?= $procesos['documento_identidad']?>"  readonly onmousedown="return false;">
    </div><br>
    <div class="form-group">
      <label for="nombres">Nombres</label>
      <input type="text" class="form-control" placeholder="Modifica el nombre" name="nombres" value="<?= $procesos['nombres']?>">
    </div><br>
    <div class="form-group">
      <label for="apellidos">Apellidos</label>
      <input type="text" class="form-control" placeholder="Modifica el apellido" name="apellidos" value="<?= $procesos['apellidos']?>">
    </div><br>
    <div class="form-group">
      <label for="ciudad">Ciudad</label>
      <input type="text" class="form-control" placeholder="Modifica la ciudad" name="ciudad" value="<?= $procesos['ciudad']?>">
    </div><br>
    <div class="form-group">
      <label for="ubicacion_proceso">ubicacion del proceso</label>
      <input type="text" class="form-control" placeholder="Modifica la ubicacion" name="ubicacion_proceso" value="<?= $procesos['ubicacion_proceso']?>">
    </div><br>
    <center><button type="submit" name="submit" value="modificar" class="btn btn-primary">Modificar</button></center>
    <br>
   </form>
        </body>
        </html>