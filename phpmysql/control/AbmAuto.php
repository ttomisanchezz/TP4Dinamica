<?php
include_once(__DIR__ . '/../modelo/auto.php');
class AbmAuto {

//cargar objeto Auto con parametros del array
private function cargarObjeto($param){

    $obj= null;
    if(array_key_exists('Patente',$param) && array_key_exists('Marca',$param)){
        $obj = new auto();
        $obj->setPatente($param['Patente']);
        $obj->setMarca($param['Marca']);
        $obj->setModelo($param['Modelo']);
        $obj->setDniDuenio($param['DniDuenio']);
    }
    return $obj;
}

//Cargar un objeto Auto solo con clave (Patente)
private function cargarObjetoConClave($param){
    $obj = null;
    if (isset($param['Patente'])){
        $obj = new Auto();
        $obj->setPatente($param['Patente']);
    }
    return $obj;
}

//corrobora que los campos claves essten seteados
private function seteadosCamposClaves($param){
    $resp = false;
    if(isset($param['Patente'])){
        $resp = true;
    }
    return $resp;
}

//Alta (insertar) un objeto Auto en la base de datos
public function alta($param){
    $resp=false;
    $elObjAuto = $this->cargarObjeto($param);
    if($elObjAuto != null && $elObjAuto->insertar()){
        $resp= true;
    }
    return $resp;
}

//Baja (eliminar) un objeto Auto de la base de datos
public function baja($param){
    $resp = false;
    if($this->seteadosCamposClaves($param)){
        $elObjAuto = $this->cargarObjetoConClave($param);
        if($elObjAuto != null && $elObjAuto->eliminar()){
            $resp = true;
        }
    }
    return $resp;
}

//modificacion de un objeto Auto en la base de datos
public function modificacion($param){
    $resp= false;
    if($this->seteadosCamposClaves($param)){
        $elObjAuto = $this->cargarObjeto($param);
        if($elObjAuto != null && $elObjAuto->modificar()){
            $resp=true;
        }
    }
    return $resp;
}
    public function buscar($param = null) {
        $where = "";
        
        if ($param != null) {
            if (isset($param['Patente'])) {
                $where = " WHERE Patente = '" . $param['Patente'] . "'";
            }
            if (isset($param['DniDuenio'])) {
                $where = " WHERE DniDuenio = '" . $param['DniDuenio'] . "'";
            }
        }
        
        $auto = new Auto();
        $arreglo = $auto->listar($where);
        return $arreglo;
    }


} 

