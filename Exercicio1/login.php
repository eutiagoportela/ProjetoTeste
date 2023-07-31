<?php
  include('includes/login.php');
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
            <h2>Acesse o Sistema</h2> 
            <?php if(isset($erro) && ($erro)) echo $erro; ?>
            <div class="form"> 
               <form action="" method="post">
                    <div class="inputBox"> 
                        <input type="text" name="nome" required> <i>Usuário</i> 
                    </div> 
                    <br/>
                    <div class="inputBox"> 
                        <input type="password" name="senha" required> <i>Senha</i> 
                    </div> 
                    <br/>
                        <div class="links"> <a style="color:white;" href="cadastrar_usuario.php">Cadastre-se</a> </div> 
                    <br/>
                    <div class="inputBox"> 
                        <input type="submit" value="Entrar"> 
                    </div> 
                 
                </form>
            </div> 
        </div> 
    </div> 
  </section>
</body>
</html>