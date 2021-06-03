<?php

include "../conexion/conexion.php";

$id=$_POST['aid'];
$nombre=$_POST['anombre'];
$apellido=$_POST['aapellido'];
$edad=$_POST['aedad'];
$sexo=$_POST['asexo'];
$deporte=$_POST['adeporte'];

$sql="UPDATE personal SET nombre='$nombre', apellido='$apellido', edad='$edad', sexo='$sexo', deporte='$deporte' WHERE id='$id'";
echo mysqli_query($conexion, $sql);

?>
