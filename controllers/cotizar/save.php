<?php

require_once '../../db/db.php';
require_once("../../models/cotizar_model.php"); //aqui estan todas las clases

$per=new Cotizar_model();

$datos=array($_POST['cliente'],$_POST['telefono'],$_POST['email'],$_POST['fecha'],$_POST['servicio'],$_POST['direccion']);
$per->saveCotizar($datos);
return 1;

//cliente 	telefono 	email 	fecha 	servicio 	direccion 		
?>
