<?php
	
	namespace Mysql{
		include 'global.php';
			/* <!-- Escola Técnica Santo Inácio -->
<!-- Projeto de Conclusão de Curso -->
<!-- Sociedade Espírita Francisco de Assis (SEFA) -->
<!-- Nome: Henrique Rosa Carvalho e Gabriel Suterio Pereira da Silva -->
<!-- Data: 14/12/2018 --> */
		/* Definição de dados relacionados ao banco de dados */
		define('DB_SERVER', 'localhost');
		define('DB_NAME', 'sefa');
		define('DB_USERNAME', 'root');
		define('DB_PASSWORD', 'amazingday250193');
		
		class mysql{
			
			var $db, $conn;
			
			/* Construtor da página */
			public function __construct($server, $database, $username, $password){
				$this->conn = @mysql_connect($server, $username, $password);
				$this->db = @mysql_select_db($database, $this->conn);
			}
			
			/* Função p/ consulta de usuários */
			public function select($tabela, $colunas = "*", $where = "1=1"){
				$sql = "SELECT $colunas FROM $tabela $where";
				$result = $this->executar($sql);
				while($row = @mysql_fetch_array($result, MYSQL_ASSOC)){
					$return[] = $row;
				}
				return $return;
			}
			
			/* Função p/ consulta de usuários com base no tipo de acesso */
			public function selectUser($tabela, $colunas = "*", $where = "'acesso_idAcesso' = 'acesso_idAcesso'"){
				$sql = "SELECT $colunas FROM $tabela $where";
				$result = $this->executar($sql);
				while($row = @mysql_fetch_array($result, MYSQL_ASSOC)){
					$return[] = $row;
				}
				return $return;
			}
			
			/* Função p/ inserir usuários */
			public function insert($tabela, $dados){
				foreach($dados as $key => $value){
					$keys[] = $key;
					$insertvalues[] = '\'' . $value . '\'';
				}
				$keys = implode(',', $keys);
				$insertvalues = implode(',', $insertvalues);
				
				$sql = "INSERT INTO $tabela ($keys) VALUES ($insertvalues)";
				
				return $this->executar($sql);
			}
			
			/* Função p/ deletar usuários */
			public function deletar($tabela, $dados){
				foreach($dados as $key => $value){
					$keys[] = $key;
					$deletevalues[] = '\'' . $value . '\'';
				}
				$keys = implode(',', $keys);
				$deletevalues = implode(',', $deletevalues);
				
				$sql = "DELETE FROM $tabela WHERE idUsuario = $deletevalues";
				
				return $this->executar($sql);
			}
			
			/* Função p/ atualização de senha */
			public function atualizaSenha($tabela, $dados){
				foreach($dados as $key => $value){
					$keys[] = $key;
					$updatevalues[] = '\'' . $value . '\'';
				}
				$keys = implode(',', $keys);
				$updatevalues = implode(',', $updatevalues);
				
				$sql = "UPDATE $tabela SET $keys WHERE idUsuario = $updatevalues";
				
				return $this->executar($sql);
			}
			
			/* Função p/ execução das funções anteriores */
			private function executar($sql){
				$return_result = @mysql_query($sql, $this->conn);
				if($return_result){
					return $return_result;
				}else{
					$this->sql_error($sql);
				}
			}
			
			/* Função p/ exibir mensagem de erro SQL */
			private function sql_error($sql){
				echo @mysql_error($this->conn) . '<br>';
				die('error: ' . $sql);
			}
		}
	}
?>
