<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=proyectoplanes", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM usuarios";
    $result = $conn->query($sql);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
/* require_once('conexion.php');
$miPDO = new PDO ($hostPDO,$usuarioDB, $contraseyaDB);
//consulta select
$miconsulta = $miPDO->prepare("SELECT *     FROM clientes;");
//ejecutar consulta
$miconsulta->execute(); */
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    body {
        background: #ededed;
      }
      .h1 {
        font-size: 26px;
        font-family: 'arial black';
        font-weight: bold;
        letter-spacing: 1px;
      }
      p {
        font-family: 'arial';
        letter-spacing: 2px;
        font-size: 14px;
        line-height: 20px;
      }
      a {
        text-decoration: none;
        font-family: arial;
        letter-spacing: 1px;
      }
      span {
        font-family: 'GothamBook';
        letter-spacing: 1px;
        font-size: 14px;
        line-height: 20px;
      }
      header{
        position: fixed;
        width: 100%; 
      }
      .header {
        color: #fff;
        background: #1B4F72;
        height: 35px;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content:space-between;
        align-items: center;
        padding: 30px;
        text-align: center;
      }
      .optionsBar{
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .optionsBar span {
        color: #fff;
        font-size: 11pt;
        font-family: 'GothamBook';
        text-transform: uppercase;
        margin-left: 30px;
      }
      .photouser {
        margin-left: 30px;
        width: 25px;
        height: 25px;
      }
      .close {
        width: 25px;
        height: 25px;
      }
      .sesion {
        margin-left: 45px;
        width: 25px;
        height: 25px;
      }
      .optionsBar a{
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        margin-left: 30px;
      }
      nav ul{
        background: #2E86C1;
        list-style: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: left;
        align-items: center;
      } 
      nav ul > li a{
        position: relative;
      }
      nav a {
        color: #fff;
        display: block;
        font-size: 10pt;
        font-family: 'GothamBook';
        padding: 15px 30px;
        text-transform: uppercase;
        letter-spacing: 2px;
        transition: background .5s;
        border-right: 1px solid #319B8F;
      }
      nav .principal > a{
        background-position-x: 0%;
        background-position-y: 0%;
        background-size: auto auto;
        background-position: 94% center;
        background-size: 10px;
        text-decoration: none;
      }
      nav .principal > a:hover{
        background: #C9FFFD;
      }
      table {
        border-collapse: left;
        font-size: 12pt;
        font-family: 'arial';
        width: 100%;
      }
      table th {
        text-align: left;
        padding: 10px;
        background: #2E86C1;
        color: #fff;
      }
      table  tr:nth-child(even){
        background-color: #D6EAF8 ;
      }
  </style>
  <title>CRUD Usuarios</title>
  <link rel="icon" type="icon/png" href="../img/globales.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include"scripts.php"; ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<header>
  <div class="header">

  <h1>Sistema de Gestion</h1>
  <div class="optionBar">
    <p>Colombia-Bogota, <?php echo fechaC(); ?></p>
      <span>|</span>
      <span class="user">Admin</span>
      <img class="photouser" src="user.png" alt="Usuario">
      <a href="paginaweb.html"><img  class="close" src="volver.png" alt="Cerrar sesion" title="Salir"></a>
      <a href="ingreso.php"><img  class="sesion" src="cerrarsesion.png" alt="Salir del sistema" title="Cerrar sesion"></a>
  </div>
  </div>
  <nav>
    <ul>
    <li class="principal">
        <a href="consultaproceso.php">Ingresar</a>
      </li>
      </nav>
    </header>
    <br><br><br>
  <section id="container">
  <div class="container">
    <br><br><br>
    <center><img src="./logoproyecto.png" width="330px" height="90px"></center>
    <br>
    <br><br>
    <h1>Control de usuarios     <a class="button" href="registrarU.php" ><button type="button" class="btn btn-primary"><i class='fas fa-user-edit'></i> Registrar usuario</button></a> </h1>
      <br><br>     
  <table class="table table-bordered">
    <thead>
      <tr>
          <br>
        <th>Codigo de usuario</th>
        <th>Rol</th>
        <th>Nombre Usuario</th>
       
        <th colspan="3">Menu de opciones</th>
        </tr>
            <?php foreach ($result as $clave=>$valor): ?>
            <tr>
                <td><?= $valor['codusuario']?></td>
                <td><?= $valor['codrol']?></td>
                <td><?= $valor['nombreusuario']?></td>
            
                
                <td><a button type="button" class="btn btn-primary" href="modificar5.php?codusuario=<?= $valor ['codusuario']?> "><i class='far fa-edit'></i> Modificar</button></a></td>
                <td><a button type="button" class="btn btn-primary" href="borrar5.php?codusuario=<?= $valor ['codusuario']?> "><i class='fas fa-trash'></i> Borrar</button></a></td>
              
                <?php endforeach; ?>
            </tr>
        </table>
        <br>
        <br>
    </div>
    </div>
</body>
</html>