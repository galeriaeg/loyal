<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/reset.css" />
  <link rel="stylesheet" href="./assets/css/layout.css" />
  <title>Loyal</title>
</head>

<body>
  <div class="content">

    <header>
      <div class="col12">
        <img src="assets/img/logo.png" alt="logo" class="logoEst" />
      </div>
      <h1 class="mb mt">Login</h1>
    </header>

    <main>
      <form action="auth" method="POST">
        <div class="col12 mb">
          <label for="email">E-mail</label>
          <input type="email" id="email" required name="email" class="input" />
        </div>
        <div class="col12 mb">
          <label for="senha">Senha</label>
          <input type="password" id="senha" required name="senha" class="input" />
        </div>
        <div class="col12 mb">
          <input class="button" type="submit" name="btnLogin" value="ENTRAR" />
        </div>
      </form>
    </main>

    <h5 style="text-align: center;"><a href="recuperar-senha" class="a-primay">Recuperar senha</a></h5>

  </div>
</body>

</html>