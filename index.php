<?php

$nome = $email = $senha = $confirmacao_senha = "";
$nomeError = $emailError = $senhaError = $confirmacao_senhaError = "";



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

$usuarios = array($email);

 

if ($_SERVER["REQUEST_METHOD"] == "POST") 
	if (empty($_POST["nome"])) {
	  $nomeError = "O campo nome não pode estar vazio.";
	} else {
	  $nome = test_input($_POST["nome"]);
		if (!preg_match("/^[a-zA-Z-' [0-]*$/",$nome)) {
			$nomeError = "O campo nome deve conter entre 3 e 50 caracteres, digite apenas letras e espaço em branco";
		}
		if(strlen($nome)<3){
		
			$nomeError = "O campo nome deve conter entre 3 e 50 caracteres, digite apenas letras e espaço em branco";
		}
		if(strlen($nome)>50){
			
			$nomeError = "O campo nome deve conter entre 3 e 50 caracteres, digite apenas letras e espaço em branco";
		}
		}
		
		

	if (empty($_POST["email"])) {
		$emailError = "O campo e-mail não pode estar vazio.";
	  } else {
		$email = test_input($_POST["email"]);	
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailError = "O e-mail informado não contém um formato válido";
		}
	  }


	if (empty($_POST["senha"])) {
		$senhaError = "O campo senha não pode estar vazio.";    
	
	} else {
		$senha = test_input($_POST["senha"]);	
		if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $senha)){		
			echo "Senha Forte.";
		} else {
			$senhaError = "O campo senha precisa ter no mínimo 8 dígitos contendo letras maiúsculas e minúsculas, números, caracteres especiais e não conter sequências.";  
		}
	}
	if (empty($_POST["confirmacao_senha"])) {
		$confirmacao_senhaError = "O campo confirmação de senha não pode estar vazio.";

    } else {
		$confirmacao_senha = test_input($_POST["confirmacao_senha"]);	
		if ($_POST["senha"] === $_POST["confirmacao_senha"]) {			
			echo ("senha e confirmação de senha ok");
		}
		else {
			$confirmacao_senhaError = "O campo senha e confirmação de senha não conferem.";
		}
  	} 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Usuário</title>
</head>
<body>
<h2>Formulário de Cadastro PHP</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

	<label>Nome:
		<input type="text" name="nome" id="nome"><br>
		<span class="error"> <?php echo $nomeError;?></span><br>
	</label>

	<label>E-mail:
		<input type="text" name="email" id="email[]"><br>
		<span class="error"> <?php echo $emailError;?></span><br>
		
	</label>
	<label>Senha:
		<input type="password" name="senha" id="senha"><br>
		<span class="error"> <?php echo $senhaError;?></span>
	</label><br>

	<label>Confirmar Senha:
		<input type="password" name="confirmacao_senha" id="confirmacao_senha"><br>
		<span class="error"> <?php echo $confirmacao_senhaError;?></span><br>
	</label>
	<input type="submit" name="submit" value="Submit">  

</form>

<?php
echo "<h2>Aqui estão os dados informados</h2>";
foreach ($usuarios as $chave => $valor) {
	echo "$chave: $valor<br>";
}
?>

</body>
</html>