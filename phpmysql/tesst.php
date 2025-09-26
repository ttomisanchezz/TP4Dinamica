<?php
require_once __DIR__.'/configuracion.php';
require_once __DIR__.'/modelo/conector/BaseDatos.php';

$db = new BaseDatos();
$sql = "SELECT a.Patente, a.Marca, a.Modelo, p.Apellido, p.Nombre
        FROM auto a
        JOIN persona p ON p.NroDni = a.DniDuenio
        ORDER BY a.Patente";
$rows = $db->query($sql)->fetchAll();

echo "<pre>";
print_r($rows);
