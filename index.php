<?php



session_start();





//

spl_autoload_register('loadClass');

function loadClass($className){
	require './classes/' . $className . '.php';

}


$db =  new DatabaseManager('mysql:host=localhost','root','root');

//var_dump( $db);
$loginManager =  new LoginManager($db);




LoginManager::requireLogin();

