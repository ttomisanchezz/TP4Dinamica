<?php
require_once __DIR__ . '/../modelo/persona.php';

class AbmPersona {
    
    // Cargar un objeto Persona con los parámetros del array
    private function cargarObjeto($param){
        $obj = null;
        if( array_key_exists('NroDni', $param) && array_key_exists('Apellido', $param) && array_key_exists('Nombre', $param)){
            $obj = new Persona();
            $obj->setNroDni($param['NroDni']);
            $obj->setApellido($param['Apellido']);
            $obj->setNombre($param['Nombre']);
            $obj->setFechaNac($param['FechaNac']);
            $obj->setTelefono($param['Telefono']);
            $obj->setDomicilio($param['Domicilio']);
        }
        return $obj;
    }

    // Cargar un objeto Persona solo con la clave (NroDni)
    private function cargarObjetoConClave($param){
        $obj = null;
        if (isset($param['NroDni'])) {
            $obj = new Persona();
            $obj->setNroDni($param['NroDni']);
        }
        return $obj;
    }

    // Corroborar que los campos claves están seteados
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['NroDni'])) {
            $resp = true;
        }
        return $resp;
    }

    // Alta (insertar) un objeto Persona en la base de datos
    public function alta($param){
        $resp = false;
        $elObjtPersona = $this->cargarObjeto($param);
        if ($elObjtPersona != null && $elObjtPersona->insertar()) {
            $resp = true;
        }
        return $resp;
    }

    // Baja (eliminar) un objeto Persona de la base de datos
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtPersona = $this->cargarObjetoConClave($param);
            if ($elObjtPersona != null && $elObjtPersona->eliminar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    // Modificación de un objeto Persona en la base de datos
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtPersona = $this->cargarObjeto($param);
            if($elObjtPersona != null && $elObjtPersona->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    


    public function buscar($param = null) {
        $where = "";
    
        if ($param != null) {
            if (isset($param['NroDni'])) {
                $where = " WHERE NroDni = " . $param['NroDni'];
            }
        }
    
        $persona = new persona();
        $arreglo = $persona->listar($where);
        return $arreglo;
    }
    
    
    
   
  /*
       public function buscar($param = null) {
        $where = "";
        if ($param != NULL) {
            if (isset($param['NroDni'])) {
                $where .= " AND NroDni = ".$param['NroDni'];

            }
            if (isset($param['Apellido'])) {
                if ($where != "") {
                    $where .= " AND ";  // Si ya existe una condición previa
                }
                $where .= "Apellido = '" . $param['Apellido'] . "'";
            }
        }
        
        // Crear una instancia de Persona y llamar al método listar
        $persona = new Persona();
        $arreglo = $persona->listar($where);  // Aquí se llama al método listar desde la instancia
        return $arreglo;
    }
*/
 
    
}
?>
