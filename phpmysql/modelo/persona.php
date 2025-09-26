<?php
require_once __DIR__ . '/conector/BaseDatos.php';

class persona {

    private $nroDni;
    private $apellido;
    private $nombre;
    private $fechaNac;
    private $telefono;
    private $domicilio;
    private $msjOperacion; 

    public function __construct(){
        $this->nroDni    = "";
        $this->apellido  = "";
        $this->nombre    = "";
        $this->fechaNac  = "";
        $this->telefono  = "";
        $this->domicilio = "";
        $this->msjOperacion = "";
    }

    public function getMsjOperacion(){ 
        return $this->msjOperacion; }
    public function setMsjOperacion($msjOperacion) {
        $this->msjOperacion = $msjOperacion;
    }

    public function getNroDni(){ 
        return $this->nroDni; 
    }
    public function setNroDni($nroDni) {
        $this->nroDni = $nroDni;
    }

    public function getApellido(){ 
        return $this->apellido; 
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getNombre(){ 
        return $this->nombre; 
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getFechaNac(){ 
        return $this->fechaNac; 
    }
    public function setFechaNac($fechaNac) {
        $this->fechaNac = $fechaNac;
    }

    public function getTelefono(){ 
        return $this->telefono; 
    }
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getDomicilio(){ 
        return $this->domicilio; 
    }
    public function setDomicilio($domicilio) {
        $this->domicilio = $domicilio;
    }

    
    public function __toString(){      
        return 
        "Dni:". $this->getNroDni() . "\n" .
        "Apellido:" .$this->getApellido(). "\n". 
        "Nombre: " .$this->getNombre(). "\n".
        "Fecha Nacimiento: ". $this->getFechaNac(). "\n" .
        "Telefono: ". $this->getTelefono(). "\n" .
        "Domicilio: ".$this->getDomicilio();     
    }


    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $dni = intval($this->getNroDni());
        $sql = "SELECT * FROM persona WHERE NroDni = ". $this->getNroDni();
        if($base->Iniciar()){
            $res = $base->Ejecutar($sql);
            if($res>0){
                $row = $base->Registro();
                $this->setNroDni($row['NroDni']);
                $this->setApellido($row['Apellido']);
                $this->setNombre($row['Nombre']);
                $this->setFechaNac($row['fechaNac']);
                $this->setTelefono($row['Telefono']);
                $this->setDomicilio($row['Domicilio']);
                $resp = true;
            }
        }else{
            $this->setMsjOperacion("Persona->cargar" . $base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        
        $dni = intval($this->getNroDni());
        
        $sql = "INSERT INTO persona (NroDni, Apellido, Nombre, FechaNac, Telefono, Domicilio) VALUES (
        '" . $this->getNroDni() . "', 
        '" . $this->getApellido() . "', 
        '" . $this->getNombre() . "', 
        '" . $this->getFechaNac() . "', 
        '" . $this->getTelefono() . "', 
        '" . $this->getDomicilio() . "')";
    
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMsjOperacion("Persona->insertar: " . $base->getError());
            }
        } else {
            $this->setMsjOperacion("Persona->insertar: " . $base->getError());
        }
    
        return $resp;
    }
    

    public function modificar() {
        $resp = false;
        $base = new BaseDatos();
    
        $dni = intval($this->getNroDni());
        
        $sql = "UPDATE persona SET 
            Apellido = '" . $this->getApellido() . "',
            Nombre = '" . $this->getNombre() . "',
            FechaNac = '" . $this->getFechaNac() . "',
            Telefono = '" . $this->getTelefono() . "',
            Domicilio = '" . $this->getDomicilio() . "'
            WHERE NroDni = '" . $this->getNroDni() . "'";
    
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMsjOperacion("Persona->modificar: " . $base->getError());
            }
        } else {
            $this->setMsjOperacion("Persona->modificar: " . $base->getError());
        }
    
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();

        $dni = intval($this->getNroDni());
        $sqlPersona = "DELETE FROM persona WHERE NroDni = {$dni}";

        if ($base->Iniciar()) {
            $res1 = $base->Ejecutar($sqlPersona);
            if ($res1 > -1) {
                // Si no usás FK ON DELETE CASCADE, borramos autos asociados:
                $sqlAuto = "DELETE FROM auto WHERE DniDuenio = {$dni}";
                $res2 = $base->Ejecutar($sqlAuto);
                if ($res2 > -1) {
                    $resp = true;
                } else {
                    $this->setMsjOperacion("Persona->eliminar (autos): " . $base->getError());
                }
            } else {
                $this->setMsjOperacion("Persona->eliminar (persona): " . $base->getError());
            }
        } else {
            $this->setMsjOperacion("Persona->eliminar (conexion): " . $base->getError());
        }
        return $resp;
    }

    public function listar($parametro = ""){
        $array = [];
        $base = new BaseDatos();

        $sql = "SELECT * FROM persona";
        if ($parametro != "") {
            // Ej: $parametro = "WHERE Apellido='Perez' ORDER BY Apellido"
            $sql .= " " . $parametro;
        }

        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                while ($row = $base->Registro()) {
                    $obj = new persona();
                    $obj->setNroDni($row['NroDni']);
                    $obj->setApellido($row['Apellido']);
                    $obj->setNombre($row['Nombre']);
                    $obj->setFechaNac($row['FechaNac']);
                    $obj->setTelefono($row['Telefono']);
                    $obj->setDomicilio($row['Domicilio']);
                    $array[] = $obj;
                }
            } else {
                $this->setMsjOperacion("Persona->listar: " . $base->getError());
            }
        } else {
            $this->setMsjOperacion("Persona->listar (conexion): " . $base->getError());
        }
        return $array;
    }
}