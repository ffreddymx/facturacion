<?php

require_once '../../db/db.php';
require_once("../../models/receptor_model.php"); //aqui estan todas las clases

$per=new Receptor_model();
$datos=array($_POST['nombre'],$_POST['rfc'],$_POST['direccion'],$_POST['telefono'],$_POST['email']);
$per->saveReceptor($datos);
return 1;

//Nombre,Apellido,Direccion,Movil,Profesion

?>
