<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {

    $nombreusuario=ISSET ($_REQUEST['nombreusuario']) ? $_REQUEST['nombreusuario'] : null ;
    $contraseña=ISSET ($_REQUEST['contraseña']) ? $_REQUEST['contraseña'] : null ;
    //conexion a la BS
    require_once('conexion.php');
    $miPDO = new PDO ($hostPDO,$usuarioDB, $contraseyaDB);
    $hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
    //insertar
    $miInsert = $miPDO->prepare("INSERT INTO usuarios (nombreusuario, contraseña) VALUES
    ('$nombreusuario','$contraseña')");
    //ejecutar insert 
    $miInsert->execute();
    //redireccionar a leer
    header ('Location: consultausuario.php');
 

}
?>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
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
  <form action="validar.php" method="POST">
      <br>
    <center><img class="avatar" src="./logoproyecto.png" alt="" width="350px" height="110px"></center>
    <br>
    <div class="form-group">
      <label for="nombreusuario">Usuario</label>
      <input type="text" required class="form-control" placeholder="Ingrese su usuario" name="nombreusuario">
    </div>
    <br>
    <div class="form-group">
      <label for="contraseña">Contraseña</label>
      <input type="password" required class="form-control" placeholder="Ingrese contraseña" name="contraseña">
    <br><br>
    <center><button type="submit" class="btn btn-primary">Ingresar</button></center>
    <br>
  </form>
  </section>
</body>
</html>
