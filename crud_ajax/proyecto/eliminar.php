<?php

include "../conexion/conexion.php";

$id=$_POST['aid'];

$sql="DELETE FROM personal WHERE id='$id' ";
echo mysqli_query($conexion, $sql);

 ?>
