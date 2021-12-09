<?php
session_start();
require_once '../db/db.php';
require_once "../tablasUniver/cuerpo.php";
require_once 'dependencias2.php';//parte del codigo html principal
?>


<p class="lead" style="margin-top: 0px" >Emisor de Facturas</p> <hr class="my-1" >
<div  align="left" style="margin-bottom: 5px; margin-top: 0px;">
    <a role="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Agregar Emisor</a>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">

      <div class="modal-header">
          <h4 class="modal-title">Datos del Emisor</h4>
        </div>

        <div class="modal-body">
        <div class="col-sm">
                <div class="form-group">
                <form id="formAlumno" >
                  <input type="hidden" name="opc" id="opc" value="0">
                  <label>Nombre</label>
                  <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre" maxlength="30" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
  >
              </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                                    <label>RFC</label>
                  <input type="text" class="form-control" id="rfc" name="rfc" maxlength="30" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
 placeholder="RFC"  >
              </div>
            </div>


                      <div class="col-sm">
                <div class="form-group">
                  <label>Direccion</label>
                  <input type="text" class="form-control" id="direccion" name="direccion" maxlength="250" placeholder="Direccion"  >
              </div>
            </div>


              <div class="col-sm">
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email" maxlength="10" pattern=""  >
              </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                  <label>Telefono</label>
                  <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" maxlength="10" pattern="^[0-9]+"  >
              </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                  <label>FolioFiscal</label>
                  <input type="text" class="form-control" id="folio" name="folio" placeholder="Folio Fiscal" maxlength="10" pattern=""  >
              </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                  <label>CSD</label>
                  <input type="text" class="form-control" id="movil" name="movil" placeholder="CSD" maxlength="10" pattern=""  >
              </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                  <label>CP</label>
                  <input type="text" class="form-control" id="movil" name="movil" placeholder="Código postal" maxlength="10" pattern="^[0-9]+"  >
              </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                  <label>Régimen</label>
                  <input type="text" class="form-control" id="movil" name="movil" placeholder="Régimen" maxlength="10" pattern=""  >
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
  Confirme si desea eliminar al profesor ?
  <input type="hidden" name="IDx" id="IDx" class="form-control">
</div>
         <span id="xAlumno" data-toggle="collapse"  class="btn btn-danger">Eliminar Alumno</span>
         <a   data-toggle="collapse" href="#xAlumno" class="btn btn-success">Cancelar</a>
  </form>
  </div>
</div>



            <?php
            $table = new tablacuerpo();
             $table->emisor("SELECT * FROM emisor order by Nombre",1);
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
              url:"../controllers/profesor/save.php",
              success:function(data){
                  window.location="../views/profesor.php";
                 }
            }); 

          }
          else {

            $.ajax({
              type:"POST",
              data:datos,
              url:"../controllers/profesor/update.php",
              success:function(data){
                  window.location="../views/profesor.php";
                 }
            }); 
             }
          });


          $(document).on('click','a[data-role=updateAlumno]',function(){

                var id  = $(this).data('id');
                var nombre  = $('#'+id).children('td[data-target=Nombre]').text();
                var apellido  = $('#'+id).children('td[data-target=Apellido]').text();
                var direccion  = $('#'+id).children('td[data-target=Direccion]').text();
                var matricula  = $('#'+id).children('td[data-target=Matricula]').text();
                var movil  = $('#'+id).children('td[data-target=Movil]').text();
                var profesion  = $('#'+id).children('td[data-target=Profesion]').text();
                var opc = 1;

                $('#ID').val(id);
                $('#nombre').val(nombre);
                $('#apellido').val(apellido);
                $('#direccion').val(direccion);                   
                $('#matricula').val(matricula);
                $('#movil').val(movil);
                $('#profesion').val(profesion);
                $('#opc').val(opc);
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
                url:"../controllers/profesor/delete.php",
                success:function(data){
                    window.location="../views/profesor.php";
                  }
              }); 
          });

    });
</script>
