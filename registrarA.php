<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {

    $num_audiencia=ISSET ($_REQUEST['num_audiencia']) ? $_REQUEST['num_audiencia'] : null ;
    $lugar=ISSET ($_REQUEST['lugar']) ? $_REQUEST['lugar'] : null ;
    $fecha=ISSET ($_REQUEST['fecha']) ? $_REQUEST['fecha'] : null ;
    $hora=ISSET ($_REQUEST['hora']) ? $_REQUEST['hora'] : null ;
    $proposito_audiencia=ISSET ($_REQUEST['proposito_audiencia']) ? $_REQUEST['proposito_audiencia'] : null ;
    $objetivo_audiencia=ISSET ($_REQUEST['objetivo_audiencia']) ? $_REQUEST['objetivo_audiencia'] : null ;
    $radicado=ISSET ($_REQUEST['radicado']) ? $_REQUEST['radicado'] : null ;
    //conexion a la BS
    require_once('conexion.php');
    $miPDO = new PDO ($hostPDO,$usuarioDB, $contraseyaDB);
    $hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
    //insertar
    $miInsert = $miPDO->prepare("INSERT INTO audiencias (num_audiencia,lugar,fecha,hora,proposito_audiencia,objetivo_audiencia,radicado) VALUES
    ('$num_audiencia','$lugar','$fecha','$hora','$proposito_audiencia','$objetivo_audiencia','$radicado')");
    //ejecutar insert 
    $miInsert->execute();
    //redireccionar a leer
    header ('Location: consultaudiencia.php');

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de Audiencias</title>
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
  max-height: 830px;
  padding: 10px;
}

</style >
    <body>
    <section class="container" >
    <form action="" method="POST">
    <center><h1><i class='fas fa-user-friends'></i> Registro Nueva audiencia</h1></center>
        <br>
        <p class="ph">
            <div class="page-header">
                <label for="radicado">Radicado</label>
                <select id="radicado" type="selected" name="radicado" class="form-control">
                    <option value="radicado" selected="selected">Seleccionar radicado</option>
                    <?php
                    //conexion a la DB
                    require_once('conexion.php');
                    $miPDO = new PDO ($hostPDO,$usuarioDB, $contraseyaDB);
                    $consultaCbo = $miPDO->prepare('SELECT * FROM procesos;');
                    $consultaCbo->execute();
                    while($row=$consultaCbo->fetch(PDO::FETCH_ASSOC))
                    {
                        extract ($row);
                        ?>
                        <option value="<?php echo $radicado; ?>"><?php echo $radicado; ?></option>
                        <?php
                    }
                    ?>
                    
                </select>
                <p>
        <p >
            <label for="num_audiencia">Numero de Audiencia</label>
            <input id="num_audiencia" type="text" name="num_audiencia" class="form-control">
        </p>
        <p >
            <label for="lugar">Lugar</label>
            <input id="lugar" type="text" name="lugar" class="form-control">
        </p>
        <p >
            <label for="fecha">Fecha</label>
            <input id="fecha" type="date" name="fecha" class="form-control">
        </p>
        <p >
            <label for="hora">Hora</label>
            <input id="hora" type="time" name="hora" class="form-control">
        </p>
        <p >
            <label for="proposito_audiencia">Proposito de la Audiencia</label>
            <input id="proposito_audiencia" type="text" name="proposito_audiencia" class="form-control">
        </p>
        <p >
            <label for="objetivo_audiencia">Objetivo de la Audiencia</label>
            <input id="objetivo_audiencia" type="text" name="objetivo_audiencia" class="form-control">
        </p>
                <br><br>
                <p>
                    <center><input type="submit" value="Guardar" class="btn btn-primary"></center>
                </p>
            </div>
        </p>
    </form>
</body>
</html>