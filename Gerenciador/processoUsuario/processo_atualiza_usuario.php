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
	$senhaUser     = $_POST['ed_login_senha'];
				
	$Email = new EmailSmtp();
			
	//EXECUTA QUERY
	$stmt = $conn->prepare("UPDATE usuario SET lg_nome=:nome, lg_senha=:senha , lg_email=:email,
							lg_modificada = NOW() WHERE lg_id = :id");
	$stmt->execute(array(':nome' => $nomeUser,
						':email' => $emailUser,
						':id' => $idUser,
						':senha' => base64_encode($senhaUser)));
						
	if($stmt->rowCount() >= 1){
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
		/Gerenciador/usuario.php?link=2'>
		<script type=\"text/javascript\">
			alert(\"Atualizacao efetuada com sucesso!\");
		</script>
		";
	}else{
		//Usuario não foi atualizado 
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
		/Gerenciador/usuario.php?link=2'>
		<script type=\"text/javascript\">
			alert(\"Ocorreu um erro ao tentar atualizar o usuário!\");
		</script>
		";
	}	
?>




