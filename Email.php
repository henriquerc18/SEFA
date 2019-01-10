<!-- Escola Técnica Santo Inácio -->
<!-- Feira de Ciências e Tecnologia/Projeto de Conclusão de Curso -->
<!-- Sociedade Espírita Francisco de Assis (SEFA) -->
<!-- Nome: Henrique Rosa Carvalho e Gabriel Suterio Pereira da Silva -->
<!-- Data: 03/08/2018 -->

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" keywords="html5" authors="Henrique Rosa Carvalho, Gabriel Suterio Pereira da Silva" />
		<meta name = "description" content = "Sociedade Espírita Francisco de Assis, Sociedade Espírita, Francisco de Assis, SEFA" />
		<meta name = "keywords" content = "Sociedade Espírita Francisco de Assis, Sociedade Espírita, Francisco de Assis, SEFA" />
	</head>
	<body>
		<?php>
			$destino = "henriquerc2015@gmail.com";
			$nome = $_POST['Nome'];
			$email = $_POST['Email'];
			
			$headers =  "Content-Type:text/html; charset=UTF-8\n";
			$headers .= "From:  dominio.com.br<sistema@dominio.com.br>\n"; //Vai ser //mostrado que  o email partiu deste email e seguido do nome
			$headers .= "X-Sender:  <sistema@dominio.com.br>\n"; //email do servidor //que enviou
			$headers .= "X-Mailer: PHP  v".phpversion()."\n";
			$headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
			$headers .= "Return-Path:  <sistema@dominio.com.br>\n"; //caso a msg //seja respondida vai para  este email.
			$headers .= "MIME-Version: 1.0\n";
 
mail($destino, $nome, $mensagem, $headers);
		?>
	</body>
</html>