<?php
include("conexion.php");
if(isset($_POST['volver']))
{


header("location: index.php");
	//echo 'Bienvenido <b>' . $_SESSION['nombre'] . '</b><br /><br />';	
}
if(isset($_POST['login']))
{
	$nick= $_POST['nick'];
	//$pass= md5(md5($_POST['pass']));
	$pass= $_POST['pass'];
	//$b_user=mysql_query("SELECT * FROM `usuarios` WHERE `cedula`= '$nick'");
	$b_user=mysql_query("SELECT * FROM login WHERE user='$nick'");			
	$ses = @mysql_fetch_assoc($b_user) ;
	
	if(@mysql_num_rows($b_user))
	{
	$pas=$ses['pass'] ;
	
		if($ses['pass'] == $pass)
		{		
			$_SESSION['nombre']=	$ses["user"];
						
		}
		else
		{
			echo 'Nombre de usuario o Contrase&ntilde;a incorrecta.';
		}
	}
	else
	{
		echo 'Nombre de Usuario o contrase&ntilde;a incorrecta.';
	}
}
	
if(isset($_GET['modo']) == 'desconectar')
{
	session_destroy();
	echo '<meta http-equiv="Refresh" content="2;url=login.php"> ';
	exit ('Te has desconectado del sistema.');
}
	
if(isset($_SESSION['nombre']))
{


header("location: principal.php");


	//echo 'Bienvenido <b>' . $_SESSION['nombre'] . '</b><br /><br />';

	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login</title>
<style type="text/css">
<!--
.Estilo1 {	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <table width="200" border="1" align="center">
    <tr>
      <td><img src="Imgreto/Titulo.jpg" width="454" height="190" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <dl>
    <dt>
      <div align="center"><span class="Estilo1">Usuario:</span></div>
      </label>
    </dt>
  </dl>
  <div align="center"><span class="Estilo1">
    <input type='text' name='nick' />
    <br />
    <br />
  </span> </div>
  <dl>
    <dt class="Estilo1">
      <label>
      <div align="center">Contrase&ntilde;a:</div>
      </label>
    </dt>
  </dl>
  <div align="center">
    <input type="password" name='pass' />
    <br />
    <br />
    <input type="submit" name="login" style="width:100px;" tabindex="6" value="Entrar" />
    <input type="submit" name="volver" style="width:100px;" tabindex="6" value="Volver inicio" />
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
