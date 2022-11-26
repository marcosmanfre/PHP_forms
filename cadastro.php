<?php
$nome = $email = $senha = $confsenha = "";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Formulário de Cadastro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-
MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script>
        (function() {
            window.addEventListener('load', function() {
                var form = document.getElementById('needs-validation');
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            }, false);
        })();
    </script>
</head>

<body>
    <div class="container mx-auto bg-light mt-1 w-90">
        <section class="row">
            <article class="col-12">

                <h2 id="formulario">Formulário de Cadastro</h2>

                <?php if (isset($_GET["res"])) {
                    $nome = $_GET["nome"];
                    $email = $_GET["email"];
                    $senha = $_GET["senha"];
                    $confsenha = $_GET["confsenha"];
                ?>
                    <div class="alert alert-warning" role="alert">
                        <?= $_GET["res"]; ?>
                    </div>
                <?php } ?>

                <form action="process_cadastro.php" method="post" id="needs-validation" novalidate oninput='confsenha.setCustomValidity(confsenha.value != senha.value ? "" : "")'>
                    <!-- Nome -->
                    <div class="form-group row">
                        <label for="nome" class="col-sm-2 col-form-label col-form-label-sm">Nome*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="nome" name="nome" placeholder="Digite seu nome" required minlength="3" maxlength="50" value="<?= $nome ?>">
                            <small id="nomehelp" class="invalid-feedback">
                                O campo nome deve conter entre 3 e 50 caracteres.
                            </small>
                        </div>
                    </div>
                    <!-- e-mail -->
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label col-form-label-sm">E-mail*</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Digite seu email" required value="<?= $email ?>">
                            <small id="emalhelp" class="invalid-feedback">
                                Verifique o preenchimento do campo e-mail.
                            </small>
                        </div>
                    </div>
                    <!-- senha -->
                    <div class="form-group row">
                        <label for="senha" class="col-sm-2 col-form-label col-form-label-sm">Senha*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="senha" name="senha" placeholder="Digite sua senha" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])(?:([0-9a-zA-Z$*&@#])(?!\1)){8,}$" value="<?= $senha ?>">
                            <small id="senhahelp" class="invalid-feedback">
                                O campo senha deve conter no mínimo 8 caracteres com letras maiúsculas e minúsculas, números, caracteres
                                especiais e não conter sequências.
                            </small>
                        </div>
                    </div>
                    <!-- confirmar senha -->
                    <div class="form-group row">
                        <label for="confsenha" class="col-sm-2 col-form-label col-form-label-sm">Confirmação de senha*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="confsenha" name="confsenha" placeholder="Digite sua confirmação de senha" required value="<?= $confsenha ?>">
                            <small id="confsenhahelp" class="invalid-feedback">
                                Campo confirmação de senha e o campo senha não conferem.
                            </small>
                            <button type="submit" class="btn btn-primary my-1">Enviar</button>
                            <small id="help" class="form-text text-muted">
                                * Campos obrigatórios.
                            </small>
                        </div>
                    </div>
                </form>
                <p><a href="login.php">Voltar</a></p>
            </article>
        </section>
        <footer>
    <div class="bg-secondary p-3" id="rodape">
      <div class="row">
        <div class="col-12">
          <p class="text-center text-light m-0">&copy; Copyright Formulário - Presidente Prudente - 2022
          </p>
        </div>
      </div>
    </div>
  </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-
q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-
ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-
ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <noscript>Atualize seu navegador</noscript>
</body>

</html>