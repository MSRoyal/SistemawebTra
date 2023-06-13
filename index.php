<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Formulário de Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #e8f6e8; /* Light green background color */
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      width: 300px;
      padding: 30px;
      background-color: #ffffff; /* White background color */
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); /* Box shadow effect */
    }

    h2 {
      text-align: center;
      color: #333; /* Dark gray text color */
      margin-bottom: 30px;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: bold;
      margin-bottom: 10px;
      color: #333; /* Dark gray text color */
    }

    input[type="email"],
    input[type="password"] {
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc; /* Light gray border */
      border-radius: 4px;
    }

    input[type="submit"] {
      background-color: #8bd5af; /* Light green button color */
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      border-radius: 4px;
    }

    input[type="submit"]:hover {
      background-color: #77c99e; /* Darker shade of green on hover */
    }
    .btn {
      margin-top: 20px;
      display: flex;
      justify-content: center;
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
  </style>
</head>
<body>
<?php
    if (isset($_GET['erro']) && $_GET['erro'] == 1) {
        echo '<div id="popup-container"><p>Credenciais incorretas.</p><button id="close-button">Fechar</button></div>';
}
    if (isset($_GET['erro']) && $_GET['erro'] == 2) {
        echo '<div id="popup-container"><p>Usuário não encontrado.</p><button id="close-button">Fechar</button></div>';
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
    <h2>Login de Usuário</h2>
    <form action="processar_login.php" method="POST">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      
      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="senha" required>
      
      <input type="submit" value="Entrar">
    </form>
    <div class="btn">
        <a href="registro.php">Registrar</a>
    </div>
  </div>
</body>
</html>

