<?php
//conexion a la base de datos
include("conexion.php");
user_login();
if(isset($_POST['galeria']))
{
header("location: galeria.php");
} 
if(isset($_POST['subir']))
{
$categoria= $_POST['categoria'];
//comprobamos si ha ocurrido un error.
if ($_FILES["imagen"]["error"] > 0){
  echo "ha ocurrido un error";
} else {
  //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
  $limite_kb = 10000;
  
  if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 10024){
    
    $ruta = "Imgreto/" . $_FILES['imagen']['name'];
 
    if (!file_exists($ruta)){
   
      $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
      if ($resultado){
        $nombre = $_FILES['imagen']['name'];
        @mysql_query("INSERT INTO imagenes (imagen,categoria) values ('$nombre','$categoria')") ;
        echo "el archivo ha sido movido exitosamente";
      } else {
        echo "ocurrio un error al mover el archivo.";
      }
    } else {
      echo $_FILES['imagen']['name'] . ", este archivo existe";
    }
  } else {
    echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
  }
}
}
?>
<style type="text/css">
<!--
.Estilo1 {
	font-size: 18px;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>

<form action="principal.php" method="POST" enctype="multipart/form-data">
  <label></label>
  <label></label><label for="imagen"><br>
  </label>
  
    <div align="right"><a href="login.php?modo=desconectar" class="Estilo1" rel="ddsubmenuside2">Desconectarse</a></div>
  
  <table width="200" border="1" align="center">
    <tr>
      <td><img src="Imgreto/Titulo.jpg" width="454" height="190"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p class="Estilo1">Descargar imagenes 
    <label>
    <input name="galeria" type="submit" id="galeria" value="Ir a galeria">
    </label>
  </p>
  <label for="imagen"><br>
  <br>
  <span class="Estilo1">Cargar Imagen</span>:</label>
  <p>
    <input type="file" name="imagen" id="imagen" />
  </p>
  <p class="Estilo1">Escoja una categoria a la que pertenece</p>
  <p class="Estilo1">
    <label>
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
    </label>
  </p>
  <p>&nbsp; </p>
  <p>
    <input type="submit" name="subir" value="Subir"/>
    </p>
</form>