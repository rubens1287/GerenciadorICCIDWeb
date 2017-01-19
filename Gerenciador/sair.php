<?php
	session_start();
	session_destroy();
	
	unset($_SESSION['usuarioId'],			
		  $_SESSION['usuarioNome'], 		
		  $_SESSION['usuarioEmail'], 		
		  $_SESSION['usuarioSenha'],
		  $_SESSION['usuarioNivelAcesso']);

	echo "<script>location.href='login.php';</script>"; 	  
?>