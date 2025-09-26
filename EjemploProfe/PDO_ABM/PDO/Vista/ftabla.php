<?php
include_once "../configuracion.php";
$objAbmTabla = new AbmTabla();

$listaTabla = $objAbmTabla->buscar(null);

?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Ejemplo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>ABM - Tabla</h3>
<a href="ftabla_nuevo.php">nuevo</a>
<table border="1">
<?php	

 if( count($listaTabla)>0){
    foreach ($listaTabla as $objTabla) { 
        
        echo '<tr><td style="width:500px;">'.$objTabla->getDescrip().'</td>';
        echo '<td><a href="ftabla_editar.php?id='.$objTabla->getId().'">editar</a></td>';
        echo '<td><a href="accion/abmTabla.php?accion=borrar&id='.$objTabla->getId().'">borrar</a></td></tr>'; 
	}
}

?>
</table>
</body>
</html>