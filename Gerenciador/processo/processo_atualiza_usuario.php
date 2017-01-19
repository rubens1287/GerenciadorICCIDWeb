<?php
	session_start();
	include_once("../seguranca.php");
	require_once("../conexao.php");
	require '../funcoes/SMTP_Email.php';
	$Conexao = new PDOConexao();
	$conn = $Conexao->ConectaBD();
			
	$idUser 		 = $_POST['ed_id'];
	$nomeUser 		 = $_POST['ed_nome'];
	$emailUser 		 = $_POST['ed_email'];
	$nivelAcessoUser = $_POST['ed_nivel_acesso'];
	$statusUser 	 = $_POST['ed_status'];
	
	if(isset($_POST['ed_senha'])){
		$senhaAdmin = $_POST['ed_senha'];	
		$stmt = $conn->prepare("UPDATE usuario SET lg_nome=:nome, lg_senha=:senha , lg_email=:email, 
		lg_nivel_de_Acesso = :nivelAcesso, lg_modificada = NOW(), lg_status=:status WHERE lg_id = :id");
		$stmt->execute(array(':nome' => $nomeUser,
							':email' => $emailUser,
							':nivelAcesso' => $nivelAcessoUser,
							':status'=> $statusUser,
							':id' => $idUser,
							':senha' => base64_encode($senhaAdmin)));
		if($stmt->rowCount() >= 1){
			
			echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
			/Gerenciador/administrativo.php?link=2'>
			<script type=\"text/javascript\">
			alert(\"Atualizacao efetuada com sucesso!\");
			</script>
			";
		}else{
			//Usuario não foi atualizado 
			echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
			/Gerenciador/administrativo.php?link=2'>
			<script type=\"text/javascript\">
				alert(\"Ocorreu um erro ao tentar atualizar o usuário administrador!\");
			</script>
			";
		}
	}else{	
		$Email = new EmailSmtp();
				
		//EXECUTA QUERY
		$stmt = $conn->prepare("UPDATE usuario SET lg_nome=:nome , lg_email=:email, 
		lg_nivel_de_Acesso = :nivelAcesso, lg_modificada = NOW(), lg_status=:status WHERE lg_id = :id");
		$stmt->execute(array(':nome' => $nomeUser,
							':email' => $emailUser,
							':nivelAcesso' => $nivelAcessoUser,
							':status'=> $statusUser,
							':id' => $idUser));
							
		if($stmt->rowCount() >= 1){
			
			//corpo do email
			$stringBory = '<h2 style="color: red;">GERENCIADOR DE ICCID WEB TECHMAHINDRA</h2><br />Ola <strong>'.$nomeUser.'</strong>, estamos nos falando novamente.<br />Seu usuario foi atualizado e esta pronto para ser usado bom trabalho.<br /><br />Atenciosamente,<br />Equipe de Automacao.';	
			//Enviar email para o usuario solicitante. 
			$validaEnvio = $Email->EnviaEmail($emailUser,'','GERENCIADOR WEB',$stringBory);						
			//Usuario atualizado com sucesso
			if ($validaEnvio){
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
				/Gerenciador/administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Atualizacao efetuada com sucesso!\");
				</script>
				";
			}else{
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
				/Gerenciador/administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Atualizacao efetuada com sucesso, porem a notificacao nao foi enviada!\");
				</script>
				";
			}
		}else{
			//Usuario não foi atualizado 
			echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
			/Gerenciador/administrativo.php?link=2'>
			<script type=\"text/javascript\">
				alert(\"Ocorreu um erro ao tentar atualizar o usuário!\");
			</script>
			";
			//echo "<script>location.href='administrativo.php?link=2';</script>";
		}	
	}
	
	
	
?>




