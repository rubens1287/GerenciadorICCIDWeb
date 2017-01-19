<?php

Class PDOConexao{
	
	function ConectaBD(){
		$host="*";
		$user="*";
		$pass="*";
		$dbname="*";
				
		try{
			 $pdo=new PDO('mysql:host='.$host.';dbname='.$dbname,$user,$pass);
			 return $pdo;
		}catch(PDOException $e){
			$erroMsg = $e->getMessage();
			$_SESSION['loginErro'] = "Problema de conexão com o servidor, contate o administrador";
			echo "<script>location.href='../login.php';</script>"; 			
		}
	}
	
	function Disconecta($conn){
		
		$this -> $conn = NULL;
	}
}
?>

