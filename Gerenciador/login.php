<?php
	session_start();
	
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pagina para realizar login">
    <meta name="author" content="Techmahindra">
    <link rel="icon" href="favicon/favicon.ico">

    <title>Login Gerenciador</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="js/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
	
  </head>

  <body class="loginColor">
	<?php
			unset($_SESSION['usuarioId'],			
		  $_SESSION['usuarioNome'], 		
		  $_SESSION['usuarioEmail'], 		
		  $_SESSION['usuarioSenha'],
		  $_SESSION['usuarioNivelAcesso']);		  
	?>
    <div class="container">
		
      <form class="form-signin" method="POST" action="processo/processo_valida_login.php">
		
	    <!--<div class="logo"><img src="css/imagens/logo_tech.png"/></div>-->
		<center><img src="img\mahindra.jpg"  class="img-responsive"></center>
		<br />
        <label for="inputEmail" class="sr-only">Usuario</label>
        <input type="email" name="login_usuario" class="form-control" placeholder="Digite o E-mail" required autofocus>
		<br />
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="login_senha" class="form-control" placeholder="Digite a Senha" required>
        
        <button class="btn btn-lg btn-danger btn-block" type="submit">Acessar</button>
      </form>
	  
		<p class="text-center text-danger">
			Você não tem usuário? <a href="administrativo/cadastrar_usuario.php">Solicitar Usuário</a>
			<br />
			<a href="administrativo/recuperar_senha.php">Esqueceu sua senha?</a>
		</p>
	  	  
		<p class="text-center text-danger">
			<?php
				if(isset($_SESSION['loginErro'])){
					echo $_SESSION['loginErro'];
					unset($_SESSION['loginErro']);
				}
			?>
		</p>
		
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
