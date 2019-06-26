<?php
	session_start();

	class LoginController{
		private $dados, $msg;

		/*	
		*	Metodo construtor que recebe todos os valores digitados
		*	no login e armazena na variavel dados
		*/
		public function __construct($campos){
			$this->dados = $campos;
			$this->validaCampos();
		}

		/*  Verifica se o que o usuário digitou está de acordo com os requisitos 
		*	Caso esteja tudo certo, chama o metodo login e verifica no banco os dados digitados
		*/
		private function validaCampos(){
			if( $this->verificaLogin() and $this->verificaSenha() ){
				$this->logar();
			}
			else{

				$this->msg = "Login ou Senha incorretos, Por favor preencha corretamente";
				$this->imprimirMensagem();
			}			
		}

		/* 
		* 	Metodos verificaLogin() e verificaSenha() são metodos para garantir 
		*	que os requisitos da atividades sejam respeitados.
		*/
		private function verificaLogin(){
			if($this->dados['login'] == " " or strlen($this->dados['login']) < 3){
				return false;
			}
			return true;
		}

		private function verificaSenha(){
			if( $this->dados['senha'] == " " or (strlen($this->dados['senha']) < 3 or strlen($this->dados['senha']) > 8 ) ){
				return false; 
			}
			return true;
		}

		/* Verifica se os dados ja esta cadastrado no banco de dados. */
		private function logar(){
			require_once '../_model/userDAO.php';

			$userDB = new userDAO($this->dados['login']);

			$result = $userDB->selectUser();
            
            if ($result and $result-> num_rows != 0) {

                $row_usuario = mysqli_fetch_array($userDB->selectUser());

	            $this->validaSenha($row_usuario);
			}
			
			else{
				$this->msg = "Usuario não reconhecido!!";
				$this->imprimirMensagem();
			}			
		}

		/* 
		*	Valida se a senha que o usuario digitou no login
		*	é a mesma que esta cadastrada no banco.
		*/
		private function validaSenha($row_usuario){
			if ($this->dados['senha'] == $row_usuario['senha']) {
	            $_SESSION['id'] = $row_usuario['id'];
	            $_SESSION['nome'] = $row_usuario['nome'];
	            $_SESSION['login'] = $row_usuario['login'];
	            $_SESSION['senha'] = $row_usuario['senha'];

				header('Location: ../_view/page_logado.php');
			}
			else{
				$this->msg = "Senha Incorreta!!";
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

	// Verifica se o metodo utilizado no form de login eh POST
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$validaLogin = new LoginController($_POST);
	}
?>