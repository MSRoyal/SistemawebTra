<?php
session_start();
include_once "conexao_bd.php";
include_once "funcoes_bd.php";

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    // Obter os valores do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    // Realizar validações
    $erros = array();
    
    // Validar se o nome está preenchido e é válido
    if (empty($nome)){
        $erros[] = "O campo 'Nome' é obrigatório.";
    } elseif (!preg_match("/^[\p{L}\p{M}\s]+$/u", $nome)){
        $erros[] = "O campo 'Nome' só pode conter letras e espaços.";
    }
    
    // Verificar se o email está preenchido e é válido
    if (empty($email)){
        $erros[] = "O campo 'Email' é obrigatório.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erros[] = "O email inserido é inválido.";
    }
    
    // Verificar se a senha está preenchida
    if (empty($senha)){
        $erros[] = "O campo 'Senha' é obrigatório.";
    }
    
    // Se houver erros, exibir as mensagens
    if (!empty($erros)){
        foreach ($erros as $erro){
            echo "<p>$erro</p>";
        }
    } else {
        // Conexão com o banco de dados
	    $host = "localhost";
	    $user = "root";
	    $senha_bd = "";
	    $banco = "gerenciar_login";
	    $tabela = "usuarios";
        
        $conexao = conectar($host,$user,$senha_bd,$banco);
        // Verifica se houve erro na conexão
        if (mysqli_connect_errno()){
            echo "Falha ao conectar ao banco de dados: ".mysqli_connect_errno();
        } else {
            $condicao = "email = '$email'";
            $registro = consultar($conexao, $tabela, $condicao);
            
            if ($registro && count($registro) > 0)
            {
                header("Location: registro.php?erro=1");
                exit();
            }
            $dados = array(
                'nome' => $nome,
                'email' => $email,
                'senha' => $senha
            );
            
            $id = incluir($conexao,$tabela,$dados);
            
            if ($id){
                echo "Registro incluído com sucesso. ID: $id";
            } else {
                echo "Erro ao incluir registro.";
            }
        }
        
        desconectar($conexao);
    }
}
// Redirecionar para a página de login
header("Location: index.php");
exit();
?>
