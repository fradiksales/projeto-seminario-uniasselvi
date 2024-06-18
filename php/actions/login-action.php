<?php
session_start();
include("../config.php");

if (empty($_POST) or empty($_POST["email"]) or empty($_POST["senha"])) {
  print "<script>location.href='login.php'</script>";
}

$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuario WHERE email='{$email}'";

$res = $conn->query($sql) or die($conn->error);

$row = $res->fetch_object();

$qtd = $res->num_rows;

if ($qtd > 0 and password_verify($senha, $row->senha)) {
  $_SESSION["email"] = $row->email;
  $_SESSION["nome"] = $row->nome;
  $_SESSION["id_usuario"] = $row->id;
  $_SESSION["tipo_usuario"] = $row->tipo;
  print "<script>location.href='../../index.php'</script>";
} else {
  print "<script>alert('Usuário e/ou senha incorretos!')</script>";
  print "<script>location.href='../../login.php'</script>";
}
