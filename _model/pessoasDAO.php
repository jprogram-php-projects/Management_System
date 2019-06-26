<?php
	class pessoasDAO{
		private $conexao;
		private $cpf;

		public function __construct(){
			require_once '../_connection/conexao.php';

			$this->conexao = new Conexao();
		}

		public function selectTodasPessoas(){
			$query = "SELECT * FROM pessoas";
      
            $resultado_pessoa = mysqli_query($this->conexao->getInstancia(), $query);

            return $resultado_pessoa;
		}


		public function selectPessoas($cpf_digitado){
			$this->cpf = $cpf_digitado;

			$query = "SELECT cpf FROM pessoas WHERE cpf = '$this->cpf' LIMIT 1";
      
            $resultado_pessoa = mysqli_query($this->conexao->getInstancia(), $query);

            return $resultado_pessoa;
		}

		public function insertPessoas($dados){
			$query = "INSERT INTO pessoas(nome, rg, nomePai, escolaridade, telefone, email, nascimento, cpf, nomeMae, profissao, celular) VALUES (
								'" . $dados['nome'] . "',	
								'" . $dados['rg'] . "',
								'" . $dados['nomePai'] . "',
								'" . $dados['escolaridade'] . "',
								'" . $dados['telefone'] . "',
								'" . $dados['email'] . "',
								'" . $dados['nascimento'] . "',
								'" . $dados['cpf'] . "',
								'" . $dados['nomeMae'] . "',
								'" . $dados['profissao'] . "',
								'" . $dados['celular'] . "'
							)";

			$cadastrar = mysqli_query($this->conexao->getInstancia(), $query);				
		}

		public function deletePessoa($cpf_digitado){
			$this->cpf = $cpf_digitado;
			$query = "DELETE FROM pessoas WHERE cpf = '$this->cpf' ";
			$result = mysqli_query($this->conexao->getInstancia(), $query);
		}
	}
?>