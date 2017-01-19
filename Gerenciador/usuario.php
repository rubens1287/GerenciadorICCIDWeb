<?php
	session_start();
	if($_SESSION['usuarioNivelAcesso'] == 1){
		unset($_SESSION['usuarioId'],			
			  $_SESSION['usuarioNome'], 		
			  $_SESSION['usuarioEmail'], 		
			  $_SESSION['usuarioSenha'],
			  $_SESSION['usuarioNivelAcesso']);
	}
	include_once("seguranca.php");
	include_once("conexao.php");
	include_once("processoUsuario/processo_pegar_iccid.php");
	include_once("processoUsuario/processo_dashboard.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Página Administrativa Gerenciador de ICCID">
    <meta name="author" content="Techmahindra">
	<link rel="icon" href="favicon/favicon.ico">
	
    <title>Usuário</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
	<script src="js/CopyToClipboard.js"></script>
  </head>

  <body>
	<?php
		
		include_once("usuario/menu_admin.php");
		
		//CHAMA AS PAGINAS CONFORME O NUMERO DO LINK INFORMADO NO ARQ 'menu_admin.php'
		$link = $_GET["link"];
		
		$pag[1] = "usuario/Bem_vindo.php";
		$pag[2] = "ListarTabelasUsuario/listar_usuario.php";
		$pag[3] = "usuario/alterar_usuario.php";
		$pag[4] = "ListarTabelasUsuario/lista_Iccid.php";
		$pag[5] = "processoUsuario/processo_pegar_iccid.php";
		$pag[6] = "usuario/dsh_usuario_volume_iccid.php";
		$pag[7] = "usuario/dsh_qtd_tipo_tecnologia.php";
		$pag[8] = "usuario/dsh_indicador_uso_mensal.php";
		
		if(!empty($link)){
			if(file_exists($pag[$link])){
				include $pag[$link];
			}else{
				include "usuario/Bem_vindo.php";
			}
		}else{
			include "usuario/Bem_vindo.php";
		}
		
	?>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>