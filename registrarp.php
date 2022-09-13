<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {

    $radicado=ISSET ($_REQUEST['radicado']) ? $_REQUEST['radicado'] : null ;
    $tipo_proceso=ISSET ($_REQUEST['tipo_proceso']) ? $_REQUEST['tipo_proceso'] : null ;
    $documento_identidad=ISSET ($_REQUEST['documento_identidad']) ? $_REQUEST['documento_identidad'] : null ;
    $nombres=ISSET ($_REQUEST['nombres']) ? $_REQUEST['nombres'] : null ;
    $apellidos=ISSET ($_REQUEST['apellidos']) ? $_REQUEST['apellidos'] : null ;
    $ciudad=ISSET ($_REQUEST['ciudad']) ? $_REQUEST['ciudad'] : null ;
    $ubicacion_proceso=ISSET ($_REQUEST['ubicacion_proceso']) ? $_REQUEST['ubicacion_proceso'] : null ;
    $fecha_informe=ISSET ($_REQUEST['fecha_informe']) ? $_REQUEST['fecha_informe'] : null ;
    //conexion a la BS
    require_once('conexion.php');
    $miPDO = new PDO ($hostPDO,$usuarioDB, $contraseyaDB);
    $hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
    //insertar
    $miInsert = $miPDO->prepare("INSERT INTO procesos (radicado,tipo_proceso,documento_identidad,nombres,apellidos,ciudad,ubicacion_proceso,fecha_informe) VALUES
    ('$radicado','$tipo_proceso','$documento_identidad','$nombres','$apellidos','$ciudad','$ubicacion_proceso','$fecha_informe')");
    //ejecutar insert 
    $miInsert->execute();
    //redireccionar a leer
    header ('Location: consultaproceso.php');

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de procesos</title>
    <link rel="icon" type="icon/png" href="../img/globales.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <br>
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
  width: 729px;
  height:620px;
  left:149px;
  color: white;
}
.container form{
  background: rgba(1, 1, 1, 0.3);/*#D6D6D6;*/
  opacity: 0.9;
  margin-top: 5rem;
  border-radius: 30px;
  max-height: 890px;
  padding: 10px;
}
</style>
<body>
<section class="container" >
<form action="" method="POST">
   <center><h1><i class='fas fa-user-friends'></i> Registro Nuevo Proceso</h1></center>
        <br>
        <p >
            <label for="radicado">Radicado</label>
            <input id="radicado" type="text" name="radicado" class="form-control">
        </p>
        <p >
            <label for="tipo_proceso">Tipo de Proceso</label>
            <input id="tipo_proceso" type="text" name="tipo_proceso" class="form-control">
        </p>
        <p >
            <label for="documento_identidad">Documento de Identidad</label>
            <input id="documento_identidad" type="text" name="documento_identidad" class="form-control">
        </p>
        <p >
            <label for="nombres">Nombres</label>
            <input id="nombres" type="text" name="nombres" class="form-control">
        </p>
        <p >
            <label for="apellidos">Apellidos</label>
            <input id="apellidos" type="text" name="apellidos" class="form-control">
        </p>
        <p >
            <label for="ciudad">Ciudad</label>
            <input id="ciudad" type="text" name="ciudad" class="form-control">
        </p>
        <p >
            <label for="ubicacion_proceso">Ubicacion del Proceso</label>
            <input id="ubicacion_proceso" type="text" name="ubicacion_proceso" class="form-control">
        </p>
        <p >
            <label for="fecha_informe">Fecha de Informe</label>
            <input id="fecha_informe" type="date" name="fecha_informe" class="form-control">
        </p>
                <br>
                <p>
                    <center><input type="submit" value="Guardar" class="btn btn-primary"></center>
                </p>
            </div>
        </p>
    </form>
</body>
</html>