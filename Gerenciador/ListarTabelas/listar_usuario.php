<?php
	
	$Conexao = new PDOConexao();
	$conn = $Conexao->ConectaBD();
	$rs = $conn->query("SELECT * FROM usuario ORDER BY 'lg_id'")->fetchAll();
		
	//$resultado = mysql_query("SELECT * FROM usuario ORDER BY 'lg_id'");
	//$linhas = mysql_num_rows($resultado);
?>

<div class="container theme-showcase" role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
 
  <div class="page-header">
	<h3>Gerenciar Usuários</h3>
  </div>
  <div class="row">
	<div class="col-md-12">
	 <table class="table table-bordered">
		<thead>
		  <tr>
			<th>ID</th>
			<th>NOME</th>
			<th>E-MAIL</th>
			<th>NIVEL</th>
			<th>DATA DE CRIAÇÃO</th>
			<th>STATUS</th>
			<th>AÇÃO</th>
		  </tr>
		</thead>
		<tbody>
			<?php
				if(!$rs){
					echo "<div class='alert alert-danger' role='alert'>";
					echo 'Erro ao tentar recuperar os usuarios do sistema no banco';
					echo "</div>";
				}else{
					foreach($rs as $reg){
						echo "<tr>";
						echo "<td>".$reg['lg_id']."</td>"; 
						echo "<td>".$reg['lg_nome']."</td>";
						echo "<td>".$reg['lg_email']."</td>";
						if($reg['lg_nivel_de_acesso'] == 1){
							echo "<td>Admin</td>";	
						}else{
							echo "<td>Usuário</td>";
						}
						echo "<td>".$reg['lg_criado']."</td>";
						
						if($reg['lg_status'] == 1){
							echo "<td>Inativo</td>";	
						}else{
							echo "<td>Ativo</td>";
						}	
			?>
				<td>
					<a href='administrativo.php?link=3&id=<?php echo $reg['lg_id']; ?>'>
						<button type='button' class='btn btn-xs btn-warning'>Alterar
						</button>
					</a>
				</td>
			<?php
					}
				echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	</div>
  </div>
</div> <!-- /container -->
<?php
	$conn = Null;
?>