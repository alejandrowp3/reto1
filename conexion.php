<?php
	$nombre_server[1] = 'localhost'; //Servidor al cual nos vamos a conectar.
	$nombre_user[2] = 'root'; //Nombre del usuario de la base de datos.
	$password[3] = ''; //Contraseña de la base de datos
	$nombre_db[4] = 'reto1'; //nombre de la base de datos

	$conectar = @mysql_connect($nombre_server[1],$nombre_user[2],$password[3]) or exit('Datos de conexion incorrectos.');
	mysql_select_db($nombre_db[4]) or exit('No existe la base de datos.');
	
/*En este archivo tambien pondremos unas funciones necesarias para el registro y el login*/	
session_start();

/*Función que se encarga de eliminar codigo malicioso de las variables.*/
function limpiar($var)
{
	$var = trim($var);
	$var = htmlspecialchars($var);
	$var = str_replace(chr(160),'',$var);
	return $var;
}



/*Funcion que se encarga de validar si el usuario esta registrado en el sistema*/
function user_login()
{
	if (!isset($_SESSION['nombre']))
	{
		echo 'No se ha autentificado'.'</b><br /><br />';
		exit  ('<a href="login.php">Volver</a>');
	}
}
?>