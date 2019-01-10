<?php




	
	namespace controle{
		include 'global.php';
		include 'processaAcesso.php';
			/* Escola Técnica Santo Inácio 
Projeto de Conclusão de Curso 
 Sociedade Espírita Francisco de Assis (SEFA) 
Nome: Henrique Rosa Carvalho e Gabriel Suterio Pereira da Silva 
 Data: 14/12/2018 */
		/* Instância da classe processaAcesso */
		$controle = new \processaAcesso\ProcessaAcesso;
		
		/* Direcionamento para as devidas páginas conforme o usúario e senha digitados */
		if(isset($_POST['enviar'])){
			/* session_start();
			// as variáveis login e senha recebem os dados digitados na página anterior
			$login = $_POST['login'];
			$senha = $_POST['senha'];
			// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
			$con = mysql_connect("127.0.0.1", "root", "amazingday250193") or die
			 ("Sem conexão com o servidor");
			$select = mysql_select_db("sefa") or die("Sem acesso ao DB, Entre em 
			contato com o Administrador, henriquerc2015@gmail.com");
			 
			// A variavel $result pega as varias $login e $senha, faz uma 
			//pesquisa na tabela de usuarios
			$result = mysql_query("SELECT * FROM `tb_usuario` 
			WHERE `usuario` = '$login' AND `senha`= '$senha'");
			 Logo abaixo temos um bloco com if e else, verificando se a variável $result foi 
			bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor
			será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do 
			resultado ele redirecionará para a página site.php ou retornara  para a página 
			do formulário inicial para que se possa tentar novamente realizar o login 
			
			if(mysql_num_rows ($result) > 0 )
			{
			$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
			header('location: admin.php');
			}
			else{
			  unset ($_SESSION['login']);
			  unset ($_SESSION['senha']);
			  header('location: pagina3.html');
   
			}*/
			
			
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
			
			/* Cadastro de alunos conforme dados preenchidos no formulário */
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
			
			/* Cadastro de usuários conforme dados preenchidos no formulário */
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
			
			/* Direcionamento p/ as páginas de deleção */
		}else if(isset($_POST['Ok'])){
			echo "Chegou no OK";
			$tipo_usuario = $_POST['tipo_usuario'];
			echo $tipo_usuario;
			
			$usuario = $controle->verificaUsuario($tipo_usuario);
			if($usuario[0]['acesso_idAcesso'] == 1){
				header("Location: devmedia.php");
			}else if($usuario[0]['acesso_idAcesso'] == 2){
				header("Location: deletar_Coordenador.html");
			}else if($usuario[0]['acesso_idAcesso'] == 3){
				header("Location: deletar_Admin.html");
			}else{				
				header("Location: pagina3.html");
			}
			
			/*$arr = array('acesso_idAcesso' => $tipo_usuario);
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
			}*/
			
			/* Altera senha conforme dados preenchidos no formulário de esquecimento de senha */
		}else if (isset($_POST['esqueci_senha'])) {
			$usr_id            = $_POST['login'];
			$senha_nova        = md5(strip_tags($_POST['senha']));
			$confirme_senha    = md5(strip_tags($_POST['confirmaSenha']));

			$sql = mysql_query("SELECT senha FROM tb_usuario WHERE usuario = '$usr_id' ");
			$row = mysql_fetch_array($sql);
			$senha_banco = $row['senha'];

			if($usr_id == "" || $senha_nova == "" || $confirme_senha == "") {
				echo "
					<script>
						alert('Os campos das senhas não podem ser nulos.');
						window.location='esqueci_senha.html';
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
			
			/* Altera senha conforme dados preenchidos no formulário de alteração de senha */
		}else if (isset($_POST['alterar_senha'])) {
			$usr_id            = $_POST['login'];
			$senha_atual       = md5(strip_tags($_POST['senha_atual']));
			$senha_nova        = md5(strip_tags($_POST['senha']));
			$confirme_senha    = md5(strip_tags($_POST['confirmaSenha']));

			$sql = mysql_query("SELECT senha FROM tb_usuario WHERE usuario = '$usr_id' ");
			$row = mysql_fetch_array($sql);
			$senha_banco = $row['senha'];

			if($usr_id == "" || $senha_atual == "" || $senha_nova == "" || $confirme_senha == "") {
				echo "
					<script>
						alert('Os campos das senhas não podem ser nulos.');
						window.location='alterar_senha.html';
					</script>";
			} else {
				if (($senha_atual != $senha_banco) && ($senha_nova != $confirme_senha) ) {
					echo "
					<script>
						alert('As senhas não coincidem.');
						window.location='alterar_senha.html';
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
	}
?>
