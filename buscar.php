<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=proyectoplanes", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM procesos ORDER BY radicado DESC";
    $result = $conn->query($sql);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$por_pagina = 5;

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
      .form_search{
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        float: right;
        background: initial;
        padding: 10px;
        border-radius: 10px;
      }
      .form_search .btn_search{
        background: #2E86C1;
        color: #fff;
        padding: 0 20px;
        border: 0;
        cursor: pointer;
        margin-left: 10px;
      }
    </style>
  <title>CRUD Procesos</title>
  <link rel="icon" type="icon/png" href="../img/globales.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include"scripts.php"; ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
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
      <a href="paginaweb.html"><img  class="close" src="volver.png" alt="Cerrar sesion" title="Salir"></a>
      <a href="ingreso.php"><img  class="sesion" src="cerrarsesion.png" alt="Salir del sistema" title="Cerrar sesion"></a>
      
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
    <center><img src="./logoproyecto.png" width="330px" height="90px"></center>
    <br><br>
    <a class="button" href="registrarp.php" ><button type="button" class="btn btn-primary">Registrar proceso</button></a>
    <?php
    $busqueda =$_POST['buscar'];
    ?>
    <form action="buscar.php" method="POST" class="form_search">
    <p>
      <input type="search" name="Buscar" placeholder="Radicado">
      <table class="table table-bordered"> 
      <h1 class="h1">Buscar</h1>

<div class="flexsearch">
		<div class="flexsearch--wrapper">
			<form class="flexsearch--form" action="#" method="post">
				<div class="flexsearch--input-wrapper">
					<input class="flexsearch--input" type="search" placeholder="search">
				</div>
				<input class="flexsearch--submit" type="submit" value="&#10140;"/>
			</form>
		</div>
</div>
      <input type="submit" value="Buscar">
    </p>
    </form>
      <br><br>
  
    <thead>
      <tr>
          <br>
        <th>Radicado</th>
        <th>Tipo de proceso</th>
        <th>Documento de Identificacion</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Ciudad</th>
        <th>Ubicacion de Proceso</th>
        <th>Fecha de Informe</th>
      
        <th colspan="3">Menu de opciones</th>
        </tr>
        
      <?php
            include('conexion.php');
            //$busqueda= strtolower($_REQUEST['buscar']);
            if(empty($busqueda)){
          header("location: consultaproceso.php");
            }
            $sql = "SELECT * FROM procesos WHERE radicado=$busqueda  ORDER BY radicado DESC";
            $result = $conn->query($sql);
        ?>
        <?php
        $empieza = ($pagina-1) * $por_pagina;

        $sql = "SELECT * FROM procesos LIMIT $empieza, $por_pagina";
        $result = $conn->query($sql);
        
        ?>
            <?php foreach ($result as $clave=>$valor): ?>

            <tr>
                <td><?= $valor['radicado']?></td>
                <td><?= $valor['tipo_proceso']?></td>
                <td><?= $valor['documento_identidad']?></td>
                <td><?= $valor['nombres']?></td>
                <td><?= $valor['apellidos']?></td>
                <td><?= $valor['ciudad']?></td>
                <td><?= $valor['ubicacion_proceso']?></td>
                <td><?= $valor['fecha_informe']?></td>
            

                <td><a button type="button" class="btn btn-primary" href="modificar1.php?radicado=<?= $valor ['radicado']?> ">Modificar</button></a></td>
                <td><a button type="button" class="btn btn-primary" href="borrar.php?radicado=<?= $valor ['radicado']?> ">Borrar</button></a></td>

                <?php endforeach; ?>
            </tr>
            </div>
              </div>
        </table>
    <div class="paginador">
      <li class="pageSelected">
      <?php
        $sql = "SELECT * FROM procesos";

        $result = $conn->query($sql);

        $total_registros = $result->rowCount();

        $total_paginas = ceil($total_registros / $por_pagina);
        
        echo "<a href='consultaproceso.php?pagina=1'>".'<<'."</a>";

        for($i=1; $i<=$total_paginas; $i++){

          echo "<a href='consultaproceso.php?pagina=".$i."'>".$i."</a>";

        }

        echo "<a href='consultaproceso.php?pagina=$total_paginas'>".'>>'."</a>";

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