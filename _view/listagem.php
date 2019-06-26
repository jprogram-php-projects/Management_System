<!DOCTYPE html>
	<html>
	<head>
		<title>Listagem</title>
	</head>
	<body>
		<section style="text-align: center;">
			<button onclick="voltar()">Voltar</button>
			<button>Apagar Pessoa</button>
			<button>Sair</button>

			<h1>.: Listagem de Pessoas Cadastradas :.</h1>
			<?php
				require_once '../_control/AdmController.php';
				$adm = new AdmController();
				$adm->listarUsuarios();
			?>
		</section>
		<script type="text/javascript" src="../_config/_js/script.js"></script>	 
	</body>
</html>