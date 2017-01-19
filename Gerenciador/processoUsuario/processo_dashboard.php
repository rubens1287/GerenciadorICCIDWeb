 <?php
Class GerenciaDashboard{
	
	Function pegaQuantidadePorRegional($regional,$status){
		
		$Conexao = new PDOConexao();
		$conn = $Conexao->ConectaBD();
					
		$result = $conn->prepare("SELECT * FROM iccid WHERE regional LIKE :regional AND status=:status");
		$result->execute(array(':regional'=> $regional .'%',
								':status' => $status));
		return $result->rowCount();
			
	}	
	
	Function pegaStatusUsuario($status){
		$Conexao = new PDOConexao();
		$conn = $Conexao->ConectaBD();
	
		//select para busca a quantidade de usuarios.
		$rsInativo = $conn->prepare("SELECT * FROM usuario WHERE lg_status=:status");
		$rsInativo->execute(array(':status' => $status));
		return $rsInativo->rowCount();
	}
	
	Function pegaQtdPorRegionaleTecnologia($regional,$status,$tecnologia){
		
		$Conexao = new PDOConexao();
		$conn = $Conexao->ConectaBD();
					
		$result = $conn->prepare("SELECT * FROM iccid WHERE regional LIKE :regional AND status=:status AND cartao_sim=:cartao");
		$result->execute(array(':regional'=> $regional .'%',
								':cartao'=> $tecnologia,
								':status' => $status));
		return $result->rowCount();
			
	}
	
	Function pegaIndicadorTedenciaUso($tecnologia,$mes){
		
		$Conexao = new PDOConexao();
		$conn = $Conexao->ConectaBD();
					
		$result = $conn->prepare("SELECT * FROM hist_iccid WHERE cartao_sim=:cartao AND data_hora LIKE :data_hora");
		$result->execute(array(':cartao'=> $tecnologia,
								':data_hora'=> '%/'.$mes.'/%'));
		return $result->rowCount();
			
	}
}	
?>

