<?php
function incluir($conexao, $tabela, $dados) {
  $campos = implode(', ', array_keys($dados));
  $valores = "'" . implode("', '", array_values($dados)) . "'";
  $query = "INSERT INTO $tabela ($campos) VALUES ($valores)";
  
  if (mysqli_query($conexao, $query)) {
    return mysqli_insert_id($conexao); // Retorna o ID do registro inserido
  } else {
    echo "Erro ao incluir registro: " . mysqli_error($conexao);
    return false;
  }
}

function excluir($conexao, $tabela, $condicao) {
  $query = "DELETE FROM $tabela";
  if (!empty($condicao)){
        $query .= " WHERE $condicao";
  }
  
  if (mysqli_query($conexao, $query)) {
    return true;
  } else {
    echo "Erro ao excluir registro: " . mysqli_error($conexao);
    return false;
  }
}

function alterar($conexao, $tabela, $dados, $condicao) {
  $valores = "";
  foreach ($dados as $campo => $valor) {
    $valores .= "$campo = '$valor', ";
  }
  $valores = rtrim($valores, ', ');
  
  $query = "UPDATE $tabela SET $valores WHERE $condicao";
  
  if (mysqli_query($conexao, $query)) {
    return $query;
  } else {
    echo "Erro ao alterar registro: " . mysqli_error($conexao);
    return false;
  }
}

function consultar($conexao, $tabela, $condicao = "") {
  // echo $conexao; // Linha que deve ser removida ou comentada
  $query = "SELECT * FROM $tabela";
  if (!empty($condicao)) {
    $query .= " WHERE $condicao";
  }

  $result = mysqli_query($conexao, $query);
  if ($result) {
    $registros = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $registros[] = $row;
    }
    mysqli_free_result($result);
    return $registros;
  } else {
    echo "Erro na consulta: " . mysqli_error($conexao);
    return false;
  }
}
?>

