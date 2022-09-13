<?php
//Variables
    require_once('./conexion.php');
    $miPDO = new PDO ($hostPDO,$usuarioDB,$contraseyaDB);

    //Obtiene codigo del libro a borrar 
    $codusuario= isset($_REQUEST['codusuario'])? $_REQUEST['codusuario']:null;
    echo $codusuario;
    //Prepara DELETE
    $miConsulta = $miPDO->prepare("DELETE FROM usuarios WHERE codusuario = '$codusuario';");
    //Ejecuta la sentencia SQL
    $miConsulta->execute();
    //Redireccionamos al PHP con todos los datos
    header('Location: consultarusuario.php');
?>