<?php
include "../session.php";
$usuarioLogado = $_SESSION["idUsuarioLogado"];

require_once __DIR__ . '/dao/estabelecimento.dao.php';
require_once __DIR__ . '/dao/cartao.dao.php';
require_once __DIR__ . '/dao/cliente.dao.php';

$estab = buscarEstabelecimento($conn, $usuarioLogado);
$cliente = buscarCliente($conn, $usuarioLogado);
$cartao = buscarCartao($conn, $usuarioLogado);
?>
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

  <div class="content">
    <header class="coltop mb">
      <h4><?= htmlspecialchars($estab['estabelecimento']) ?></h4>
      <a href="../../logout.php">
        <img src="assets/img/btn-bars-mob.png" class="btn-menu" alt="btn-menu" />
      </a>
    </header>


    <main class="colmain">

      <div class="col12 mb">
        <div class="box-id-user">ID:<?= $cartao['id']; ?></div>
        <img src="assets/img/<?= htmlspecialchars($cliente['foto']) ?>" class="img-user" alt="usuario" />
      </div>

      <!-- CLIENTE -->
      <section class="col12 mb">
        <div class="card">
          <h5><strong class="">Cliente:</strong></h5>
          <div class="mt-p">
            <?= htmlspecialchars($cliente['nome']) ?><br />
            <?= htmlspecialchars($cliente['email']) ?><br />
            <?= htmlspecialchars($cliente['cel']) ?>
          </div>
        </div>
      </section>

      <!-- CARD CARTÃO -->
      <section class="col12">
        <div class="card" onclick="expandir();" style="cursor:pointer;">
          <div style="cursor:pointer;display: flex; align-items: center;justify-content: space-between;">
            <h5><strong>Cartão fidelidade:</strong></h5>
            <img src="./assets/img/seta.svg" alt="seta" id="icon" class="icon-arrow" />
          </div>

          <!-- dias -->
          <div style="display:none" id="details" class="mt">
            <span class="tag-status"><?= htmlspecialchars($cartao['status']) ?></span>
            <span class="tag-id-card">Cod: <?= htmlspecialchars($cartao['id']) ?></span>
            <br />
            Início: <?= htmlspecialchars($cartao['dtinicio']) ?><br />
            Fim: ****

            <?= htmlspecialchars($cartao['metaconsumo']) ?>
            <div id="container" class="grid-container mt-p">
              <?php
              $i = 1;
              while ($i <= ($cartao['metaconsumo'])) {
                echo "<div class='item-box'>$i</div>";
                $i++;
              }
              ?>
            </div>

          </div>
        </div>
      </section>

      <!-- CARD PREMIO -->
      <section class="col12 mt" style="display: none;">
        <div class="card-premio">
          <img src="./assets/img/icon-premio.png" class="icon-premio" alt="premio" />
          PRÊMIO ADQUIRIDO
          <img src="./assets/img/icon-premio.png" style="transform: scaleX(-1);" class="icon-premio" alt="premio" />
        </div>
      </section>

      <div class="col12 mt">
        <input class="button" type="submit" value="Solicitar Validação" />
      </div>

    </main>


  </div>
  <?php $conn->close(); ?>
</body>

</html>