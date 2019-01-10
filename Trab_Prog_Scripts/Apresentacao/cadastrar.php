<!-- Nome: Henrique Rosa Carvalho -->
<!-- Data: 11/10/2018 -->



<!DOCTYPE html>
	<html>
		<head>
			<title> Cadastre-se </title>
			<meta charset="UTF-8">
		</head>
		<body>
		
			<?php
				include 'global.php';
			?>
			
			<div> Cadastro de usuário </div>
			<form action="controle.php" method="post">
				<label> Nome </label><input type="text" name="nome" value=""/><br>
				
				<label> Login </label><input type="text" name="login" value=""/><br>
				
				<label> Senha </label><input type="password" name="senha" value=""/><br>
				
				<label> Tipo de usuário </label>
				<select name="tipo_usuario">
					<option value=""> Selecione </option>
					<option value="1"> Aluno(a) </option>
					<option value="2"> Coordenador </option>
				</select><br>
				
				<label> Grupo </label>
				<select name="selecionar_grupo">
					<option value=""> Selecione </option>
					<option value="100"> ESDE - Segunda </option>
					<option value="200"> ESDE I - Terça </option>
					<option value="300"> ESDE II - Terça </option>
					<option value="400"> ESDE - Quinta </option>
				</select><br>
					
				<input type="submit" name="cadastrar" value="cadastrar"/>
				
				<a href="cadastrar.php"> Sem cadastro? </a>
			</form>
		</body>
	</html>
