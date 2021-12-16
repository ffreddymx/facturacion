<?php
session_start();
require_once '../db/db.php';
require_once "../tablasUniver/cuerpo.php";
require_once 'dependencias2.php';//parte del codigo html principal
?>


<p class="lead" style="margin-top: 0px" >Lista de Usuarios</p> <hr class="my-1" >
<div  align="left" style="margin-bottom: 5px; margin-top: 0px;">
    <a role="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Nuevo usuario</a>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">

      <div class="modal-header">
          <h4 class="modal-title">Datos del Usuario</h4>
        </div>

        <div class="modal-body">
        <div class="col-sm">
                <div class="form-group">
                <form id="formAlumno" >
                  <input type="hidden" name="opc" id="opc" value="0">
                  <input type="hidden" name="ID" id="ID" >

                  <label>Usuario</label>
                  <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" maxlength="30" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
  >
              </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                                    <label>Password</label>
                  <input type="text" class="form-control" id="password" name="password" maxlength="30" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
 placeholder="Password"  >
              </div>
            </div>


                      <div class="col-sm">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" maxlength="250" 
 placeholder="Nombre Completo"  >
              </div>
            </div>


              <div class="col-sm">
                <div class="form-group">
                  <label>Tipo</label>

<select name="tipo" id="tipo">
<option value="Admin">Admin</option>
<option value="Usuario">Usuario</option>
</select>

              </div>
            </div>

        </div>


        <div class="modal-footer">
        <span  class="btn btn-info" data-toggle="collapse" href="#collapseExample" id="saveAlumno">Guardar</span>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
      </form>

    </div>
  </div>

  <div class="collapse" id="xAlumno" style="margin-bottom: 10px; margin-top: 10px;">
  <div class="card card-body ">
  <form id="formXAlumno" >
<div class="alert alert-danger" role="alert">
  Confirme si desea eliminar al Usuario ?
  <input type="hidden" name="IDx" id="IDx" class="form-control">
</div>
         <span id="xAlumno" data-toggle="collapse"  class="btn btn-danger">Eliminar Usuario</span>
         <a   data-toggle="collapse" href="#xAlumno" class="btn btn-success">Cancelar</a>
  </form>
  </div>
</div>



            <?php
            $table = new tablacuerpo();
             $table->usuario("SELECT * FROM usuario order by Nombre",1);
             ?>



 <?php include 'footer.php'; ?>




      <script>
      $(document).ready(function(){

      
       $('#saveAlumno').click(function(){
          datos=$('#formAlumno').serialize();
         var opc  = document.getElementById("opc").value;
         if(opc == 0) { 

            $.ajax({
              type:"POST",
              data:datos,
              url:"../controllers/usuario/save.php",
              success:function(data){
                  window.location="../views/usuario.php";
                 }
            }); 

          }
          else {

            $.ajax({
              type:"POST",
              data:datos,
              url:"../controllers/usuario/update.php",
              success:function(data){
                  window.location="../views/usuario.php";
                 }
            }); 
             }
          });


          $(document).on('click','a[data-role=updateAlumno]',function(){

                var id  = $(this).data('id');
                var usuario  = $('#'+id).children('td[data-target=usuario]').text();
                var password  = $('#'+id).children('td[data-target=password]').text();
                var nombre  = $('#'+id).children('td[data-target=Nombre]').text();
                var tipo  = $('#'+id).children('td[data-target=Tipo]').text();
                var opc = 1;

                $('#ID').val(id);
                $('#usuario').val(usuario);
                $('#password').val(password);
                $('#nombre').val(nombre);                   
                $('#opc').val(opc);

                $('#tipo > option[value="'+tipo+'"]').attr('selected', 'selected');

          });


          $(document).on('click','a[data-role=xAlumno]',function(){
                var id  = $(this).data('id');
                $('#IDx').val(id);

          });


          $('#xAlumno').click(function(){
            datos=$('#formXAlumno').serialize();
              $.ajax({
                type:"POST",
                data:datos,
                url:"../controllers/usuario/delete.php",
                success:function(data){
                    window.location="../views/usuario.php";
                  }
              }); 
          });

    });
</script>
