<?php
function conectar($host,$usuario,$senha,$banco){
	// Estabele a conexão com o banco de dados
	$conexao = mysqli_connect($host,$usuario,$senha,$banco);

	// Verifica se houve erro na conexão 
	if (mysqli_connect_errno()){
		echo "Falha ao conectar ao banco de dados: ".mysqli_connect_error();
		return null;
	}

	// Define o conjunto de caracteres para UTF-8
	mysqli_set_charset($conexao,"utf8");

	// Retorna a conexão estabelecida
	return $conexao;
}

function desconectar($conexao){
	// Fecha a conexão com o banco de dados 
	mysqli_close($conexao);
}
?>

