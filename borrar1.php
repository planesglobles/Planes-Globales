<?php
//Variables
    require_once('./conexion.php');
    $miPDO = new PDO ($hostPDO,$usuarioDB,$contraseyaDB);

    //Obtiene codigo del libro a borrar 
    $num_audiencia= isset($_REQUEST['num_audiencia'])? $_REQUEST['num_audiencia']:null;
    echo $radicado;
    //Prepara DELETE
    $miConsulta = $miPDO->prepare("DELETE FROM audiencias WHERE num_audiencia = '$num_audiencia';");
    //Ejecuta la sentencia SQL
    $miConsulta->execute();
    //Redireccionamos al PHP con todos los datos
    header('Location: consultaudiencia.php');
?>