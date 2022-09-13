<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=proyectoplanes", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM procesos p INNER JOIN estadodeproceso e ON p.radicado = e.estado";
  $result = $conn->query($sql);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Control de Consultas</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        
        <div>
        <div>
            <table class="table table-striped">
                <tr>
                    <th>Radicado</th>
                    <th>Estado de proceso</th>
                    
                </tr>
                <?php foreach ($result as $clave=>$valor):?>
                    <tr>
                        <td class=""><?=$valor['radicado'];?></td>
                        <td class=""><?=$valor['estado'];?></td>
                        
                       
                    <?php endforeach; ?>
                </tr>
            </table>
        </div>
        </div>
        <td><a button class="btn btn-info" href="consultaproceso.php">Volver</button></a></td>
    </body>
    <style>
        table{
            margin-top: 10rem;
        }
        input{
            border-radius: 5px;
            border-color: #000000;
        }
        body{
            background-color:#f7f7ff;
        }
    </style>
</html>