<?php
	class CadastroController{
		private $dados;
		private $msg;
		
		public function __construct($campos){
			$this->dados = $campos;
			$this->validaCampos();
		} 

		private function validaCampos(){
			if
			(
				!(isset($this->dados['nome'])) or 
				!(isset($this->dados['rg'])) or 
				!(isset($this->dados['nomePai'])) or
				!(isset($this->dados['escolaridade'])) or
				!(isset($this->dados['telefone'])) or
				!(isset($this->dados['email'])) or
				!(isset($this->dados['cpf'])) or
				!(isset($this->dados['nomeMae'])) or
				!(isset($this->dados['profissao'])) or
				!(isset($this->dados['celular']))
			) {
				
				$this->msg = "Nenhum campo pode estar vazio!";
				$this->imprimirMensagem();	
			}
			
			else{
				$this->cadastrar();
			}
		}

		private function cadastrar(){
			require_once '../_model/pessoasDAO.php';

			$pessoasDB = new pessoasDAO();

			$resultado = $pessoasDB->selectPessoas($this->dados['cpf']);

			$this->verificaCadastro($resultado, $pessoasDB);
		}

		private function verificaCadastro($result, $dao){
			if ($result and $result-> num_rows != 0) {

				$this->msg = "Este CPF já está sendo utilizado.";
				$this->imprimirMensagem();
			}
			
			else{
				$dao->insertPessoas($this->dados);
				
				$this->msg = "Usuario Cadastrado com Sucesso.";

				$this->imprimirMensagem();
			}		
		}

		private function imprimirMensagem(){
			echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../_view/form_cadastro.html'>
						<script type=\"text/javascript\">
							alert(\" $this->msg \");
						</script>
				"
			;
		}

	}

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$cadastro = new CadastroController($_POST);
	}

?>