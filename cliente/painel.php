<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/reset.css" />
  <link rel="stylesheet" href="./assets/css/cliente.style.css" />
  <script src="./assets/js/cliente.js"></script>
  <title>Loyal</title>
</head>

<body>

  <?php
  require_once '../config/conexao.php';

  $sql = "SELECT nome FROM t_estabelecimento";
  $resultado = $conn->query($sql);
  if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
      $nomeEstabelecimento = $linha['nome'];
    }
  } else {
    echo "Nenhum estabelecimento encontrado.";
  }


  $sql = "SELECT * FROM t_cliente";
  $resultado = $conn->query($sql);
  $imgCliente = "";
  $pathCliente = "./assets/img/";
  if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
      $idCliente = $linha['id'];
      $nomeCliente = $linha['nome'];
      $emailCliente = $linha['email'];
      $celCliente = $linha['cel'];
      $fotoCliente = $linha['foto'];

      $pathClinte = "./assets/img/";
      $imgCliente = !empty($fotoCliente) ? $pathCliente . $fotoCliente : "-";
    }
  } else {
    echo "Nenhum estabelecimento encontrado.";
  }


  $sql = "SELECT * FROM t_cartao_fidelidade WHERE idcliente =  1 ";
  $resultado = $conn->query($sql);
  if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
      $idCartao = $linha['id'];
      $idClienteCartao = $linha['idcliente'];
      $idEstabelecimento = $linha['idestabelecimento'];
      $dtInicioCartao = $linha['dtinicio'];
      $tdFimCartao = $linha['dtfim'];
      $statusCartao = $linha['status'];
    }
  } else {
    echo "Nenhum cartão encontrado.";
  }

  ?>

  <div class="content">
    <header class="coltop mb">
      <h4><?php echo $nomeEstabelecimento; ?></h4>
      <img src="assets/img/btn-bars-mob.png" class="btn-menu" alt="btn-menu" />
    </header>


    <main class="colmain">

      <div class="col12 mb">
        <div class="box-id-user">ID:<?php echo $idCliente ?></div>
        <img src="<?php echo $imgCliente; ?>" class="img-user" alt="usuario" />
      </div>


      <div class="col12 mb">
        <div class="card">
          <h5><strong class="">Cliente:</strong></h5>
          <div class="mt-p">
            <?php echo $nomeCliente; ?><br />
            <?php echo $emailCliente; ?><br />
            <?php echo $celCliente; ?>
          </div>
        </div>
      </div>

      <div class="col12">
        <div class="card" style="cursor:pointer;">

          <details id="dscCard" data-value="00">
            <summary><strong>Cartão fidelidade:</strong></summary>
            <div class="mt-p">
              <span class="tag-status">ATIVO</span> <span class="tag-id-card">Cod: <?php echo $idCartao ?></span><br />
              Início: <?php echo $dtInicioCartao; ?><br />
              Fim: ****
              <div id="container" class="grid-container"></div>
              <script src="js/app.js" defer></script>
            </div>
          </details>
        </div>
      </div>

      <div class="col12 mt">
        <input class="button" type="submit" value="Solicitar Validação" />
      </div>

    </main>


  </div>
  <?php $conn->close(); ?>
</body>

</html>