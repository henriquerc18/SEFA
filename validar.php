<!-- Escola Técnica Santo Inácio -->
<!-- Feira de Ciências e Tecnologia/Projeto de Conclusão de Curso -->
<!-- Sociedade Espírita Francisco de Assis (SEFA) -->
<!-- Nome: Henrique Rosa Carvalho e Gabriel Suterio Pereira da Silva -->
<!-- Data: 03/08/2018 -->

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" keywords="html5" authors="Henrique Rosa Carvalho, Gabriel Suterio Pereira da Silva" />
	</head>
	<body>

		<?php
		   session_start();
			if ($_POST["palavra"] == $_SESSION["palavra"]){
				echo "<h1>Voce Acertou</h1>";
			}else{
				echo "<h1>Voce nao acertou!</h1>";
				echo "<a href='index.php'>Retornar</a>";
			}
		?>
		
	</body>
</html>
