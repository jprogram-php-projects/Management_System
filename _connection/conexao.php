<?php

	class Conexao {
	    private $servidor;
	    private $usuario;
	    private $senha;
	    private $banco_dados;
	    private $conexao;

	    public function __construct(){
	    	try{
	    		$this->configuraBanco();
	    		$this->conexao = $this->criarConexao();
	    	}
	    	catch(Exception $e){
	    		echo $e;
	    	}
	    }
		
	    private function configuraBanco(){
	    	$this->servidor = "localhost";
	    	$this->usuario = "root";
	    	$this->senha = "";
	    	$this->banco_dados = "login";
	    }

	    private function criarConexao(){
	        $conn = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->banco_dados);
	        return $conn;
	    }

	    public function getInstancia(){
	    	return $this->conexao;
	    }
	}
?>