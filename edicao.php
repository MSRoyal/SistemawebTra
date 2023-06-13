<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Editar Informações</title>
  <style>
    body {
      background-color: #eaf5ea; /* Verde claro */
      font-family: Arial, sans-serif;
      text-align: center;
    }
    
    h2, h3 {
      color: #008000; /* Verde */
    }
    
    form {
      margin-bottom: 20px;
    }
    
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }
    
    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="submit"] {
      width: 300px;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #008000; /* Verde */
      border-radius: 5px;
      font-size: 16px;
    }
    
    input[type="submit"] {
      background-color: #008000; /* Verde */
      color: #ffffff;
      cursor: pointer;
    }

    #popup-container {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 300px;
      height: 200px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }
    
    #popup-container p {
      text-align: center;
      padding: 20px;
      font-size: 18px;
    }

    #popup-container button {
      display: block;
      margin: 0 auto;
      padding: 10px 20px;
      font-size: 16px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
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
<?php
    if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1) {
        echo '<div id="popup-container"><p>Registro alterado com sucesso.</p><button id="close-button">Fechar</button></div>';
}
?>
<script>
  // Obtenha o elemento do botão de fechar pelo seu ID
  var closeButton = document.getElementById("close-button");

  // Adicione um ouvinte de evento para o clique no botão de fechar
  closeButton.addEventListener("click", function() {
    // Oculte o pop-up definindo o estilo de exibição como "none"
    var popup = document.getElementById("popup-container");
    popup.style.display = "none";
  });
</script>
  <div class="container">
    <h2>Perfil do Usuário</h2>
    
    <div class="edit-info">
      <h3>Editar Informações</h3>
      <form action="processar_edicao.php" method="POST">
        <?php
        session_start();
        include "conexao_bd.php";
        include "funcoes_bd.php";
        
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
	      }
        echo "<label for='nome'>Nome:</label>";
        echo "<input type='text' id='nome' name='nome' value='$nome' required>";
        
        echo "<label for='email'>Email:</label>";
        echo "<input type='email' id='email' name='email' value='$email' required>";
        }
        ?>
        <br>
        <input type="submit" value="Salvar Alterações">
      </form>
      <div class="btn">
         <a href="perfil.php">Voltar</a>
      </div>
    </div>
  </div>
</body>
</html>
