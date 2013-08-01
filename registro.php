<?php
include("conexion.php");

if(isset($_POST['registro']))//Vallidamos que el formulario fue enviado
{
	/*Validamos que todos los campos esten llenos correctamente*/
	if(($_POST['nombre'] != '') &&  ($_POST['pass'] != '')&& ($_POST['conf_pass'] != ''))
	{
		if($_POST['pass'] != $_POST['conf_pass'])
		{
			echo '<br />Las contrase&ntilde;as no coinciden';
		}
		else
		{ 
			
			$pass= limpiar($_POST['pass']);
			$nombre= limpiar($_POST['nombre']);
			
			
			$b_user= mysql_query("SELECT user FROM login WHERE user='$nombre'");
			if($user=@mysql_fetch_array($b_user))
			{
				echo '<br />El usuario ya esta registrado.';
				mysql_free_result($b_user); //liberamos la memoria del query a la db
			}
			else
			{
					mysql_query("INSERT INTO login (user,pass) values ('$nombre','$pass')");
					echo '<br /> registrado Correctamente, ahora podras iniciar sesi&oacute;n como usuario registrado.';
			}
		}
	}
	else
	{
		echo '<br />Deberas llenar todos los campos.';
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Registro</title>
<style type="text/css">
<!--
.Estilo2 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <div align="center">
    <table width="800" border="1">
      <tr>
        <td colspan="2"><div align="center"><img src="Imgreto/Titulo.jpg" width="400" height="128" /></div></td>
      </tr>
      <tr>
        <td width="370"><div align="right" class="Estilo2">Usuario</div></td>
        <td width="414"><input type='text' name='nombre' /></td>
      </tr>

      <tr>
        <td><div align="right" class="Estilo2">Contrase&ntilde;a</div></td>
        <td><input type="password" name='pass' /></td>
      </tr>
      <tr>
        <td><div align="right" class="Estilo2">Confirmacion Contrase&ntilde;a </div></td>
        <td><input type="password" name='conf_pass' /></td>
      </tr>
      </table>
  </div>
  <p align="center">	
    <input type="submit" name="registro" style="width:100px;" tabindex="6" value="Registrar" />
    <input type="reset" name="Limpiar" style="width:100px;" tabindex="6" value="Limpiar" />
    <a href="login.php">Identificarse</a>
    </p>
    </form>
</form>
</body>
</html>
