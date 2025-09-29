
<?php
include_once(__DIR__ . '/../../control/AbmAuto.php');


if (isset($_POST['Patente']) && !empty($_POST['Patente'])) {

    $patente = strtoupper(trim($_POST['Patente']));
    $auto = new AbmAuto();

    $autoPatente = array('Patente'=>$patente);
    $autos = $auto->buscar($patente);

    if(count($autos)>0){
        echo "<table border='1' cellpadding='5' cellspacing='0'>
            <tr>
                <th>Patente</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Dueño</th>
            </tr>"; 

        foreach($autos as $recorrerr){
            echo "
                <tr>
                <td>{$recorrerr->getPatente()}</td>
                <td>{$recorrerr->getMarca()}</td>
                <td>{$recorrerr->getModelo()}</td>
                </tr>
            ";
        }
    }
    echo "</table>";
}else{
    echo "Patente no encontrada";
}
echo '<p><a href="../menu.php">Volver al Menú Principal</a></p>';