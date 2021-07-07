<?php
require_once 'messages.php';

// $host = 'localhost';
// $dbname = 'dbrivfarca';
// $username = 'jess';
// $password = 'rivfarca123';
define( 'BASE_PATH', 'https://rivfarca.com/');//Ruta base donde se encuentra
define( 'DB_HOST', 'https://localhost/rivfarca' );//Servidor de la base de datos
define( 'DB_USERNAME', 'jess');//Usuario de la base de datos
define( 'DB_PASSWORD', 'Marta22916248*');//Contraseña de la base de datos
define( 'DB_NAME', 'dbrivfarca');//Nombre de la base de datos

$con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

function pl_autoload_register($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}
