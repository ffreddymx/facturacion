<?php

class Cotizar_model{
    private $db;
    private $usuario;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuario=array();
    }
    
    public function get_cotizar(){
        $consulta=$this->db->query("SELECT * from cotizar");
        while($filas=$consulta->fetch()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }
  
    public function saveCotizar($datos){

        $this->db->exec("INSERT INTO cotizar(cliente,telefono,email,fecha,servicio,direccion) values('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]')");
    
    }


    public function updateCotizar($datos){

        $this->db->exec("UPDATE cotizar set cliente='$datos[0]',servicio='$datos[1]',costo='$datos[2]' where id = '$datos[3]'  ");
        
    }



    public function xServicio($datos){

        $this->db->exec("DELETE FROM servicios where id = '$datos[0]'  ");
            
    }

}

?>