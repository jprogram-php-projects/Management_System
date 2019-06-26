<?php
	session_start();

	class Deslogar{

		public function __construct(){
			$this->destroirSessao();
			$this->imprimirMensagem();
		}

		private function destroirSessao(){
			unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['login'], $_SESSION['senha']);
		}

		private function imprimirMensagem(){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../_view/index.html'>
					<script type=\"text/javascript\">
						alert(\"Deslogado com sucesso!!\");
					</script>
			";
		}
	}

	$sair = new Deslogar();

?>