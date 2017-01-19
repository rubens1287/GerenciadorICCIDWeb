<?php
	session_start();
	include_once("../conexao.php");
	$Conexao = new PDOConexao();
	$conn = $Conexao->ConectaBD();
	require '../funcoes/SMTP_Email.php';
	
	$nome 			= $_POST['cad_nome'];
	$email   		= $_POST['cad_email'];
	$senha   		= $_POST['cad_senha'];
	$ConfirmaSenha  = $_POST['cad_conf_senha'];
		
	
	$Email = new EmailSmtp();			
					
	$rs = $conn->prepare("SELECT * FROM usuario WHERE lg_email = :email");
	$rs->execute(array(':email' => $email));
		
	$rsAdmin = $conn->query("SELECT * FROM usuario WHERE lg_nivel_de_acesso = 1 And lg_status = 2 LIMIT 1")->fetch();
			
	if($rs->rowCount() >= 1){	
		//Email ja cadastrado
		$_SESSION['cadUsuario'] = "Email já possui conta!";
		echo "<script>location.href='../administrativo/cadastrar_usuario.php';</script>";
		
	}else{
		if(($senha == $ConfirmaSenha)){
			
			if(strlen($senha) < 6){
				
				//Email ja cadastrado
				$_SESSION['cadUsuario'] = "A senha deve possuir no minimo 6 caracteres";
				echo "<script>location.href='../administrativo/cadastrar_usuario.php';</script>";
				
			}else{
				
				//Adicionar dados na base do gerenciador 
				$stmt = $conn->prepare("INSERT INTO usuario(lg_nome, lg_email, lg_senha, lg_nivel_de_acesso, lg_criado, lg_status) 
									VALUES(:nome, :email , :senha, 2, NOW(), 1)");					
				$stmt->execute(array(':nome' => $nome,
									 ':email' => $email,
									 ':senha' => base64_encode($senha)));
									
				if($stmt->rowCount() > 0){						
					
					//Corpo do email para usuário
					$stringBory = '<h2 style="color: red;">GERENCIADOR DE ICCID WEB TECHMAHINDRA</h2><br />Ola <strong>'.$nome.'</strong> seja bem vindo, seus dados de login estao logo abaixo: <br /><br /><strong>Seu Usuario: </strong> '.$email.' <br /><strong>Sua Senha:</strong> '.$senha.' <br /><br />Aguarde so mais um momento seu usuario ja vai ser debloqueado, <br />assim que for desbloqueado voce recebera um email avisando nao se preocupe!<br /><br />Atenciosamente,<br />Equipe de Automacao.';	
					$validaEnvio = $Email->EnviaEmail($email,'','GERENCIADOR WEB',$stringBory);	 
											
					if(($rsAdmin['lg_nivel_de_acesso'] == 1) and ($rsAdmin['lg_status'] == 2)){
						//corpo do email do administrador
						$stringAdm = '<h2 style="color: red;">GERENCIADOR DE ICCID WEB TECHMAHINDRA</h2><br />Ola <strong> '.$rsAdmin['lg_nome'].'</strong> foi solicitado acesso ao sistema pelo usuario abaixo: <br /><br /><strong>Nome:</strong> '.$nome.'<br /><strong>Email:</strong> '.$email.' <br /><br />Verifique a solicitacao e faca a ativacao.<br /><br />Atenciosamente,<br />Equipe de Automacao.';
						//Envio de email para administrador  RL00452643@techmahindra.com FR00432185@techmahindra.com
						$validaEnvio = $Email->EnviaEmail($rsAdmin['lg_email'],'FR00432185@techmahindra.com','GERENCIADOR WEB',$stringAdm);	
						//Usuario cadastrado com sucesso
					}
					if($validaEnvio){
						//Usuario cadastrado com sucesso
						$_SESSION['cadUsuarioCorreto'] = " Solicitação enviada com sucesso, Aguarde a aprovação!";
						echo "<script>location.href='../administrativo/cadastrar_usuario.php';</script>";	
					}else{
						$_SESSION['cadUsuarioCorreto'] = " Solicitação enviada com sucesso, porém houve uma falha no disparo do email, Aguarde a aprovação!";
						echo "<script>location.href='../administrativo/cadastrar_usuario.php';</script>";	
					}
					
				}
				
			}
			
		}else{
				
				//Senha e confirma senha não confere
				$_SESSION['cadUsuario'] = "Senha e confirma senha não confere!";
				echo "<script>location.href='../administrativo/cadastrar_usuario.php';</script>";				
		}
	}		
	
	$conn = Null;
?>