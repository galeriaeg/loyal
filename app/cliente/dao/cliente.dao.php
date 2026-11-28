<?php
//Inclui a conexão com o banco
require_once dirname(__DIR__, 2) . '../../config/conexao.php';

function buscarCliente(mysqli $conn, int $idCliente): ?array
{
  $sql = "SELECT * FROM t_cliente WHERE id = ? LIMIT 1";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $idCliente);
  mysqli_stmt_execute($stmt);
  $clienteDados = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
  mysqli_stmt_close($stmt);

  return $clienteDados ?: null; // null se não existir
}
