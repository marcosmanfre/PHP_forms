<?php
include("conecta.php");

$email = $_POST["email"];
$senha = $_POST["senha"];

try {

	$stmt = $conn->prepare("SELECT * FROM `usuarios` WHERE `email` = :email AND `senha` = :senha");
	$stmt->bindParam("email",$email);
	$stmt->bindParam("senha",$senha);
	$stmt->execute();

	$res = $stmt->fetchAll();
	
	if(count($res) > 0) {	
		foreach ($res as $row) {
			$id = $row['id'];
		}
			if(!isset($_SESSION))
				session_start();
			$_SESSION['id_usuario'] = $id;
			
			header("Location:restrito.php");

  }
  else {
      header("Location:login.php?msg=Falha no Login");
  }

} catch(PDOException $e) {
	$e->getMessage();
}

$conn = null;
$stmt = null;
?>