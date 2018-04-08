<?php


class LoginManager{
	private $databaseConection;

public function __construct($db){
  
   $this->databaseConection = $db;
   

}

	public function  createUser($login, $email, $password){

			
		     $query = "SELECT * FROM crud.login WHERE email = '$email' or login = '$login' ";
		     $result = $this->databaseConection->quickQuery($query);
		     

		if (count($result) > 0 ){
//Caso o usuario exista, a função sera abortada, aparecera uma mensagem para usuario.
			return "Usuario,Email ja existem";

		}
     		
			$password = sha1($password);

     		$insertQuery = "INSERT INTO crud.login ( `email`, `login`, `senha`) VALUES ('$email','$login','$password')";
     		
     		return $this->databaseConection->insert($insertQuery);

    }

    	public function Login($email,$password){
         
         $query = "SELECT * FROM crud.login WHERE email = '$email' AND senha = '$password' limit 1";
         $result = $this->databaseConection->quickQuery($query);
               
             if(count($result) > 0) {

             	session_destroy();
             	session_start();


             	$result = $result[0];



             	$_SESSION['USER_DATA']['nome'] = $result['login'];
             	$_SESSION['USER_DATA']['email'] = $result['email'];
             	$_SESSION['USER_DATA']['id'] = $result['id'];

             	return 'Login feito com sucesso!';

             } 
             else{
             	return 'Usuário ou senha não existem';
             }

                                       

    	}


    	public static function requireLogin(){
    		if ( !( isset($_SESSION['USER_DATA']) )){
    			require 'login.php';

    			exit();

    		}

    	}
	}