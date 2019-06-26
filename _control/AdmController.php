<?php
	class AdmController{
		private $msg;

		public function listarUsuarios(){
			require_once '../_model/pessoasDAO.php';

			$pessoasDB = new pessoasDAO();

			$result = $pessoasDB->selectTodasPessoas();

			$this->imprimirDados($result);				
		}

		private function imprimirDados($resultado){
			while($rows_pessoas = mysqli_fetch_assoc($resultado)){
				echo
					"<br/> Id: " .$rows_pessoas['id'].
					"<br/> Nome: " .$rows_pessoas['nome'].
					"<br/> RG: ".$rows_pessoas['rg'].
					"<br/> NOME DO PAI: ".$rows_pessoas['nomePai'].
					"<br/> ESCOLARIDADE: ".$rows_pessoas['escolaridade'].
					"<br/> TELEFONE: ".$rows_pessoas['telefone'].
					"<br/> EMAIL: ".$rows_pessoas['email'].
					"<br/> DATA DE NASCIMENTO: ".$rows_pessoas['nascimento'].
					"<br/> CPF: ".$rows_pessoas['cpf'].
					"<br/> NOME DA MÃE: ".$rows_pessoas['nomeMae'].
					"<br/> PROFISSÃO: ".$rows_pessoas['profissao'].
					"<br/> NÚMERO DO CELULAR: ".$rows_pessoas['celular']. "<br/>"
				;
			}
		}

		public function deletarPessoa($cpf){
			require_once '../_model/pessoasDAO.php';

			$pessoasDB = new pessoasDAO();

			$pessoasDB->deletePessoa($cpf);

			$this->verificarDelete();
		}

		private function verificarDelete(){
			require_once '../_connection/conexao.php';

			$conexao = new Conexao();

			if (mysqli_affected_rows($conexao->getInstancia()) != 0 ){	

				$this->msg = "Pessoa apagada com sucesso!";
				$this->imprimirMensagem();    
			}
			else{ 	

				$this->msg = "Erro em excluir Pessoa, verifique se digitou corretamente!";   
				$this->imprimirMensagem(); 
			}
		}

		private function imprimirMensagem(){
			echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../_view/page_logado.php'>
						<script type=\"text/javascript\">
							alert(\" $this->msg \");
						</script>
				"
			;
		}
	}

?>