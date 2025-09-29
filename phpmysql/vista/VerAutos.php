
<?php

include_once(__DIR__ . '/../control/AbmPersona.php');
include_once(__DIR__ . '/../control/AbmAuto.php');

$autos = new AbmAuto();
$persona = new AbmPersona();

$buscar = $autos->buscar();

if(count($buscar) > 0){
    echo "<table border='1' cellpadding='5' cellspacing='0'>
            <tr>
                <th>Patente</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Dueño</th>
            </tr>"; 

foreach($buscar as $auto){
    $dniDuenio = array("NroDni" => $auto->getDniDuenio());
    $duenios = $persona->buscar($dniDuenio);

    if(count($duenios) > 0 ){

        $dueño = $duenios[0];
        $nombre= $dueño->getNombre(). "" . $dueño->getApellido();
    }else{
        $nombre = "Dueño no encontrado";
    }

    echo "
        <tr>
        <td>{$auto->getPatente()}</td>
        <td>{$auto->getMarca()}</td>
        <td>{$auto->getModelo()}</td>
        <td>{$nombre}</td>
        </tr>
       ";
}

    echo "</table>";
}else{
    echo "No hay autos cargados";
}
echo '<p><a href="menu.php">Volver al Menú Principal</a></p>';
