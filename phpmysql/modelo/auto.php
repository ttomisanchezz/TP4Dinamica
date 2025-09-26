<?php

require_once __DIR__ . '/conector/BaseDatos.php';
class auto{

    private $patente;
    private $marca;
    private $modelo;
    private $dniDuenio;
    private $msjOperacion;

    public function __construct(){

        $this->patente = "";
        $this->marca = "";
        $this->modelo = "";
        $this->dniDuenio = "";
        $this->msjOperacion = "";
    }

    public function getMsjOperacion(){
        return $this->msjOperacion;
    }
    public function setMsjOperacion($msjOperacion){
        $this->msjOperacion = $msjOperacion;
    }
    public function getPatente(){
        return $this->patente;
    }
    public function setPatente($patente){
        $this->$patente = $patente;
    }
    public function getMarca(){
        return $this->marca;
    }
    public function setMarca($marca){
        $this->$marca = $marca;
    }
        public function getModelo() {
        return $this->modelo;
    }
    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }
    public function getDniDuenio() {
        return $this->dniDuenio;
    }
    public function setDniDuenio($dniDuenio) {
        $this->dniDuenio = $dniDuenio;
    }

    public function __toString(){
        return "Patente: " .$this->getPatente(). "\n". 
                "Marca: ".$this->getMarca()."\n". 
                "Modelo: ".$this->getModelo()."\n". 
                "Dni Duenio: ".$this->getDniDuenio();
    }

    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto WHERE Patente = " . $this->getPatente() . "";
        if($base->Iniciar() ){
            $res = $base->Ejecutar($sql);
            if($res > 0){
                $row = $base->Registro();
                $this->setPatente($row['Patente']);
                $this->setMarca($row['Marca']);
                $this->setModelo($row['Modelo']);
                $this->setDniDuenio($row['DniDuenio']);
                $res=true;
            }else{
                $this->setMsjOperacion("Auto->cargar: ".$base->getError());
            }
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO auto (Patente, Marca, Modelo, DniDuenio) VALUES (
        '". $this->getPatente(). "',
        '". $this->getMarca(). "',
        '". $this->getModelo(). "',
        '". $this->getDniDuenio(). "')";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
            $resp=true;
            }else{
            $this->setMsjOperacion("Auto->insertar: " .$base->getError());
            }
        }else{
            $this->setMsjOperacion("Auto->insertar: ".$base->getError());
        }
       return $resp;
    }

    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE auto SET
        Patente = '". $this->getPatente() . "',
        Marca = '". $this->getMarca() . "',
        Modelo = '". $this->getModelo() . "',
        DniDuenio = '". $this->getDniDuenio() . "'
        WHERE DniDuenio = '" . $this->getDniDuenio() . "'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp=true;
            }else{
                $this->setMsjOperacion("Auto->Modificar: ". $base->getError());
            }
        }else{
            $this->setMsjOperacion("Auto->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM auto WHERE DniDuenio= '".$this->getDniDuenio() . "'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp = true;
            }else{
                $this->setMsjOperacion("Auto->eliminar: " . $base->getError());
            }
        }else{
            $this->setMsjOperacion("Auto->eliminar: ". $base->getError());
        }
        return $resp;
    }

   public function listar($parametro = ""){
        $array = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto"; 
    
        
        if ($parametro != "") {
            $sql .= " " . $parametro; 
        }
    
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Auto();
                    $obj->setPatente($row['Patente']);
                    $obj->setMarca($row['Marca']);
                    $obj->setModelo($row['Modelo']);
                    $obj->setDniDuenio($row['DniDuenio']);
                    array_push($array, $obj);
                }
            }
        } else {
            $this->setMsjOperacion("Auto->listar: " . $base->getError());
        }
    
        return $array;
    }



}