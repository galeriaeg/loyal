<?php
//Inclui a conexão com o banco
require_once dirname(__DIR__, 2) . '../../config/conexao.php';

function buscarCartao(mysqli $conn, int $idCliente): ?array
{
  $sql = "SELECT * FROM t_cartao_fidelidade WHERE idcliente = ? LIMIT 1";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $idCliente);
  mysqli_stmt_execute($stmt);
  $cartao = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
  mysqli_stmt_close($stmt);

  return $cartao ?: null; // null se não existir
}
