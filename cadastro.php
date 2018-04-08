<?php 

require 'index.php';



	$nome  		= filter_input(INPUT_POST, 'input_nome');
	$sNome 		= filter_input(INPUT_POST, 'input_sobrenome');
	$email 		= filter_input(INPUT_POST, 'input_email');
	$endereco   = filter_input(INPUT_POST, 'input_endereco');
	$tel1  		= filter_input(INPUT_POST, 'input_telefone1');
	$tel2 		= filter_input(INPUT_POST, 'input_telefone2');

	unset($_POST);

	echo $query = "INSERT INTO crud.`clientes`(`nome`, `sobrenome`, `email`, `endereco`, `telefone`, `telefone2`) VALUES ('$nome', '$sNome', '$email', '$endereco','$tel1', '$tel2')";

	if (
		($nome != '') &&
		($sNome != '' )&&
		($email != '')
	)
	{
		if ($db->insert($query)){
			echo "<p> Registro feito com sucesso ! </p>";


		}	
		else{
			echo "<p> Falha ao cadastrar cliente no banco de dados ! </p>";
		}
	}
	else{
		echo "<p> Preencha todos os campos!</p>";
		}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="">
		<div >
			<span>Nome</span>
			<input name="input_nome" type="text" required="">
		</div>

		<div >
			<span>Sobrenome</span>
			<input name="input_sobrenome"  type="text" required="">
		</div>

		<div >
			<span>Email</span>
			<input name="input_email"  type="text" required="">
		</div>

		<div >
			<span>Endereço</span>
			<input name="input_endereco"  type="text" required="">
		</div>

		<div >
			<span>Telefone 1</span>
			<input name="input_telefone1"  type="text" required="">
		</div>
		
		<div >
			<span>Telefone 2</span>
			<input name="input_telefone2"  type="text" required="">
		</div>

		<input type="submit" value="Cadastrar" name="">

	</form>

	<div>
		
		<table>
			
			<thead>
				
				<?php 

					$clientes = $db->quickQuery("SELECT * FROM crud.clientes");


				 ?>

			</thead>

			<tbody>
				<?php

					foreach ($clientes	 as $key => $cliente) {
						echo "<tr style='border:1px solid black'>";
						foreach ($cliente as $key => $c) {
							echo "<td style='border:1px solid black'>$c</td>";

						}
						echo "</tr>";
					}



				  ?>
			</tbody>

		</table>

	</div>

</body>
</html>