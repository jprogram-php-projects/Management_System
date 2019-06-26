document.onreadystatechange = function () {
    setTimeout(function(){
        document.getElementById('load').style.visibility="hidden";
    },2000);
}

function limparCamposLogin(){
	document.getElementById('login').value = null;
	document.getElementById('senha').value = null;
}

function limparCamposCadastro(){
	document.getElementById('nome').value = null;
	document.getElementById('rg').value = null;
	document.getElementById('nomePai').value = null;
	document.getElementById('telefone').value = null;
	document.getElementById('email').value = null;
	document.getElementById('nascimento').value = null;
	document.getElementById('cpf').value = null;
	document.getElementById('nomeMae').value = null;
	document.getElementById('profissao').value = null;
	document.getElementById('celular').value = null;
	document.getElementById('escolaridade').value = null;
}

function voltar(){
	window.location.href = 'page_logado.php';
}

function apagar(){
	
}