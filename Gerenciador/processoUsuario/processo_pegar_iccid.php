<?php
Class GerenciaRecursos{
	
	Function PegaAtualizaBaseUso($id){
		
		$Conexao = new PDOConexao();
		$conn = $Conexao->ConectaBD();
		
		$result = $conn->prepare("SELECT iccid_num, imsi, regional, cartao_sim FROM iccid WHERE id_iccid=:id AND status=:status");
		$result->execute(array(':id'=> $id,
								':status' => 1));
		$rsCopia = $result->fetch();
				
			
		if($result->rowCount() >= 1){			
			
			//ATUALIZA REGISTRO ICCID EM USO E MONTA DATA E HORA E NOME DO USÁRIO
			$stmt = $conn->prepare("UPDATE iccid SET status=:status, nome_maquina=:nome_maquina, usuario=:usuario, data_hora=:data_hora WHERE id_iccid = :id");
			$stmt->execute(array(':status' => 0,
								':id' => $id,
								'usuario' => $_SESSION['usuarioNome'], 
								':nome_maquina' => 'GERENCIADOR WEB',
								':data_hora' => date('d/m/Y H:i:s')));			
			
			//CONSULTA TABELA ATUALIZADA DE ICCID
			$rs = $conn->prepare("SELECT * FROM iccid WHERE id_iccid=:id");
			$rs->execute(array(':id'=> $id));
			$resultado = $rs->fetch();
		
			//INSERI NA TABELA HISTORICO DE ICCID
			$stmt = $conn->prepare("INSERT INTO hist_iccid(iccid_num, imsi, regional, tipo, cartao_sim, status, usuario, nome_maquina, data_hora) 
									VALUES(:iccid_num, :imsi , :regional, :tipo, :cartao_sim, :status, :usuario, :nome_maquina, :data_hora)");					
			$stmt->execute(array(':iccid_num' => $resultado['iccid_num'],
								 ':imsi' => $resultado['imsi'],
								 ':regional' => $resultado['regional'],
								 ':tipo' => $resultado['tipo'],
								 ':cartao_sim' => $resultado['cartao_sim'],
								 ':status' => $resultado['status'],
								 ':usuario' => $resultado['usuario'],
								 ':nome_maquina' => $resultado['nome_maquina'],
								 ':data_hora' => $resultado['data_hora']));
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
				/Gerenciador/usuario.php?link=4'>
				<script type=\"text/javascript\">
				alert(\"Registro copiado com sucesso!\");
				</script>
			";
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
				/Gerenciador/usuario.php?link=4'>
				<script type=\"text/javascript\">
				alert(\"Este registro já foi utilizado por outro usuário do sistema, a página será atualizada para você escolher outro.\");
				</script>
			";
		}
	}
	
	function MontaTabelaIccidInicial(){
		$Conexao = new PDOConexao();
		$conn = $Conexao->ConectaBD();
		
		//QUERY BUSCA PESQUISA
		//LISTA A TEBLA NO PRIMEIRO ACESSO
		$result = $conn->prepare("SELECT * FROM iccid WHERE status=:status ORDER BY 'id_iccid' LIMIT 6");
		$result->execute(array(':status'=> 1));
		$rs = $result->fetchAll(PDO::FETCH_ASSOC);
		return $rs;
	}
	
	Function ListaComboxRegional(){
		$Conexao = new PDOConexao();
		$conn = $Conexao->ConectaBD();
		
		//QUERY BUSCA REGIONAL
		$result = $conn->prepare("SELECT DISTINCT regional FROM iccid WHERE status=:status ORDER BY regional");
		$result->execute(array(':status'=> 1));
		$rsRegional = $result->fetchAll(PDO::FETCH_ASSOC);	
		return $rsRegional;
	}
	
	Function BuscaPeloFiltroTabelaIccid($gsim,$regional){
		$Conexao = new PDOConexao();
		$conn = $Conexao->ConectaBD();
		
		//QUERY BUSCA PESQUISA
		$result = $conn->prepare("SELECT * FROM iccid WHERE status=:status AND cartao_sim=:cartao AND regional LIKE :regional LIMIT 6");
		$result->execute(array(':status'=> 1,
						':cartao'=> $gsim,
						':regional' => $regional.'%'));
		$rs = $result->fetchAll(PDO::FETCH_ASSOC);
		return $rs;
	}
	
	function ConsultaQuantidadePorRegional($gsim,$regional){
		$Conexao = new PDOConexao();
		$conn = $Conexao->ConectaBD();
		
		//QUERY BUSCA PESQUISA
		//LISTA A TEBLA NO PRIMEIRO ACESSO
		$result = $conn->prepare("SELECT * FROM iccid WHERE status=:status AND cartao_sim=:cartao AND regional LIKE :regional");
		$result->execute(array(':status'=> 1,
								':cartao'=> $gsim,
								':regional' => $regional.'%'));
		return $result;
	}
	
}		
?>

