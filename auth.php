<?php
session_start();
require_once __DIR__ . '/config/conexao.php';

// Só aceita envio do formulário
if (!isset($_POST['btnLogin'])) {
  header("Location: index.php");
  exit();
}

$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';

if ($email === '' || $senha === '') {
  header("Location: index.php?aut=false");
  exit();
}

// Busca o usuário pelo e-mail
$sql = "SELECT id, nome, tipo, senha FROM t_usuario
        WHERE email = ? AND tipo <> 0 AND status = 'ATIVO'
        LIMIT 1";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
mysqli_stmt_close($stmt);
mysqli_close($conn);

// Confere a senha
if ($user && hash_equals($user['senha'], sha1($senha))) {
  session_regenerate_id(true);

  $_SESSION["idUsuarioLogado"]   = $user['id'];
  $_SESSION["nomeUsuarioLogado"] = $user['nome'];
  $_SESSION["tipoUsuarioLogado"] = $user['tipo'];

  if ($_SESSION["tipoUsuarioLogado"] == 2) {
    header("Location: app/cliente/painel.php");
    exit();
  } else {
    header("Location: app/estabelecimento/painel.php");
    exit();
  }
}

header("Location: index.php?aut=false");
exit();
