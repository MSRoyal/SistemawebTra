<?php
include "conexao_bd.php";
include "funcoes_bd.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // Obter os valores do formulário
    $senha = $_POST["senha_atual"];
    $id = $_SESSION['id'];
    $condicao = "id = '$id'";
    
    // Conexão com o banco de dados
	$host = "localhost";
	$user = "u913739415_luisa";
	$senha_bd = "Fany@5657";
	$banco = "u913739415_info_registros";
	$tabela = "usuarios";
    $conexao = conectar($host,$user,$senha_bd,$banco);
    
    $registros = consultar($conexao,$tabela,$condicao);
    if ($registros && count($registros)>0){
        $usuario = $registros[0];
        $senha_bd = $usuario["senha"];
    }
    if ($senha == $senha_bd)
    {
        $new_senha = $_POST["nova_senha"];
        $dados = array(
            'senha' => $new_senha
        );
        
        // Verifica se houve erro na conexão
        if (mysqli_connect_errno()){
            echo "Falha ao conectar ao banco de dados: ".mysqli_connect_error();
        } else {
            if (alterar($conexao,$tabela,$dados,$condicao)){
              header("Location: alterar_senha.php?sucesso=2");
              exit();
            }
        }
    } else {
        header("Location: alterar_senha.php?erro=3");
        exit();
    }
}
desconectar($conexao);
?>
