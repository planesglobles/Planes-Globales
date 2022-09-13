<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=proyectoplanes", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM audiencias";
    $result = $conn->query($sql);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
$por_pagina = 3;

if (isset($_GET['pagina'])){
  $pagina = $_GET['pagina'];
}else{
  $pagina = 1;

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
      .paginador ul {
        padding: 15px;
        list-style: none;
        background: #fff;
        margin-top: 15px;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: flex-end;
      }
      .paginador li, .pageSelected {
        color: #428bca;
        padding: 8px;
        list-style: none;
        font-size: 14px;
        text-align: center;
        justify-content: flex-end;
      }
      .paginador a {
       border: 1px solid #b0c4de; /* Gray */
      }
      .paginador a:hover {
        background: #A4F4FB;
      }
    </style>
  <title>CRUD Audiencias</title>
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
      <a href="consultarusuario.php"><img class="photouser" src="user.png" alt="Usuario" title="Volver"></a>
      <a href="ingreso.php"><img  class="sesion" src="cerrarsesion.png" alt="Salir del sistema" title="Cerrar sesion">
      <a href="paginaweb.html"><img  class="close" src="volver.png" alt="Cerrar sesion" title="Salir"></a>
      
  </div>
  </div>
  <nav>
    <ul>
    <li class="principal">
        <a href="consultaproceso.php">Procesos juridicos</a>
      </li>
      <li class="principal">
        <a href="consultaestado.php">Estado de proceso</a>
      </li>
      <li class="principal">
        <a href="consultajuzgado.php">Tipo de juzgado</a>
      </li>
      <li class="principal">
        <a href="consultaudiencia.php">Audiencias</a>
      </li>
    </ul>
  </nav>
    </header>
    <br><br><br>
  <section id="container">
  <div class="container">
    <br><br><br>
  <center><img src="./logoproyecto.png" width="350px" height="110px"></center>
  <br><br><br> 
  <p><a class="button" href="registrarA.php" ><button type="button" class="btn btn-primary"><i class='fas fa-pen'></i> Registrar Audiencia</button></a></p>      
  <table class="table table-bordered">
    <thead>
      <tr>
          <br>
        <th>Radicado</th>
        <th>Numero de Audiencia</th>
        <th>Lugar</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Proposito De La Audiencia</th>
        <th>Objetivo De La Audiencia</th>        
       
        <th colspan="3">Menu de opciones</th>
        </tr>
        <?php
        $empieza = ($pagina-1) * $por_pagina;

        $sql = "SELECT * FROM audiencias LIMIT $empieza, $por_pagina";
        $result = $conn->query($sql);
        ?>
            <?php foreach ($result as $clave=>$valor): ?>
            <tr>
                <td><?= $valor['radicado']?></td>
                <td><?= $valor['num_audiencia']?></td>
                <td><?= $valor['lugar']?></td>
                <td><?= $valor['fecha']?></td>
                <td><?= $valor['hora']?></td>
                <td><?= $valor['proposito_audiencia']?></td>
                <td><?= $valor['objetivo_audiencia']?></td>
            
                

                <td><a button type="button" class="btn btn-primary" href="modificar2.php?num_audiencia=<?= $valor ['num_audiencia']?> "><i class='far fa-edit'></i> Modificar</button></a></td>
                <td><a button type="button" class="btn btn-primary" href="borrar1.php?num_audiencia=<?= $valor ['num_audiencia']?> "><i class='fas fa-trash'></i> Borrar</button></a></td>
              
                <?php endforeach; ?>
            </tr>
        </table>
        <div class="paginador">
      <li class="pageSelected">
      <?php
        $sql = "SELECT * FROM audiencias";

        $result = $conn->query($sql);

        $total_registros = $result->rowCount();

        $total_paginas = ceil($total_registros / $por_pagina);
        
        echo "<a href='consultaudiencia.php?pagina=1'>".'<<'."</a>";

        for($i=1; $i<=$total_paginas; $i++){

          echo "<a href='consultaudiencia.php?pagina=".$i."'>".$i."</a>";

        }

        echo "<a href='consultaudiencia.php?pagina=$total_paginas'>".'>>'."</a>";

      ?>
      </li>
      </div>
      <style>
        a{
          padding: 12px;
          color: #1B4F72;
          text-decoration: none;
        }
      </style>
        </div>
<br>
    </section>
</body>
</html>