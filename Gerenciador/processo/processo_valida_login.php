<?php
	session_start();
	include_once("../conexao.php");
	
	$usuario = $_POST['login_usuario'];
	$senha   = $_POST['login_senha'];
	
	
	$Conexao = new PDOConexao();
	$conn = $Conexao->ConectaBD();

	$result = $conn->prepare("SELECT * FROM usuario WHERE lg_email=:usuario AND lg_senha=:senha LIMIT 1");
	$result->execute(array(':usuario'=> $usuario,
						':senha'=> base64_encode($senha)));
	
	$resultado = $result->fetch(PDO::FETCH_ASSOC);
		
	if($result->rowCount() == 0){
		//Mesagem de error
		$_SESSION['loginErro'] = "Usuário ou sua senha estão incorretos!";
		
		//Manda usuario para tela de login
		//header("Location: login");
		echo "<script>location.href='../login.php';</script>"; 
		
	}else{
		
		$_SESSION['usuarioId'] 			= $resultado['lg_id'];
		$_SESSION['usuarioNome'] 		= $resultado['lg_nome'];
		$_SESSION['usuarioEmail'] 		= $resultado['lg_email'];
		$_SESSION['usuarioSenha'] 		= base64_decode($resultado['lg_senha']);
		$_SESSION['usuarioNivelAcesso'] = $resultado['lg_nivel_de_acesso'];
		$_SESSION['usuarioStatus'] 		= $resultado['lg_status'];

		
		if(($resultado['lg_status'] == 2)){
			if ($resultado['lg_nivel_de_acesso'] == 1){
				echo "<script>location.href='../administrativo.php?link=1';</script>"; 
		}else{
				//header("location: usuario.php");
				echo "<script>location.href='../usuario.php?link=1';</script>"; 
		}	
		}else{
			//Erro não foi possivel logar usuario inativo
			//Mesagem de error
			$_SESSION['loginErro'] = "Seu usuário precisa de aprovação, aguarde!";
			
			//Manda usuario para tela de login
			//header("Location: login");
			echo "<script>location.href='../login.php';</script>"; 
		}		
	}	
		
	$conn = Null;
?>