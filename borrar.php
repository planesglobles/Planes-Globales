<?php
//Variables
    require_once('./conexion.php');
    $miPDO = new PDO ($hostPDO,$usuarioDB,$contraseyaDB);

    //Obtiene codigo del libro a borrar 
    $radicado= isset($_REQUEST['radicado'])? $_REQUEST['radicado']:null;
    echo $radicado;
    //Prepara DELETE
    $miConsulta = $miPDO->prepare("DELETE FROM procesos WHERE radicado = '$radicado';");
    //Ejecuta la sentencia SQL
    $miConsulta->execute();
    //Redireccionamos al PHP con todos los datos
    header('Location: consultaproceso.php');
?>