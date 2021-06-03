<?php

include "../conexion/conexion.php";

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$edad=$_POST['edad'];
$sexo=$_POST['sexo'];
$deporte=$_POST['deporte'];

$sql="INSERT INTO personal (nombre, apellido, edad, sexo, deporte) VALUES ('$nombre', '$apellido', '$edad', '$sexo', '$deporte')";
echo mysqli_query($conexion, $sql);

 ?>
