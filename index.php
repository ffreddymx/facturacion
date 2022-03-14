<?php
session_start();
require_once 'db/db.php';
require_once 'models/tipo_model.php';

$tipo=new tipo_model();
$tipo = $tipo->get_tipo();

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Facturación</title>


  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>

<style>
  body {
  background-image: url(statics/xx.jpg);
  background-color:#000;
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  }

  .container {
  height: 100px;
}
</style>

<body >
	
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">

      <div class="modal-header">
          <h4 class="modal-title">Solicite su cotización</h4>
        </div>

        <div class="modal-body">
        <div class="col-sm">
                <div class="form-group">
                <form id="formAlumno" >
                  <input type="hidden" name="opc" id="opc" value="0">
                  <input type="hidden" name="ID" id="ID" >

                  <label>Nombre</label>
                  <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Nombre completo" maxlength="30" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
  >
              </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
          <label>Teléfono de oficina</label>
                  <input type="text" class="form-control" id="telefono" name="telefono" maxlength="10" pattern=""
 placeholder="Teléfono de oficina"  >
              </div>
            </div>


            <div class="col-sm">
                <div class="form-group">
          <label>Teléfono movil</label>
                  <input type="text" class="form-control" id="movil" name="movil" maxlength="10" pattern=""
 placeholder="Teléfono movil"  >
              </div>
            </div>


                      <div class="col-sm">
                <div class="form-group">
                  <label>Correo electrónico</label>
                  <input type="text" class="form-control" id="email" name="email" maxlength="250" 
 placeholder="Correo electrónico"  >
              </div>
            </div>


            <div class="col-sm">
                <div class="form-group">
                  <label>Municipio</label>
                  <input class="form-control" id="municipio" name="municipio"  placeholder="Municipio..." rows="3">
              </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                  <label>Colonia</label>
                  <input class="form-control" id="colonia" name="colonia"  placeholder="Colonia..." rows="3">
              </div>
            </div>

            
            <div class="col-sm">
                <div class="form-group">
                  <label>Calle</label>
                  <textarea class="form-control" id="calle" name="calle"  placeholder="Calle..." rows="2"></textarea>
              </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                  <label>Número</label>
                  <input class="form-control" id="numero" name="numero"  placeholder="Número..." rows="3">
              </div>
            </div>




            <div class="col-sm">
                <div class="form-group">
                  <label>C.P</label>
                  <input class="form-control" id="cp" name="cp"  placeholder="Código Postal..." rows="3">
              </div>
            </div>


            <div class="col-sm">
                <div class="form-group">
                  <label>Servicio</label>
                  <div class="mb-3">
                    <select class="form-select" name="servicio" id="servicio">
                        <option selected disabled>Seleccione el servicio</option>
                        <?php
                        foreach($tipo as $tipos){ 
                        echo "<option value='".$tipos['Nombre']."'>".$tipos['Nombre']."</option>";
                        }
                        ?>
                    </select>
                </div>              </div>
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




<section  style="margin_top: 2px; " >
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">INOFIS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index2.php">Iniciar Sesión</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal"  data-target="#myModal">Cotizar</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container "  style="margin_top: 0px; ">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
    <li data-target="#myCarousel" data-slide-to="6"></li>
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active" align="center">
      <img src="statics/1.jpg" alt="" >
    </div>

    <div class="item" align="center">
      <img src="statics/2.jpg" alt="" >
    </div>

    <div class="item" align="center">
      <img src="statics/3.jpg" alt="" >
    </div>

    <div class="item" align="center">
      <img src="statics/4.jpg" alt="" >
    </div>
    <div class="item" align="center">
      <img src="statics/5.jpg" alt="" >
    </div>    
    <div class="item" align="center">
      <img src="statics/6.jpg" alt="" >
    </div>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

</section>
</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){

    $('#saveAlumno').click(function(){
          datos=$('#formAlumno').serialize();
    
            $.ajax({
              type:"POST",
              data:datos,
              url:"controllers/cotizar/save.php",
              success:function(data){
                  window.location="index.php";
                 }
            }); 

        
          });

$('#entrarSistema').click(function(){

	datos=$('#frmLoginx').serialize();

		$.ajax({
			type:"POST",
			data:datos,
			url:"controllers/login.php",
			success:function(r){

				if(r==1){
					window.location="views/inicio.php";
         
				}else{
					alert("No se pudo acceder verifique sus datos de acceso :(");
				}
			    }
		    });
	   });




	});


</script>