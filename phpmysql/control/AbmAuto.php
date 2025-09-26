<?php
include_once(__DIR__ . '/../modelo/auto.php');
class AbmAuto {

//cargar objeto Auto con parametros del array
private function cargarObjeto($param){

    $obj= null;
    if(array_key_exists('Patente',$param) && array_key_exists('Marca',$param)){
        $obj = new auto();
    }

}







} 

