<!-- Escola Técnica Santo Inácio -->
<!-- Feira de Ciências e Tecnologia/Projeto de Conclusão de Curso -->
<!-- Sociedade Espírita Francisco de Assis (SEFA) -->
<!-- Nome: Henrique Rosa Carvalho e Gabriel Suterio Pereira da Silva -->
<!-- Data: 03/08/2018 -->

!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" keywords="html5" authors="Henrique Rosa Carvalho, Gabriel Suterio Pereira da Silva" />
		<meta name = "description" content = "Sociedade Espírita Francisco de Assis, Sociedade Espírita, Francisco de Assis, SEFA" />
		<meta name = "keywords" content = "Sociedade Espírita Francisco de Assis, Sociedade Espírita, Francisco de Assis, SEFA" />
		
		<title> Contato e Localização - SEFA </title>
		
		<link rel="stylesheet" type="text/css" href="SEFA.css" />
		<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" /> -->
		<link rel="stylesheet" type="text/css" href="scss/_carousel.scss" />
		<link rel="stylesheet" type="text/css" href="js/bootstrap.min.js" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="styles.css">
		<link rel="stylesheet" href="validar.php" "captcha.php">
		 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   		<script src="script.js"></script>
   		
   		<script src='https://www.google.com/recaptcha/api.js'></script>
		
		<!-- <style> -->
			<!-- .carousel{z-index: 1; width:10%; -->
			
			<!-- } -->
			<!-- .carousel-inner{ -->
				<!-- height:100px; -->
			<!-- } -->
		<!-- </style> -->
	</head>
	<body>
		<?php
			
			if (isset($_POST['Nome'])) {
				$nome = $_POST['Nome'];
			}
			
			if (isset($_POST['Email'])) {
				$nome = $_POST['Email'];
			}

			if (isset($_POST['Mensagem'])) {
				$mensagem = $_POST['Mensagem'];
			}
			
			if (isset($_POST['g-recaptcha-response'])) {
				$captcha_data = $_POST['g-recaptcha-response'];
			}

			// Se nenhum valor foi recebido, o usuário não realizou o captcha
			if (!$captcha_data) {
				echo "Por favor, confirme o captcha.";
				exit;
			}
			
			$resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=SUA-CHAVE-SECRETA&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
			
			if ($resposta.success) {
				echo "Obrigado por deixar sua mensagem!";
			} else {
				echo "Usuário mal intencionado detectado. A mensagem não foi enviada.";
				exit;
			}
		
		?>
	
	</body>
</html>
