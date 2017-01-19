<?php
	//session_start();
	$Conexao = new PDOConexao();
	$conn = $Conexao->ConectaBD();
	
	$id = $_GET['id'];
	//EXECUTA QUERY
	$result = $conn->prepare("SELECT * FROM usuario WHERE lg_id =:id LIMIT 1");
	$result->execute(array(':id'=> $id));	
	$resultado = $result->fetch(PDO::FETCH_ASSOC);
			
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

    <title>Alterar Usuário</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
  </head>
  
  <body >

	<?php
		include_once("menu_admin.php");
	?>
    <div class="container theme-showcase" role="main">

      <div class="page-header">
        <h2>Alterar Usuário</h2>
      </div>
      <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" method="POST" action="processoUsuario/processo_atualiza_usuario.php">
		   
			  <input type="hidden" name="ed_id" value="<?php echo $id ;?>">	
				
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="ed_nome" 
						 placeholder="Nome completo" required autofocus value="<?php echo $resultado['lg_nome'];?>">
				</div>
			  </div>	  
			  
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">E-mail</label>
				<div class="col-sm-10">
				  <input type="email" class="form-control" name="ed_email" 
						 placeholder="E-mail" required value="<?php echo $resultado['lg_email'];?>">
				</div>
			  </div>
			  			  			  
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Criado</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="cad_dt_criacao" 
						 placeholder="Data de criação" required value="<?php echo $resultado['lg_criado'];?>">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Modificado</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="cad_dt_modificado" 
						 placeholder="Data de modificação" required value="<?php echo $resultado['lg_modificada'];?>">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Senha</label>
				<div class="col-sm-10">
				  <label for="inputPassword" class="sr-only">Password</label>
				  <input type="password" name="ed_login_senha" class="form-control" placeholder="Digite a Senha" required value="<?php echo base64_decode($resultado['lg_senha']);?>">			  
				</div>
			  </div>
			  
			 
			  <?php

				    if($resultado['lg_nivel_de_acesso'] == 1){
						echo "<div class='form-group'>";
						echo "<label for='inputEmail3' class='col-sm-2 control-label'>Senha</label>";
						echo "<div class='col-sm-10'>";
						echo "<input type='text' class='form-control' name='ed_senha'";
						echo "placeholder='Senha' value=".base64_decode($resultado['lg_senha']).">";
						echo "</div>";
						echo "</div>";
					}
				  
			  ?> 
			  
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-success">Atualizar</button>
				  <a href="usuario.php?link=2" <button type="submit" class="btn btn-primary">Voltar</button></a>
				</div>
			  </div>
			  
			  <p class="text-center text-danger">
				<?php
					if(isset($_SESSION['AtualizaUsuario'])){
						echo $_SESSION['AtualizaUsuario'];
						unset($_SESSION['AtualizaUsuario']);
					}
				?>
			  </p>	
			  
			</form>
    </div> <!-- /container -->


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

<?php
	$conn = Null;
?>