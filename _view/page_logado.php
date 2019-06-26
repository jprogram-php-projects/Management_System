<?php 
	session_start(); 
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Pagina apos logar</title>
	</head>

	<body>
		<h1><?php echo 'Seja Bem Vindo '. $_SESSION['nome']; ?></h1>
		<form method="POST">
			<button type="button" onclick="window.location.href = 'listagem.php';">Listagem</button>

			<button type="button" onclick="window.location.href = 'DeleteConta.php';">Excluir Conta</button>

			<button type="button" onclick="window.location.href = '../_control/Sair.php';">Sair</button>
		</form>
		<script type="text/javascript" src="../_config/_js/script.js"></script>
	</body>
</html>