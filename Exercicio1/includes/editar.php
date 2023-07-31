<?php

if(!isset($_SESSION))
    session_start();

function limpar_texto($str){ 
    return preg_replace("/[^0-9]/", "", $str); 
}

include('includes/conexao.php');
include('includes/formatacao.php');
$id = intval($_GET['id']);


var_dump($_POST);
if(isset($_GET['id']) && count($_POST)==0) {

    $sql_cliente = "SELECT * FROM usuarios WHERE id = '$id'";
    $query_cliente = $mysqli->query($sql_cliente) or die($mysqli->error);
    $cliente = $query_cliente->fetch_assoc();
    $mysqli -> close();

    $erro = false;
    $nome = $cliente['nome'];
    $telefone = $cliente['telefone'];
    $nascimento = $cliente['nascimento'];
    $senha = $cliente['senha'];


    $pedacos = explode('-', $nascimento);
    if(count($pedacos) == 3) 
      $nascimento = implode ('/', array_reverse($pedacos));

    $cliente['nascimento'] = $nascimento;
}

if(count($_POST) > 0) 
{
    $erro = false;
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $nascimento = $_POST['nascimento'];
    $senha = $_POST['senha'];
    $sql_code_extra = "";
    $admin = $_POST['admin'];

    if(!empty($senha)) {
        if(strlen($senha) < 6 && strlen($senha) > 16) {
            $erro = "A senha deve ter entre 6 e 16 caracteres.";
        } else {
            $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
            $sql_code_extra = " senha = '$senha_criptografada', ";
        }
    }

    if(empty($nome)) {
        $erro = "Preencha o Usuario";
    }

    if(!empty($nascimento)) 
    { 
        $pedacos = explode('/', $nascimento);
        if(count($pedacos) == 3) {
            $nascimento = implode ('-', array_reverse($pedacos));
        } else {
            $erro = "A data de nascimento deve seguir o padrão dia/mes/ano.";
        }
    }

    if(!empty($telefone)) 
    {
        $telefone = limpar_texto($telefone);
        if(strlen($telefone) != 11)
            $erro = "O telefone deve ser preenchido no padrão (11) 98888-8888";
    }


    if($erro) {
        $erro ="<p style='color:white;'><b>$erro</b></p>";
    } else {

        $sql_code = "UPDATE usuarios
        SET nome = '$nome', 
        $sql_code_extra
        telefone = '$telefone',
        nascimento = '$nascimento',
        admin = '$admin'
        WHERE id = '$id'";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
        if($deu_certo) {
            echo "<p><b>Usuario atualizado com sucesso!!!</b></p>";
            unset($_POST);
        }
    }
}
?>