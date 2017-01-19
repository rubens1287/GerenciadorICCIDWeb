<?php
	session_start();
	require '../funcoes/SMTP_Email.php';
	include_once("../conexao.php");
	$Conexao = new PDOConexao();
	$conn = $Conexao->ConectaBD();
	$Email = new EmailSmtp();	
	
	$email = $_POST['rec_email'];
							
	$result = $conn->prepare("SELECT * FROM usuario WHERE lg_email = :email");
	$result->execute(array(':email' => $email));
	$rs = $result->fetch(PDO::FETCH_ASSOC);
			
	if($result->rowCount() >= 1){	
		
		//Corpo do email para usuário
		$stringBory = '<h2 style="color: red;">RECUPERACAO DE SENHA - GERENCIADOR WEB</h2><br />Ola <strong>'.$rs['lg_nome'].'</strong> sua senha de login esta logo abaixo: <br /><br /><strong>Sua Senha:</strong> '.base64_decode($rs['lg_senha']).' <br /><br />Atenciosamente,<br />Equipe de Automacao.';	
		$validaEnvio = $Email->EnviaEmail($email,'','GERENCIADOR WEB',$stringBory);	 
		
		if($validaEnvio){
			//Se email foi enviado com sucesso
			$_SESSION['recUsuarioCorreto'] = 'Solcitacão efetuada com sucesso';
		}else{
			//Se email não foi enviado com sucesso
			$_SESSION['recUsuario'] = 'Ocorreu um erro ao tentar enviar o email, contate o administrador';
		}
		echo "<script>location.href='../administrativo/recuperar_senha.php';</script>";
		
	}else{
		//Nenhum registro encotrado no banco
		$_SESSION['recUsuario'] = "E-mail informado não possui cadastro!";
		echo "<script>location.href='../administrativo/recuperar_senha.php';</script>";				
	}		
	
	$conn = Null;
?>