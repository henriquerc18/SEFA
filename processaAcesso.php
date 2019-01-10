<?php
	
	namespace processaAcesso{
		include 'global.php';
		include 'mysql.php';
			/* <!-- Escola Técnica Santo Inácio -->
<!-- Projeto de Conclusão de Curso -->
<!-- Sociedade Espírita Francisco de Assis (SEFA) -->
<!-- Nome: Henrique Rosa Carvalho e Gabriel Suterio Pereira da Silva -->
<!-- Data: 14/12/2018 --> */
		use Mysql as Mysql;
		
		class ProcessaAcesso {
			
			var $db;
			
			/* Construtor da página */
			public function __construct(){
				$conexao = new Mysql\mysql(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);
				$this->db = $conexao;
			}
			
			/* Função p/ verificar quem está logando com base no usuário e senha */
			public function verificaAcesso($login, $senha){
				$select = $this->db->select('sefa.tb_usuario', '*', " where usuario = '$login' and senha = '$senha'");
				return $select;
			}
			/* Função p/ verificar tipo de acesso */
			public function verificaUsuario($tipo_usuario){
				$select = $this->db->selectUser('sefa.tb_usuario', '*', " where acesso_idAcesso = '$tipo_usuario'");
				return $select;
			}
			
			/*public function verificaSenha($login, $senha, $novaSenha){
				$select = $this->db->selectUser('sefa.tb_usuario', '*', " where usuario = '$usuario' and senha = '$senha' and senha = '$novaSenha'");
				return $select;
			}*/
			
			/* Função p/ cadastrar usuário */
			public function cadastraUsuario($dados){
				$insert = $this->db->insert('tb_usuario', $dados);
				return $insert;
			}
			
			/* Função p/ deletar usuário */
			public function deletaUsuario($dados){
				echo "Tentando deletar";
				$delete = $this->db->deletar('tb_usuario', $dados);
				return $delete;
			}
			
			/*public function updateUsuario($dados){
				$update = $this->db->atualizaSenha('tb_usuario', $dados);
				return $update;
			}*/
		}
	}
?>
