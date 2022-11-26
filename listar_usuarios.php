<h1> Listar Usuários </h1>

<?php

require("conecta.php");

    $result_msg_cont = "SELECT * FROM usuarios ORDER BY id ASC";

    $resultado_msg_cont = $conn->prepare($result_msg_cont);
    $resultado_msg_cont->execute();

    while($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)){
        echo "ID: " . $row_msg_cont['id'] . "<br>";
        echo "Nome: " . $row_msg_cont['nome'] . "<br>";
        echo "Email: " . $row_msg_cont['email'] . "<br><hr>";
    }
?>