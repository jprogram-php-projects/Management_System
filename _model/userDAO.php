<?php
	class userDAO{
		private $conexao;
		private $usuario;

		public function __construct($login){
			require_once '../_connection/conexao.php';

			$this->conexao = new Conexao();

			$this->usuario = $login;
		}

		public function selectUser(){
			$query = "SELECT * FROM usuarios WHERE login = '$this->usuario' LIMIT 1";
      
            $resultado_usuario = mysqli_query($this->conexao->getInstancia(), $query);

            return $resultado_usuario;
		}
	}


?>