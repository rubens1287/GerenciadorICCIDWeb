 <!-- Fixed navbar -->
<?php
	$Conexao = new PDOConexao();
	$conn = $Conexao->ConectaBD();
	
	//EXECUTA QUERY
	$idUser = $_SESSION['usuarioId'];
	$result = $conn->prepare("SELECT * FROM usuario WHERE lg_id=:id LIMIT 1");
	$result->execute(array(':id'=> $idUser));	
	$resultado = $result->fetch(PDO::FETCH_ASSOC);
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="usuario.php?link=1">TechMahindra</a>
	</div>
	<div id="navbar" class="navbar-collapse collapse">
	  <ul class="nav navbar-nav">
		<li><a href="usuario.php?link=2">Gerenciar Usuario</a></li>		
		<li><a href="usuario.php?link=4">Recursos Iccid</a></li>
		<li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gráficos<span class="caret"></span></a>
            <ul class="dropdown-menu">
               <li><a href="usuario.php?link=6">Volume de Iccid Por Regional</a></li>
               <li><a href="usuario.php?link=7">Quantidade por tipo de Regional e Tecnologia</a></li>
			   <li><a href="usuario.php?link=8">Indicador tendência de uso de iccid</a></li>
            </ul>
        </li>
		<li><a href="sair.php">Sair</a></li>
		<?php
			for($i = 1; $i <= 6; $i++){
				echo "<li><a></a></li>";
			}
		?>
		<li><a>Bem vindo,  <?php echo $resultado['lg_nome']  ?></a></li>
	  </ul>
	</div><!--/.nav-collapse -->
  </div>
</nav>
<?php
	$conn = null;
?>