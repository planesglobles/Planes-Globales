<?php

$nombreusuario=$_POST['nombreusuario'];
$contraseña=$_POST['contraseña'];

$conexion=mysqli_connect("localhost", "root", "", "proyectoplanes");
$consulta="SELECT * FROM usuarios WHERE nombreusuario='$nombreusuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:consultarusuario.php");

}else{
    ?>
    <?php
    header("location:ingreso.php");
    echo "error ";
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>












