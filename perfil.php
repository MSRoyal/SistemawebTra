<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Dados Pessoais</title>
  <style>
    body {
      background-color: #eaf5ea; /* Verde claro */
      font-family: Arial, sans-serif;
      text-align: center;
    }
    
    h2, h3 {
      color: #008000; /* Verde */
    }
    
    p {
      font-size: 16px;
      line-height: 1.5;
    }
    
    .btn {
      margin-top: 20px;
    }
    
    .btn a {
      display: inline-block;
      padding: 10px 20px;
      background-color: #008000; /* Verde */
      color: #ffffff;
      text-decoration: none;
      border-radius: 5px;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Perfil do Usuário</h2>
    
    <div class="profile-info">
      <h3>Dados Pessoais</h3>
      <?php
      session_start();
      include "conexao_bd.php";
      include "funcoes_bd.php";
      
      // Verificar se o usuário está autenticado
      if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	  // Conexão com o banco de dados
	  $host = "localhost";
	  $user = "u913739415_luisa";
	  $senha_bd = "Fany@5657";
	  $banco = "u913739415_info_registros";
	  $tabela = "usuarios";

	  $conexao = conectar($host, $user, $senha_bd, $banco);
	  
	  $id = $_SESSION["id"];
	  $condicao = "id = '$id'";
	  $registros = consultar($conexao,$tabela,$condicao);
	  
	  if ($registros && count($registros)>0){
	      $usuario = $registros[0];
	      $nome = $usuario["nome"];
	      $email = $usuario["email"];
	      
	      // Exibir as informações do usuário
	      echo "<p><strong>Nome:</strong> $nome<br>";
	      echo "<strong>Email:</strong> $email</p>";
	  } else {
	      echo "<p>Usuário não encontrado.</p>";
	  }
      } else {
	  // Usuário não autenticado, redirecionar para a página de login
	  header("Location: index.php");
	  exit();
      }
      ?>
      
      <div class="btn">
        <a href="alterar_senha.php">Alterar Senha</a>
        <a href="edicao.php">Editar Informações</a>
        <a href="index.php">Voltar</a>
      </div>
    </div>
  </div>
</body>
</html>

