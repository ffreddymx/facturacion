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
          <a class="nav-link" href="#">Cotizar</a>
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