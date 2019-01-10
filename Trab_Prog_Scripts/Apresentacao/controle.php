<?php
	
	namespace controle{
		include 'global.php';
		include 'processaAcesso.php';
		
		$controle = new \processaAcesso\ProcessaAcesso;
		if(isset($_POST['enviar'])){
			$login = $_POST['login'];
			$senha = md5($_POST['senha']);
			$usuario = $controle->verificaAcesso($login, $senha);
			echo $login;
			echo $senha;
			if($usuario[0]['acesso_idAcesso'] == 1){
				header("Location: pagina1.html");
			}else if($usuario[0]['acesso_idAcesso'] == 2){
				header("Location: pagina2.html");
			}else if($usuario[0]['acesso_idAcesso'] == 3){
				header("Location: admin.html");
			}else{				
				header("Location: pagina3.html");
			}
		}else if(isset($_POST['cadastrar'])){
			$nome = $_POST['nome'];
			$login = $_POST['login'];
			$senha = md5($_POST['senha']);
			$tipo_usuario = 1;
			$grupo = $_POST['selecionar_grupo'];
			$arr = array('nome' => $nome, 'usuario' => $login, 'senha' => $senha, 'acesso_idAcesso' => $tipo_usuario, 'tb_grupo_idGrupo' => $grupo);
			if(!$controle->cadastraUsuario($arr)){
				echo 'Aconteceu algum erro';
			}else{
				$acesso_idAcesso = $controle->verificaAcesso($login, $senha);
				 if($acesso_idAcesso[0]['acesso_idAcesso'] == 1){
					header("Location: pagina1.html");
				}else if($acesso_idAcesso[0]['acesso_idAcesso'] == 2){
					header("Location: pagina2.html");
				}
			}
		}else if(isset($_POST['cadUsuario'])){
			$nome = $_POST['nome'];
			$login = $_POST['login'];
			$senha = md5($_POST['senha']);
			$tipo_usuario = $_POST['tipo_usuario'];
			$grupo = $_POST['selecionar_grupo'];
			$arr = array('nome' => $nome, 'usuario' => $login, 'senha' => $senha, 'acesso_idAcesso' => $tipo_usuario, 'tb_grupo_idGrupo' => $grupo);
			if(!$controle->cadastraUsuario($arr)){
				echo 'Aconteceu algum erro';
			}else{
				$acesso_idAcesso = $controle->verificaAcesso($login, $senha);
				if($acesso_idAcesso[0]['acesso_idAcesso'] == 1){
					header("Location: pagina1.html");
				}else if($acesso_idAcesso[0]['acesso_idAcesso'] == 2){
					header("Location: pagina2.html");
				}else if($acesso_idAcesso[0]['acesso_idAcesso'] == 3){
					header("Location: admin.html");
				}
			}
		}else if(isset($_POST['Ok'])){
			echo "Chegou no OK";
			$tipo_usuario = $_POST['tipo_usuario'];
			echo $tipo_usuario;
			/*
			$arr = array('acesso_idAcesso' => $tipo_usuario);
			if(!$controle->deletaUsuario($arr)){
				echo 'Aconteceu algum erro';
			}else{
				$acesso_idAcesso = $controle->verificaUsuario($tipo_usuario);
				if($acesso_idAcesso[0]['acesso_idAcesso'] == 1){
					header("Location: deletar_Aluno.html");
				}else if($acesso_idAcesso[0]['acesso_idAcesso'] == 2){
					header("Location: deletar_Coordenador.html");
				}else if($acesso_idAcesso[0]['acesso_idAcesso'] == 3){
					header("Location: deletar_Admin.html");
				}
			}
			*/
		}else if (isset($_POST['esqueci_senha'])) {
			$usr_id            = $_POST['login'];
			$senha_nova        = md5(strip_tags($_POST['senha']));
			$confirme_senha    = md5(strip_tags($_POST['confirmaSenha']));

			$sql = mysql_query("SELECT senha FROM tb_usuario WHERE usuario = '$usr_id' ");
			$row = mysql_fetch_array($sql);
			$senha_banco = $row['senha'];

			if($senha_nova == "" || $confirme_senha == "") {
				echo "
					<script>
						alert('Os campos das senhas não podem ser nulos.');
						window.location='../esqueci_senha.html';
					</script>";
			} else {
				if (($senha_nova != $senha_banco) && ($senha_nova != $confirme_senha) ) {
					echo "
					<script>
						alert('As senhas não coincidem.');
						window.location='esqueci_senha.html';
					</script>";
				} else {
					if ($result=mysql_query("UPDATE tb_usuario SET senha = '$confirme_senha' WHERE usuario = '$usr_id' ")) {
						echo "
					<script>
						alert('Senha alterada com Sucesso!');
						window.location='Login_SEFA.html';
					</script>";
					}
				}
			}
		}
		
		
		/*else if(isset($_POST['esqueci_senha'])){
			$login = $_POST['login'];
			$senha = md5($_POST['senha']);
			$novaSenha = md5($_POST['confirmaSenha']);
			echo $login;
			echo $senha;
			echo $novaSenha;
			$arr = array('usuario' => $login, 'senha' => $senha, 'senha' => $novaSenha);
			if(!$controle->updateUsuario($arr)){
				echo 'Aconteceu algum erro';
			}else{
				$verificaSenha = $controle->verificaSenha();
				if($verificaSenha[0]['senha'] == $this->senha && $verificaSenha[0]['senha'] == $this->novaSenha){
					$controle->updateUsuario();
				}else{
					"Erro na alteração da senha";
				}
			}
		}*/
	}
?>
