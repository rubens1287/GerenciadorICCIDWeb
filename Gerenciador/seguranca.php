<?php
	ob_start();
	
	if ((Empty($_SESSION['usuarioId'])) || (Empty($_SESSION['usuarioNome'])) || (Empty($_SESSION['usuarioEmail']))
		|| (Empty($_SESSION['usuarioSenha'])) || (Empty($_SESSION['usuarioNivelAcesso']))){
			
		unset($_SESSION['usuarioId'],			
		      $_SESSION['usuarioNome'], 		
		      $_SESSION['usuarioEmail'], 		
		      $_SESSION['usuarioSenha'],
			  $_SESSION['usuarioNivelAcesso']);
		//Mensagem de erro
		$_SESSION['loginErro'] = "Área restrita pra usuário cadastrado.";
		//header("location: login.php");
		echo "<script>location.href='login.php';</script>"; 
	}
	
	if(isset($_SESSION['loginErro'])){
		
		unset($_SESSION['usuarioId'],			
		      $_SESSION['usuarioNome'], 		
		      $_SESSION['usuarioEmail'], 		
		      $_SESSION['usuarioSenha'],
			  $_SESSION['usuarioNivelAcesso']);
		//Mensagem de erro
		$_SESSION['loginErro'] = "Área restrita somente para usuário com permissão!";
		//header("location: login.php");
		echo "<script>location.href='login.php';</script>"; 
	}
	
?>