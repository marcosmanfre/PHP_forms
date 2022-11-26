<?php
include("conecta.php");
$nome = $_POST["nome"];
$senha = $_POST["senha"];
$confsenha = $_POST["confsenha"];
function validar($n, $s, $c)
{
    // variável de retorno
    $res = "";
    // validação do campo nome
    if ($n == "")
        $res .= "O campo nome não pode estar vazio.<br>";
    if (strlen($n) < 3 || strlen($n) > 50)
        $res .= "O campo nome deve conter entre 3 e 50 caracteres<br>";
    // validação do campo senha
    if ($s == "")
        $res .= "O campo senha não pode estar vazio.<br>";
    $pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])(?:([0-9a-zA-Z$*&@#])(?!\1)){8,}$/';
    if (!preg_match($pattern, $s))
        $res .= "O campo senha precisa ter no mínimo 8 dígitos contendo letras maiúsculas e minúsculas, números e
caracteres especiais.";
    // validação do campo confirmar senha
    if ($c != $s)
        $res .= "O campo senha e confirmação de senha não conferem.<br>";
}

require("autentica.php");
require("conecta.php");
$id = "";
if(!isset($_SESSION))
	session_start();
$id = $_SESSION['id_usuario'];

$sql = 'SELECT * FROM usuarios WHERE id=:id';
$stm = $conn->prepare($sql);
$stm->execute([':id' => $id ]);
$person = $stm->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['senha']) ) {
  $name = $_POST['name'];
  $email = $_POST['senha'];
  $sql = 'UPDATE usuarios SET name=:name, senha=:senha WHERE id=:id';
  $stm = $conn->prepare($sql);
  if ($statement->execute([':name' => $name, ':email' => $email, ':id' => $id])) {
    header("Location: /");
  }



}

$feedback = validar($nome, $senha, $confsenha);
if ($feedback == "") {
        $stmt = $conn->prepare("UPDATE usuarios SET nome=:nome, senha=:senha WHERE id=:id");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':senha', $senha);

   
    $res = "<p><strong>Os dados abaixo foram recebidos com sucesso!</strong></p><p>Nome: $nome<br>Senha: $senha<br></p>";
} else {
    header("Location:cadastro.php?res=$feedback&nome=$nome&senha=$senha&confsenha=$confsenha");
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-
MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container mx-auto bg-light mt-1 w-90">
        <div class="alert alert-success" role="alert">
            <?= $res ?>
        </div>
        <div>
           

	    <p><a href="login.php">Clique aqui para fazer o Login</a></p>
        </div>
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