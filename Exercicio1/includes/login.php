<?php

if(isset($_POST['nome']) && isset($_POST['senha'])) {

    include('includes/conexao.php');

    $erro = false;
    $nome = $mysqli->escape_string($_POST['nome']);
    $senha = $_POST['senha'];
    $admin = $_POST['admin'];

    $sql_code = "SELECT * FROM usuarios WHERE nome = '$nome'";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
    $mysqli -> close();
    
    if($sql_query->num_rows == 0) {
        $erro= "O nome informado é incorreto";
    } else {
        $usuario = $sql_query->fetch_assoc();
        if(!password_verify($senha, $usuario['senha'])) {
            $erro= "A senha informada está incorreta";
        } else {
            if(!isset($_SESSION))
                session_start();
            $_SESSION['usuario'] = $usuario['id'];
            $_SESSION['admin'] = $usuario['admin'];
            header("Location: principal.php");
        }
    }

    if($erro)
      $erro ="<p style='color:white;'><b>$erro</b></p>";

}

?>