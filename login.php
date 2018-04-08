<?php


if (isset($_SESSION['USER_DATA'])){
	
	 header("index.php");	
}


var_dump($_SESSION);
if( (isset($_POST['input_nome'])) && (isset($_POST['input_password'])) ){


$db =  new DatabaseManager('mysql:host=localhost','root','root');
$loginManager =  new LoginManager($db);
 	
	$login = filter_input( INPUT_POST, 'input_nome');
	$password = filter_input( INPUT_POST, 'input_password');


	echo '<p>' . $loginManager->login($login, $password) . '</p>';

	 header("cadastro.php");

	 exit("<a href='cadastro.php' > Recaregar Página</a>");

	 echo "";
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>


	<form method="POST" action="">
		
		<div>

			<label for="id_nome"><span>Nome:</span></label>
			<input id="id_nome" type="email" name="input_nome" required="">

		</div>
		
		<div>
			
			<label for="id_password"><span>Password:</span></label>
			<input id="id_password" type="password" name="input_password" required="">

		</div>

		<div>
			<input type="submit" value="Logar" name="">

		</div>
	</form>

</body>
</html>

<?php 

exit();
 ?>