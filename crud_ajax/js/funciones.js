//FUNCION AGREGAR DATOS
function agregar_datos(){
  var datos=$("#frm_registrar").serialize();

  $.ajax({
    method:"POST",
    url:"../proyecto/insertar.php",
    data: datos,
    success: function(e){

      if(e==1){
        alert("Registro exitoso");
        $("#tabla_registros").load('../proyecto/index.php');
      }
      else{
        alert("Error registro");
      }
    }
  });
  return false;
}

//FUNCION PARA COGER LOS DATOS DE LA TABLA MODIFICAR JUGADOR
function llenarModal_actualizar(datos){
d=datos.split('||');
$("#aid").val(d[0]);
$("#anombre").val(d[1]);
$("#aapellido").val(d[2]);
$("#aedad").val(d[3]);
$("#asexo").val(d[4]);
$("#adeporte").val(d[5]);
}

//FUNCION ACTUALIZAR DATOS TABLA MODIFICAR JUGADOR
function actualizar_datos(){
  var datos= $("#frm_actualizar").serialize();
  $.ajax({
    method:"POST",
    url:"../proyecto/actualizar.php",
    data: datos,
    success: function(e){
      if(e==1){
        alert("Registro actualizado");
        $("#tabla_registros").load('../proyecto/index.php');
      }
      else{
        alert("Error actualizando");
      }
    }
  });
  return false;
}

//FUNCION ELIMINAR DATOS TABLA MODIFICAR JUGADOR
function eliminar_datos(){
  var datos= $("#frm_actualizar").serialize();
  $.ajax({
    method:"POST",
    url:"../proyecto/eliminar.php",
    data: datos,
    success: function(e){
      if(e==1){
        alert("Registro Eliminado");
        $("#tabla_registros").load('../proyecto/index.php');
      }
      else{
        alert("Error Eliminando");
      }
    }
  });
  return false;
}

//FUNCION SINCRONIZAR TABLA MODIFICAR JUGADOR
function sincronizar(){
  var datos=$("#frm_actualizar").serialize();

  $.ajax({
    method:"POST",
    url:"",
    data: datos,
    success: function(e){
        $("#tabla_registros").load('../proyecto/index.php');
    }
  });
  return false;
}
