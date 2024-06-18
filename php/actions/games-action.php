<?php

/**
 * Página para controlar as ações do CRUD dos games
 */
switch ($_REQUEST["acao"]) {
  case "cadastrar":
    $nome = $_POST["nome"];
    $genero = $_POST["genero"];
    $plataforma = $_POST["plataforma"];
    $imagem = $_POST["imagem"];
    $preco = $_POST["preco"];

    $sql = "INSERT INTO games (nome, genero, plataforma, imagem, preco) VALUES ('{$nome}', '{$genero}', '{$imagem}', '{$plataforma}', {$preco})";

    $resposta = $conn->query($sql);

    if ($resposta == true) {
      echo "<script>alert('Game cadastrado com sucesso!')</script>";
      echo "<script>location.href = '?'</script>";
    } else {
      echo "<script>alert('Não foi possível cadastrar o game!')</script>";
      echo "<script>location.href = '?page=novo'</script>";
    }
    break;
  case "editar":
    break;
  case "excluir":
    break;
  case "alugar":
    $id = $_REQUEST["id"];
    $id_usuario = $_SESSION["id_usuario"];

    $sql = "SELECT * FROM aluguel_game WHERE usuario_id={$id_usuario} AND game_id={$id}";

    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
      echo "<script>alert('Você já alugou este game!')</script>";
      echo "<script>location.href = '?'</script>";
      exit;
    }

    $sql = "UPDATE games SET qtd_disponivel = qtd_disponivel - 1 WHERE id={$id}";

    $res = $conn->query($sql);

    if ($res == false) {
      echo "<script>alert('Não foi possível alugar o game!')</script>";
      echo "<script>location.href = '?'</script>";
      exit;
    }

    $sql = "INSERT INTO aluguel_game (usuario_id, game_id) VALUES ({$id_usuario}, {$id})";

    $resposta = $conn->query($sql);

    if ($resposta == true) {
      echo "<script>alert('Game alugado com sucesso!')</script>";
      echo "<script>location.href = '?'</script>";
    } else {
      echo "<script>alert('Não foi possível alugar o game!')</script>";
      echo "<script>location.href = '?'</script>";
    }
    break;
  case "devolver":
    $id = $_REQUEST["id"];
    $id_usuario = $_SESSION["id_usuario"];

    $sql = "DELETE FROM aluguel_game WHERE usuario_id={$id_usuario} AND game_id={$id}";

    $res = $conn->query($sql);

    $sql = "UPDATE games SET qtd_disponivel = qtd_disponivel + 1 WHERE id={$id}";

    $res = $conn->query($sql);

    if ($res == true) {
      echo "<script>alert('Game devolvido com sucesso!')</script>";
      echo "<script>location.href = '?page=meus-games'</script>";
    } else {
      echo "<script>alert('Não foi possível devolver o game!')</script>";
      echo "<script>location.href = '?page=meus-games'</script>";
    }
    break;
  default:
    break;
}
