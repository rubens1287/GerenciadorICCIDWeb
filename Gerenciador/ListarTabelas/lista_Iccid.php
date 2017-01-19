<?php	
	
	if(isset($_POST['gsim']) And isset($_POST['cbregional'])){
		
		
		//Busca registro de iccid de acordo com a pesquisa no banco
		$buscaRegComFiltro = new GerenciaRecursos();
		$rs = $buscaRegComFiltro->BuscaPeloFiltroTabelaIccid($_POST['gsim'],$_POST['cbregional']);
		
		//Retorna a lista de regional de acordo com o que existe no banco
		$GetRegional = new GerenciaRecursos();
		$rsRegional = $GetRegional->ListaComboxRegional();
		
		//Retorna quantidade de iccid de acordo com a consulta
		$consultaQtd = new GerenciaRecursos();
		$qtdIccid = $consultaQtd->ConsultaQuantidadePorRegional($_POST['gsim'],$_POST['cbregional']);
		$qtdTotal = $qtdIccid->rowCount();
	}
	if(isset($_GET['id'])){
		
		$atualizaRecIccid = new GerenciaRecursos();
		$atualizaRecIccid->PegaAtualizaBaseUso($_GET['id']);
		$GetRegional = new GerenciaRecursos();
		$rsRegional = $GetRegional->ListaComboxRegional();
		
	}
	if(!isset($_POST['gsim']) And !isset($_POST['cbregional'])){
		
		$atualizaRecIccid = new GerenciaRecursos();
		$rs = $atualizaRecIccid->MontaTabelaIccidInicial();
		$GetRegional = new GerenciaRecursos();
		$rsRegional = $GetRegional->ListaComboxRegional();
		
	}	
	
?>

<div class="container theme-showcase" role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
 
  <div class="page-header">
	<h3>Tabela de iccid</h3>
  </div>

  <form name="form1" class="form-signin" method="POST" action="">
	  <div style="width: 150px; height: 100px; border: 1px solid #c0c0c0; border-radius:6px; float: left; margin-bottom:10px; margin-right:20px"  align="center">
		<font>Tipo de tecnologia</font>
		</br >
		<div style="margin-top:8px;">
			<input id="option" type="radio" name="gsim" value="SIM" checked="checked">
			<label for="option"><span><span></span></span>3G</label></br >
			<input id="option" type="radio" name="gsim" value="USIM">
			<label for="option"><span><span></span></span>4G</label>
		</div>
	  </div>
		  
	  <div style="width: 150px; height: 100px; float:left; clear:right; "  align="center">
			<select class="form-control" name="cbregional">						
			<?php
				foreach ($rsRegional as $rsReg){
						
					echo '<option value='.$rsReg['regional'].'>'.$rsReg['regional'].'</option>';				
				}
			?>
			</select>
		</div>
		
		<a href='#'>
			<button style="margin-left:20px" type='submit' class='btn btn-sm btn-success'>Pesquisar
			</button>
		</a>  
	</form>
   
   
  
	<div class="row" >
	<div class="col-md-12">
	 <table class="table table-bordered">
		<thead>
		  <tr>
			<th>ICCID</th>
			<th>IMSI</th>
			<th>REGIONAL</th>
			<th>TIPO</th>
			<th>CARTÃO</th>
			<th>AÇÃO</th>
		  </tr>
		</thead>
		
		<tbody oncopy="return false" oncut="return false">
						
			<?php
				
				if(isset($rs)){
					if(!$rs){
						echo "<div class='alert alert-danger' role='alert'>";
						echo 'Nenhum registro encontrado';
						echo "</div>";
					}else{
						foreach($rs as $reg){
							echo "<tr id=".$reg['id_iccid'].">";
							echo "<td>".$reg['iccid_num']."</td>"; 
							echo "<td>".$reg['imsi']."</td>";
							echo "<td align='center'>".$reg['regional']."</td>";
							echo "<td align='center'>".$reg['tipo']."</td>";						
							if($reg['cartao_sim'] == 'SIM'){
								echo "<td align='center'>3G</td>";	
							}else{
								echo "<td align='center'>4G</td>";
							}	
			?>
				<td>
					<a href='administrativo.php?link=4&id=<?php echo $reg['id_iccid']; ?>' >			
						<button onclick='copy(<?php echo $reg['id_iccid']; ?>)' type='button' <?php if(isset($qtdTotal)){ if($qtdTotal >= 50){echo "class='btn btn-xs btn-success'";}elseif($qtdTotal <= 49 And $qtdTotal >= 20){echo "class='btn btn-xs btn-warning'";}elseif($qtdTotal <= 19){echo "class='btn btn-xs btn-danger'";} }else{echo "class='btn btn-xs btn-primary'";}  ?>>Copiar
						</button>
					</a>
				</td>	
			
			<?php
			
					}
				}
				echo '</tr>';
				}else{
					echo "<div class='alert alert-danger' role='alert'>";
					echo 'A consulta não retornou valores!';
					echo "</div>";
					
				}
				
				//
				if(!isset($_POST['gsim']) And !isset($_POST['cbregional'])){
					echo '<p style=font-size:12px;  >Clique no botão "Copiar" para transferir o contêudo para a memória de sua máquina.</p>';
				}
			?>
		</tbody>
	  </table>
	</div>
  </div>
  <p style="white-space: nowrap; color:#0000FF; font-size: 11px;">Obs: Esta legenda só se aplica quando filtrado a pesquisa por regional.</p>
  <div class="legenda-verde">
	<p style="margin-left:22px; white-space: nowrap;">Mais de 50 iccids disponiveis no estoque</p>
  </div>
  <div class="legenda-laranja">
	<p style="margin-left:22px; white-space: nowrap;">Entre 20 a 49 iccids no estoque</p>
  </div>
  <div class="legenda-vermelha">
	<p style="margin-left:22px; white-space: nowrap;">Menos de 19 iccids no estoque</p>
  </div>
  
</div> <!-- /container -->


