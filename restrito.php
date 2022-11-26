<?php 
require("autentica.php");
require("conecta.php");
$id = "";
if(!isset($_SESSION))
	session_start();
$id = $_SESSION['id_usuario'];

try {
	$stmt = $conn->prepare("SELECT * FROM `usuarios` WHERE `id` = :id");
	$stmt->bindParam("id",$id);
	$stmt->execute();

	$res = $stmt->fetchAll();
	
	if(count($res) > 0) {	

            
		foreach ($res as $row) {
			$nome = $row['nome'];
			$email = $row['email'];
			$senha = $row['senha'];
		}
  

  }
  else {
      header("Location:login.php");
  }

} catch(PDOException $e) {
	$e->getMessage();
}

$conn = null;
$stmt = null;
?>
 <!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Área Restrita</title>



<div class="container">
  <div class="card mt-5">
  <div class="card-header">
      <h2>Área restrita</h2>
      <p>Olá <?= $nome ?>
      <p>Conteúdo restrito a usuários cadastrados</p>
      <p><a href="sair.php">Sair</a>
      <p><a href="listar_usuarios.php">Listar Usuários Cadastrados</a></p>
    </div>
    <div class="card-header">
      <h2>Usuários</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>Nome</th>
          <th>Email</th>
          <th>Senha</th>
          <th>Ação</th>
        </tr>
        <?php foreach($res as $row): ?>
          <tr>
            
            <td><?= $nome = $row['nome']; ?></td>
            <td><?= $email = $row['email']; ?></td>
            <td><?= $senha = $row['senha']; ?></td>
            
            <td>
              <a href="cadastro_edit.php" class="btn btn-info">Editar</a>
              <a onclick="return confirm('Você tem certeza que deseja excluir o seu usuário?')" href="delete.php" class='btn btn-danger'>Deletar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
</body>
</html>