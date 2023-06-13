<?php
// Iniciar a sessão
session_start();
include "conexao_bd.php";
include "funcoes_bd.php";

// Verificar se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os valores do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Conexão com o banco de dados
	$host = "localhost";
	$user = "u913739415_luisa";
	$senha_bd = "Fany@5657";
	$banco = "u913739415_info_registros";
	$tabela = "usuarios";

    $conexao = conectar($host, $user, $senha_bd, $banco);

    // Buscar o usuário com o email fornecido
    $condicao = "email = '$email'";
    $registro = consultar($conexao, $tabela, $condicao);

    if ($registro && count($registro) > 0) {
        $row = $registro[0]; // Obter o primeiro registro
        $senha_bd = $row["senha"];

        if ($senha == $senha_bd) {

            // Definir as variáveis de sessão
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $row["id"];

            // Redirecionar para a página de perfil
            header("Location: perfil.php");
            exit();
        } else {
            // Credenciais incorretas, exibir uma mensagem de erro
            header("Location: index.php?erro=1");
            exit();
        }
    } else {
        // Usuário não encontrado, exibir uma mensagem de erro
        header("Location: index.php?erro=2");
        exit();
    }
}
?>
