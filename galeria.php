<?php
session_start();
if(isset($_POST['volver'])){
if (!isset($_SESSION['nombre']))
{
header("location: index.php");
}
else
header("location: principal.php");

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Galeria</title>
<style type="text/css">
<!--
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td><img src="Imgreto/Titulo.jpg" width="454" height="190" /></td>
    </tr>
  </table>
  <p class="Estilo1">Seleccionar Categoria   </p>
   <select name="categoria">
   <OPTION VALUE="Paisajes" selected="selected">Paisajes</OPTION> 
   <OPTION VALUE="Carros">Carros</OPTION> 
   <OPTION VALUE="Motos">Motos</OPTION>  
   <OPTION VALUE="Animales">Animales</OPTION> 
   <OPTION VALUE="Comida">Comida</OPTION> 
   <OPTION VALUE="Divertido">Divertido</OPTION> 
   <OPTION VALUE="Personas">Personas</OPTION> 
   <OPTION VALUE="Construcciones">Construcciones</OPTION> 
   <OPTION VALUE="Otros">Otros</OPTION>    
  </select>
   <label>
   <input name="mostrar" type="submit" id="mostrar" value="Mostrar" />
   </label>
   <p>
    <label>
    <input type="submit" name="volver" value="Volver " />
    </label>
  </p>
  <p>
    <?php
$nombre_server[1] = 'localhost'; //Servidor al cual nos vamos a conectar.
	$nombre_user[2] = 'ahincap9'; //Nombre del usuario de la base de datos.
	$password[3] = 'ahincap9'; //Contraseña de la base de datos
	$nombre_db[4] = 'ahincap9_reto1'; //nombre de la base de datos

	$conectar = @mysql_connect($nombre_server[1],$nombre_user[2],$password[3]) or exit('Datos de conexion incorrectos.');
	mysql_select_db($nombre_db[4]) or exit('No existe la base de datos.');
if(isset($_POST['mostrar'])){
$categoria= $_POST['categoria'];
$consulta = "SELECT imagen FROM imagenes Where categoria = '$categoria'";
$resultado= @mysql_query($consulta) or die(mysql_error());
while ($datos = @mysql_fetch_assoc($resultado) ){
  $ruta = "Imgreto/" . $datos['imagen'];

  echo "<img src='$ruta' />";
}
}
?>
  </p>
  <p>&nbsp;  </p>
</form>
</body>
</html>
