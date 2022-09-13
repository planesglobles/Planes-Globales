<?php
    $num_juzgado=ISSET ($_REQUEST['num_juzgado']) ? $_REQUEST['num_juzgado'] : null ;
    $tipo=ISSET ($_REQUEST['tipo']) ? $_REQUEST['tipo'] : null ;

    //Conexion a la DB
    require_once ('conexion.php');
    $miPDO=new PDO($hostPDO,$usuarioDB,$contraseyaDB); 
    

    //$hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        //Consulta UPDATE o Actualizar
        $miUpdate = $miPDO->prepare("UPDATE tipodejuzgado SET num_juzgado='$num_juzgado',tipo = '$tipo'
        WHERE num_juzgado='$num_juzgado';");
        //Ejecutar Update
        $miUpdate->execute();
            //Redireccionar a leer
    header('Location: consultajuzgado.php');

    }else{
        //Preparar SELECT
        $miConsulta=$miPDO ->prepare ("SELECT * FROM tipodejuzgado WHERE num_juzgado='$num_juzgado';");
        //Ejecutar consulta
        $miConsulta->execute();

    }

    //Obtener resultado
    $tipodejuzgado=$miConsulta->fetch();
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
      <label for="num_juzgado">Numero de Juzgado</label>
      <input type="text" class="form-control" placeholder="Modifica el numero de juzgado" name="num_juzgado" value="<?= $tipodejuzgado['num_juzgado']?>">
    </div>
    <br>
    <div class="form-group">
      <label for="tipo">Tipo</label>
      <input type="text" required class="form-control" placeholder="Modifica el tipo de juzgado" name="tipo" value="<?= $tipodejuzgado['tipo']?>">
    </div><br>

    <center><button type="submit" name="submit" value="modificar" class="btn btn-primary">Modificar</button></center>
    <br>
   </form>
        </body>
        </html>