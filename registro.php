<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Formulário de Registro</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #d8f3dc; /* Light green color */
    }

    h2 {
      text-align: center;
      color: #283618; /* Dark green text color */
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      max-width: 300px;
      margin: 0 auto;
      background-color: #fff; /* White background color */
      padding: 20px;
      border-radius: 5px;
    }

    label {
      font-weight: bold;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      padding: 5px;
      margin-bottom: 10px;
      width: 100%;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #8bd5af; /* Light green color */
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #77c99e; /* Darker shade of green on hover */
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
        echo '<div id="popup-container"><p>Usuário já cadastrado.</p><button id="close-button">Fechar</button></div>';
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
  <h2>Registro de Usuário</h2>
  <form action="processar_registro.php" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required><br><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    
    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required><br><br>
    
    <input type="submit" value="Registrar">
  </form>
</body>
</html>

