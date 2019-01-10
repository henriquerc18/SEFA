<?php

	if (!$link = mysqli_connect('localhost', 'root', 'amazingday250193')) {
		echo 'Não foi possível conectar ao mysql';
		exit;
	}

	if (!@mysql_select_db('sefa', $link)) {
		echo 'Não foi possível selecionar o banco de dados';
		exit;
	}

	$sql = 'SELECT idUsuario, nome, usuario, senha, acesso_idAcesso, tb_grupo_idGrupo FROM tb_usuario';
	$result = mysql_query($sql, $link);

	if (!$result) {
		echo "Erro do banco de dados, não foi possível consultar o banco de dados\n";
		echo 'Erro MySQL: ' . mysql_error();
		exit;
	}

	while ($row = mysql_fetch_assoc($result)) {
		echo $row['idUsuario, nome, usuario, senha, acesso_idAcesso, tb_grupo_idGrupo'];
	}

	mysql_free_result($result);

?>