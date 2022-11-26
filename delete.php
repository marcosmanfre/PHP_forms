<?php
require("autentica.php");
require("conecta.php");
$id = "";
if(!isset($_SESSION))
	session_start();
$id = $_SESSION['id_usuario'];

$sql = 'DELETE FROM usuarios WHERE id=:id';
$stm = $conn->prepare($sql);
if ($stm->execute([':id' => $id])) {
    header("Location:index.php");
}