<?php
include_once '../configuracion.php';
$objAbmTabla = new AbmTabla();
$datos = data_submitted();
$obj =NULL;
if (isset($datos['id'])){
    $listaTabla = $objAbmTabla->buscar($datos);
    if (count($listaTabla)==1){
        $obj= $listaTabla[0];
    }
}

?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Ejemplo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Tabla</h3>
<?php if ($obj!=null){?>
<form method="post" action="accion/abmTabla.php">
	<label>ID</label><br/>
	<input id="id:" readonly name ="id" width="80" type="text" value="<?php echo $obj->getId()?>"><br/>
	<label>Descripcion</label><br/>
	<textarea  id="descript" name="descript"><?php echo $obj->getDescrip()?></textarea><br/>
	<input id="accion" name ="accion" value="editar" type="hidden">
	<input type="submit">
</form>
<?php }else {
    
    echo "<p>No se encontro la clave que desea modificar";
}?>
<br><br>
<a href="ftabla.php">Volver</a>
</body>
</html>