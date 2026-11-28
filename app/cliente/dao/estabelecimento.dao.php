<?php

//Inclui a conexão com o banco
require_once dirname(__DIR__, 2) . '../../config/conexao.php';

function buscarEstabelecimento(mysqli $conn, int $idCliente): ?array
{
  $sql = "SELECT te.nome AS estabelecimento, tu.nome AS cliente
FROM t_usuario tu
INNER JOIN t_estabelecimento te ON te.id = tu.idestabelecimento
WHERE tu.id = ?
LIMIT 1";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $idCliente);
  mysqli_stmt_execute($stmt);
  $dados = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
  mysqli_stmt_close($stmt);

  return $dados ?: null;
}
