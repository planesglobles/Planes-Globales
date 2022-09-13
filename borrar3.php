<?php
//Variables
    require_once('./conexion.php');
    $miPDO = new PDO ($hostPDO,$usuarioDB,$contraseyaDB);

    //Obtiene codigo del libro a borrar 
    $num_juzgado= isset($_REQUEST['num_juzgado'])? $_REQUEST['num_juzgado']:null;
    echo $num_juzgado;
    //Prepara DELETE
    $miConsulta = $miPDO->prepare("DELETE FROM tipodejuzgado WHERE num_juzgado = '$num_juzgado';");
    //Ejecuta la sentencia SQL
    $miConsulta->execute();
    //Redireccionamos al PHP con todos los datos
    header('Location: consultajuzgado.php');
?>