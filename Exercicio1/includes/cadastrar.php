<?php
    
function limpar_texto($str){ 
    return preg_replace("/[^0-9]/", "", $str); 
}

if(count($_POST) > 0) {

    include('includes/conexao.php');
    include('includes/formatacao.php');

    $erro = false;
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $nascimento = $_POST['nascimento'];
    $senha_descriptografada = $_POST['senha'];
    $admin = $_POST['admin'];

    if(strlen($senha_descriptografada) < 6 && strlen($senha_descriptografada) > 16) {
        $erro = "A senha deve ter entre 6 e 16 caracteres.";
    }

    if(empty($nome)) {
        $erro = "Preencha o usuario";
    }

    if(!empty($nascimento)) { 
        $pedacos = explode('/', $nascimento);
        if(count($pedacos) == 3) {
            $nascimento = implode ('-', array_reverse($pedacos));
        } else {
            $erro = "A data de nascimento deve seguir o padrão dia/mes/ano.";
        }
    }

    if(!empty($telefone)) {
        $telefone = limpar_texto($telefone);
        if(strlen($telefone) != 11)
            $erro = "O telefone deve ser preenchido no padrão (11) 98888-8888";
    }


    if($erro) {
        $erro ="<p style='color:white;'><b> $erro</b></p>";
    } else {
        $senha = password_hash($senha_descriptografada, PASSWORD_DEFAULT);

            $sql_code = "INSERT INTO usuarios (nome, senha, telefone, nascimento, data,admin) 
        VALUES ('$nome', '$senha', '$telefone', '$nascimento', NOW(),'$admin')";

        $deu_certo = $mysqli->query($sql_code);
        $mysqli -> close();
        if($deu_certo) {
            echo "<p><b>Usuário cadastrado com sucesso!!!</b></p>";
            unset($_POST);
            header("Location: login.php");
        }
        else
          $erro ="<p style='color:white;'><b>ERRO: $mysqli->error</b></p>"; 
    }

}

?>
