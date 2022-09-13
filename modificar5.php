<?php
        //recoger las variables
        $codusuario=ISSET ($_REQUEST['codusuario']) ? $_REQUEST['codusuario'] : null ;
        $nombreusuario=ISSET ($_REQUEST['nombreusuario']) ? $_REQUEST['nombreusuario'] : null ;
        $contraseña=ISSET ($_REQUEST['contraseña']) ? $_REQUEST['contraseña'] : null ;


        //Conexion a la DB
        require_once ('conexion.php');
        $miPDO=new PDO($hostPDO,$usuarioDB,$contraseyaDB); 
        

        //$hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //Consulta UPDATE o Actualizar
            $miUpdate = $miPDO->prepare("UPDATE usuarios SET codusuario='$codusuario',nombreusuario = '$nombreusuario', contraseña = '$contraseña'
            WHERE codusuario='$codusuario';");
            //Ejecutar Update
            $miUpdate->execute();
                //Redireccionar a leer
        header('Location: consultarusuario.php');

        }else{
            //Preparar SELECT
            $miConsulta=$miPDO ->prepare ("SELECT * FROM usuarios WHERE codusuario='$codusuario';");
            //Ejecutar consulta
            $miConsulta->execute();

        }

        //Obtener resultado
        $usuarios=$miConsulta->fetch();
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Modificar</title>
  <link rel="icon" type="icon/png" href="../img/globales.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  width: 729px;
  height:620px;
  left:149px;
  color: white;
}
.container form{
  background: rgba(1, 1, 1, 0.3);/*#D6D6D6*/
  opacity: 0.9;
  margin-top: 5rem;
  border-radius: 30px;
  max-height: 530px;
  padding: 10px;
}
</style>
<body>
    <section class="container" >
    <form action="" method="POST">
    <center><img class="avatar" src="../img/logoproyecto.png" alt="" width="350px" height="110px"></center>
    <br>
    <div class="form-group">
      <label for="codusuario">Codigo de usuario</label>
      <input type="text" class="form-control" placeholder="Modifica el codigo" name="codusuario" value="<?= $usuarios['codusuario']?>">
    </div>
    <br>
    <div class="form-group">
      <label for="nombreusuario">Nombre de usuario</label>
      <input type="text" class="form-control" placeholder="modifica el nombre de usuario" name="nombreusuario" value="<?= $usuarios['nombreusuario']?>">
    <br>
    <div class="form-group">
      <label for="contraseña">Contraseña</label>
      <input type="text" class="form-control" placeholder="modifica la contraseña" name="contraseña" value="<?= $usuarios['contraseña']?>">
    <br>
    <center><button type="submit" name="submit" value="modificar" class="btn btn-primary"><i class="fa fa-floppy-o"></i>  Modificar</button></center>
    <br>
   </form>
        </body>
        </html>