<?php
//Variables
    require_once('./conexion.php');
    $miPDO = new PDO ($hostPDO,$usuarioDB,$contraseyaDB);

    //Obtiene codigo del libro a borrar 
    $num_proceso= isset($_REQUEST['num_proceso'])? $_REQUEST['num_proceso']:null;
    echo $num_proceso;
    //Prepara DELETE
    $miConsulta = $miPDO->prepare("DELETE FROM estadodeproceso WHERE num_proceso = '$num_proceso';");
    //Ejecuta la sentencia SQL
    $miConsulta->execute();
    //Redireccionamos al PHP con todos los datos
    header('Location: consultaestado.php');
?>