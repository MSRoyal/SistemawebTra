<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Alterar Senha</title>
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
    if (isset($_GET['sucesso']) && $_GET['sucesso'] == 2) {
        echo '<div id="popup-container"><p>Senha alterada com sucesso.</p><button id="close-button">Fechar</button></div>';
}
    if (isset($_GET['erro']) && $_GET['erro'] == 3) {
        echo '<div id="popup-container"><p>Senha incorreta.</p><button id="close-button">Fechar</button></div>';
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
    
    <div class="change-password">
      <h3>Alterar Senha</h3>
      <form action="processar_alteracao_senha.php" method="POST">
        <label for="senha_atual">Senha Atual:</label>
        <input type="password" id="senha_atual" name="senha_atual" required>
        
        <label for="nova_senha">Nova Senha:</label>
        <input type="password" id="nova_senha" name="nova_senha" required>
        
        <br>
        
        <input type="submit" value="Alterar Senha">
      </form>
      <div class="btn">
         <a href="perfil.php">Voltar</a>
      </div>
    </div>
  </div>
</body>
</html>
