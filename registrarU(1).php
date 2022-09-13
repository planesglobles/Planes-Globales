<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {

    
    $codusuario=ISSET ($_REQUEST['codusuario']) ? $_REQUEST['codusuario'] : null ;
    $nombreusuario=ISSET ($_REQUEST['nombreusuario']) ? $_REQUEST['nombreusuario'] : null ;
    $contraseña=ISSET ($_REQUEST['contraseña']) ? $_REQUEST['contraseña'] : null ;
    $codrol=ISSET ($_REQUEST['codrol']) ? $_REQUEST['codrol'] : null ;
    //conexion a la BS
    require_once('conexion.php');
    $miPDO = new PDO ($hostPDO,$usuarioDB, $contraseyaDB);
    $hostPDO="mysql:host=$hostDB;dbname=$nombreDB;";
    //insertar
    $miInsert = $miPDO->prepare("INSERT INTO usuarios (codusuario,nombreusuario,contraseña,codrol) VALUES
    ('$codusuario','$nombreusuario','$contraseña','$codrol')");
    //ejecutar insert 
    $miInsert->execute();
    //redireccionar a leer
    header ('Location: consultarusuario.php');

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuarios</title>
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
  max-height: 530px;
  padding: 10px;
}

</style>
<body>
<section class="container" >
    <form action="" method="POST">
    <center><h1><i class='fas fa-user-friends'></i> Registro Nuevo Usuario</h1></center>
        <p class="ph">
            <div class="page-header">
                <label for="codrol">Rol</label>
                <select id="codrol" type="selected" name="codrol" class="form-control">
                    <option value="codrol" selected="selected">Seleccionar rol</option>
                    <?php
                    //conexion a la DB
                    require_once('conexion.php');
                    $miPDO = new PDO ($hostPDO,$usuarioDB, $contraseyaDB);
                    $consultaCbo = $miPDO->prepare('SELECT * FROM roles;');
                    $consultaCbo->execute();
                    while($row=$consultaCbo->fetch(PDO::FETCH_ASSOC))
                    {
                        extract ($row);
                        ?>
                        <option value="<?php echo $codrol; ?>"><?php echo $nombrerol; ?></option>
                        <?php
                    }
                    ?>
                    
                </select>
                <p>
        <p >
            <label for="codusuario">Codigo de Usuario</label>
            <input id="codusuario" type="text" name="codusuario" class="form-control">
        </p>
        <p >
            <label for="nombreusuario">Nombre de usuario</label>
            <input id="nombreusuario" type="text" name="nombreusuario" class="form-control">
        </p>
        <p >
            <label for="contraseña">Contraseña</label>
            <input id="contraseña" type="text" name="contraseña" class="form-control">
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