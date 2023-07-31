<?php
  include('includes/cadastrar.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./lib/style.css"> 
    <title>Cadastrar Usuario</title>
</head>
<body>
    <section> 
        <div class="signin"> 
            <div class="content"> 
                 <?php if(isset($erro) && ($erro)) echo $erro; ?>
                 <a style="color:white;" href="login.php">Voltar</a>
                <div class="form"> 
                    <form enctype="multipart/form-data" method="POST" action="">
                            <div class="inputBox"> 
                              <input value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" name="nome" type="text"  type="text" required> <i>Nome</i> 
                            </div>
                        <br/>
                            <div class="inputBox"> 
                              <input value="<?php if(isset($_POST['telefone'])) echo $_POST['telefone']; ?>"  placeholder="(11) 98888-8888" name="telefone" type="text" required> <i>Telefone</i> 
                            </div>
                        <br/>
                            <div class="inputBox"> 
                              <input value="<?php if(isset($_POST['nascimento'])) echo $_POST['nascimento']; ?>" placeholder="(11) 11/11/1111" name="nascimento" type="text" required> <i>Nascimento</i> 
                            </div>
                        <br/>
                            <div class="inputBox"> 
                              <input value="<?php if(isset($_POST['senha'])) echo $_POST['senha']; ?>" name="senha" type="text" required> <i>Senha</i> 
                            </div>
                        <br/>
                            <div style="color:white;"> 
                               <input name="admin" value="1" type="radio"> ADMIN
                               <input name="admin" value="0" checked type="radio"> CLIENTE
                             </div> 
                        <br/>
                            <div class="inputBox"> 
                              <input type="submit" value="Salvar"> 
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>