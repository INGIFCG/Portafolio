<?php 

class conect{

    private $servername="localhost"; //datos necesarios par la conexion a la base de datos 
    private $user="root";
    private $password="";
    private $conexion;

    public function __construct(){
        
        try{  // permite la conexion a la bases de datos
            $this->conexion= new PDO("mysql:host=$this->servername;dbname=portafolio",$this->user,$this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }catch (PDOException $e){
            return "Falla econexion".$e;
        } 
    }
    
    public function ejecutar($sql){

        $this->conexion->exec($sql);//esta clse permite insertar datos en /delete/ update depende de la forma en que se implemente
        return $this->conexion->lastInsertId();
    }

    public function view($sql){
        
        $sentencia=$this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }
}
