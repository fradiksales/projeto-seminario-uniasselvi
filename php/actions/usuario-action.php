<?php
  switch ($_REQUEST["acao"]) {
    case 'cadastrar':
      $nome = $_POST["nome"];
      $email = $_POST["email"];
      $senha = $_POST["senha"];
      $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

      $sql = "INSERT INTO usuario (nome, email, senha) VALUES ('{$nome}', '{$email}', '{$senha_hash}')";

      $res = $conn->query($sql);

      if($res == true){
        echo "<script>alert('Usuário Cadastrado com sucesso!')</script>";
        echo "<script>location.href='?page=listar'</script>";
      } else {
        echo "<script>alert('Erro ao cadastrar usuário!')</script>";
        echo "<script>location.href='?page=novo'</script>";
      }
      break;
    case 'editar':
      $nome = $_POST["nome"];
      $email = $_POST["email"];
      $data_nasc = $_POST["data_nasc"];

      $sql = "UPDATE usuario SET nome='{$nome}', email='{$email}' WHERE id=" . $_REQUEST["id"];

      $res = $conn->query($sql);

      if($res == true){
        echo "<script>alert('Usuário atualizado com sucesso!')</script>";
        echo "<script>location.href='?page=listar'</script>";
      } else {
        echo "<script>alert('Erro ao atualizar usuário!')</script>";
        echo "<script>location.href='?page=listar'</script>";
      }
      break;
    case 'excluir':
      $id = $_REQUEST["id"];

      $sql = "DELETE FROM usuario WHERE id=" . $id;

      $res = $conn->query($sql);

      if($res == true){
        echo "<script>alert('Usuário removido com sucesso!')</script>";
        echo "<script>location.href='?page=listar'</script>";
      } else {
        echo "<script>alert('Erro ao remover usuário!')</script>";
        echo "<script>location.href='?page=listar'</script>";
      }
      break;
    
    default:
      # code...
      break;
  }