<?php
include "conexao_bd.php";
include "funcoes_bd.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST["email"];
    $nome = $_POST["nome"];
    
    // Conexão com o banco de dados
	$host = "localhost";
	$user = "u913739415_luisa";
	$senha_bd = "Fany@5657";
	$banco = "u913739415_info_registros";
	$tabela = "usuarios";
    
    $conexao = conectar($host,$user,$senha_bd,$banco);
    
    if (mysqli_connect_errno()){
        echo "Falha ao conectar ao banco de dados: ".mysqli_connect_error();   
    } else {
        $dados = array(
            'nome' => $nome,
            'email' => $email
        );
        $id = $_SESSION["id"];
        $condicao = "id = '$id'";
        
        if (alterar($conexao,$tabela,$dados,$condicao)){
           header("Location: edicao.php?sucesso=1");
           exit();
        }
    }
}
desconectar($conexao);
?>
