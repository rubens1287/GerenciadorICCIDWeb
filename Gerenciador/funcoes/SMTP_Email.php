<?php
 
Class EmailSmtp{
	

	Function EnviaEmail($para,$cc,$assunto,$corpo){
		
		require_once('../PHPMailer/PHPMailerAutoload.php');	
		
		$MAIL = new PHPMailer();
				
		//$host 		= 'smtp.mail.yahoo.com';
		//$username 	= 'gerenciador.techmahindra67@yahoo.com';
		//$password 	= 'Tech@2016';
		//$port 		= 465;
		//$secure 	    = 'ssl';
		
		$host 			= 'smtp.techmahindra.com.br';
		$username 		= 'automocao@techmahindra.com.br';
		$password 		= 'msat123$';
		$port 			= 587;
		$secure 		= false;
		
		$from 			= $username;
		$fromName 		= 'GERENCIADOR WEB';
		
		//Configurações
		$MAIL->isSMTP();
		$MAIL->SMTPAuth = true;
		$MAIL->SMTPSecure = $secure;
		$MAIL->Host = $host;
		$MAIL->Port = $port;
		$MAIL->Username = $username;
		$MAIL->Password = $password;
		//$MAIL->SMTPDebug = 1;
		$MAIL->setLanguage('pt');
		$MAIL->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
			)
		);

		$MAIL->From = $from;
		$MAIL->Sender = $from;
		$MAIL->FromName = 'Administrador';
		$MAIL->addReplyTo($from, $fromName);
		
		$MAIL->addAddress($para);
		
		if($cc <> ""){
			$MAIL->AddCC($cc);
		}
		
		$MAIL->isHTML(true);
		$MAIL->Charset = 'utf-8';
		$MAIL->WordWrap = 70;
		
		$MAIL->Subject = $assunto;
		$MAIL->Body = $corpo;
		//$MAIL->AltBody = 'Este e um teste. AltBody';
		
		if(!$MAIL->Send()) {			
			unset($MAIL);
			$resultado = false;
		} else {
			unset($MAIL);
			$resultado = true;
		}
		
		return $resultado;
	} 
}
 ?>