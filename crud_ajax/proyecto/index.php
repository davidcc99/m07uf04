<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD PHP Y AJAX</title>

    <script src="../librerias/materialize/jquery-3.4.0.min.js"></script>
    <script src="../js/funciones.js"></script>
    <script src="../librerias/materialize/js/materialize.min.js"></script>
    <link rel="stylesheet" href="../librerias/materialize/css/materialize.min.css">
    <background
  </head>
  <body class="amber lighten-5">
    <!-- TABLA JUGADORES -->
    <div class="row" id="tabla_registros">
      <!-- FORMULARIO JUGADOR-->
      <div class="col 14" style="margin-left: 5%;">
        <h5 class="purple-text">REGISTRAR JUGADOR</h5><br><br>
        <form id="frm_registrar" method="post">
          <div class="input-field">
            <input type="text" name="nombre" value="" id="nombre" placeholder="">
            <label for="nombre">Nombre</label>
          </div>

          <div class="input-field">
            <input type="text" name="apellido" value="" id="apellido" placeholder="">
            <label for="apellido">Apellido</label>
          </div>

          <div class="input-field ">
            <input type="number" min="0" max="200" name="edad" value="" id="edad" placeholder="">
            <label for="edad">Edad</label>
          </div>

          <div class="input-field">
            <select class="" name="sexo" id="sexo">
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
            </select>
            <label for="sexo">Sexo</label>
          </div>

          <div class="input-field">
            <input type="text" name="deporte" value="" id="deporte" placeholder="">
            <label for="deporte">Deporte</label>
          </div>
          <br>
          <div class="input-field">
            <button type="submit" name="btn_guardar" id="btn_guardar" class="btn-small blue">Guardar registro</button>
            <label for=""></label>
          </div>
          <br>
          <div class="input-field">
            <button type="submit" name="btn_sinc" id="btn_sinc" class="btn-small red darken-3">Sincronizar tabla</button>
            <label for=""></label>
          </div>

        </form>
      </div>
      <!-- FORMULARIO JUGADOR FIN -->
      <!-- TABLA EDITAR-->
      <div class="col 16 flow-text" style="margin-left: 10%;">
        <h5 class="purple-text">MODIFICAR JUGADOR</h5><br><br>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>NOMBRE</th>
              <th>APELLIDO</th>
              <th>EDAD</th>
              <th>SEXO</th>
              <th>DEPORTE</th>
              <th></th>
            </tr>
          </thead>
          <?php
          include '../conexion/conexion.php';
          $sql="SELECT * FROM personal";
          $ejecutar=mysqli_query($conexion, $sql);
          while ($fila=mysqli_fetch_array($ejecutar)){

            $datos=$fila[0]."||".
            $fila[1]."||".
            $fila[2]."||".
            $fila[3]."||".
            $fila[4]."||".
            $fila[5];

           ?>
          <tbody>
            <tr>
              <td><?php echo $fila[0]; ?></td>
              <td><?php echo $fila[1]; ?></td>
              <td><?php echo $fila[2]; ?></td>
              <td><?php echo $fila[3]; ?></td>
              <td><?php echo $fila[4]; ?></td>
              <td><?php echo $fila[5]; ?></td>
              <td><button class="btn-small modal-trigger" data-target="modal1" id="ver-modal" onclick="llenarModal_actualizar('<?php echo $datos ?>');">Modificar</button></td>
            </tr>
          </tbody>
          <?php
          }
           ?>
        </table>
      </div>
      <!-- TABLA EDITAR FIN-->
    </div>
    <!-- TABLA JUGADORES FIN -->

    <!-- TABLA EDITAR DESPLEGABLE-->
    <!--<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>-->

    <div id="modal1" class="modal">
      <div class="modal-content">
        <form id="frm_actualizar" method="post">

          <div class="input-field" style="display: none">
            <input type="text" name="aid" value="" id="aid" placeholder="">
            <label for="aid">ID</label>
          </div>

          <div class="input-field">
            <input type="text" name="anombre" value="" id="anombre" placeholder="">
            <label for="anombre">Nombre</label>
          </div>

          <div class="input-field">
            <input type="text" name="aapellido" value="" id="aapellido" placeholder="">
            <label for="aapellido">Apellido</label>
          </div>

          <div class="input-field">
            <input type="number" min="0" max="200" name="aedad" value="" id="aedad" placeholder="">
            <label for="aedad">Edad</label>
          </div>

          <div class="input-field">
            <select class="" name="asexo" id="asexo">
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
            </select>
            <label for="asexo">Sexo</label>
          </div>

          <div class="input-field">
            <input type="text" name="adeporte" value="" id="adeporte" placeholder="">
            <label for="adeporte">Deporte</label>
          </div>

          <div class="input-field col 16">
            <button type="submit" name="btn_editar" id="btn_editar" class="btn-small blue">Actualizar</button>
            <label for=""></label>
          </div>

          <div class="input-field col 16">
            <button type="submit" name="btn_eliminar" id="btn_eliminar" class="btn-small red">Eliminar</button>
            <label for=""></label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Volver</a>
      </div>
    </div>
    <!-- TABLA EDITAR DESPLEGABLE FIN -->

    <!-- ASIGNAMOS FUNCIONES A LOS BOTONES -->
    <script type="text/javascript">
    $(document).ready(function(){
      $("#btn_sinc").on('click', function(e){
        e.preventDefault();
        sincronizar();
      });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
      $("#btn_eliminar").on('click', function(e){
        e.preventDefault();
        eliminar_datos();
      });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
      $("#btn_editar").on('click', function(e){
        e.preventDefault();
        var nombre = document.getElementById("anombre").value;
        var apellido = document.getElementById("aapellido").value;
        var edad = document.getElementById("aedad").value;
        var deporte = document.getElementById("adeporte").value;

        if(nombre.length < 1 || apellido.length < 1 || edad.length < 1 || deporte.length < 1){
          alert("Rellene todos los campos");
        }
        else{
        actualizar_datos();
        }
      });
    });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $("#btn_guardar").on('click', function(e){
          e.preventDefault();
          var nombre = document.getElementById("nombre").value;
          var apellido = document.getElementById("apellido").value;
          var edad = document.getElementById("edad").value;
          var deporte = document.getElementById("deporte").value;

          if(nombre.length < 1 || apellido.length < 1 || edad.length < 1 || deporte.length < 1){
            alert("Rellene todos los campos");
          }
          else{
            agregar_datos();
          }
        });
      });
    </script>

    <!-- INICIAMOS MATERIALIZE -->
    <script>
      $(document).ready(function(){
        M.AutoInit();
      });
    </script>
  </body>
</html>
