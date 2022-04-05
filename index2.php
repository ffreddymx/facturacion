<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Facturación</title>


  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
<link href="statics/menu.css" rel="stylesheet" id="bootstrap-css">


    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
</head>

<style>
  body {
  background-image: url(statics/4.jpg);
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  }
</style>

<body >
	
<section  style="margin_top: 20px; " >


<div class="form-bg" style="margin-top: 100px; margin-left:500px; " >
    <div class="container" >
        <div class="row">

            <div class="  col-sm-offset-1 col-sm-6">
                <div class="form-container" >
		          <h3 class="title"><i class="far fa-caret-square-right"></i>INOFIS</h3>
                    <form class="form-horizontal" id="frmLoginx">
                        <div class="form-group">
                            <label for="">Usuario</label>
                            <input type="email" id="user" name="user" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input type="password" id="pass" name="pass"  class="form-control" />
                        </div>
                        <div class="form-group">
                        </div>
                          <span class="btn signup"  id="entrarSistema">Iniciar Sesión</span>
                </div>
            </div>
        </div>
    </div>
</div>
</form>


</section>

</body>


</html>


<script type="text/javascript">
	$(document).ready(function(){


		$('#entrarSistema').click(function(){
/*		vacios=validarFormVacio('frmLogin');

			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}
*/
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