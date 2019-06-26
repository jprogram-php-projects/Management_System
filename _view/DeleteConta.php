<?php

	if(isset($_POST['cpfDeletar'])){
		require_once '../_control/AdmController.php';
		$adm = new AdmController();
		$adm->deletarPessoa($_POST['cpfDeletar']);
	}

?>


<!DOCTYPE html>

<html>
	<head>
		<title>Excluir Conta</title>
	</head>

	<body>
		<form method="POST" action="">
			<label>Digite o CPF que quer apagar:</label>
			<input type="text" name="cpfDeletar">
			<button type="submit">Enviar</button>
		</form>
	</body>
</html>