<?php
    //Header
    include_once 'includes/header.php';
    include('includes/principal.php');
?>

<div class="row">
    <div class="col s12 m8 push-m2">
        <h3 class="light">Lista de Usuários</h3>
        <table class="striped" >
            <thead>
                <tr>
                    <th>Name:</th>
                    <th>Telefone:</th>
                    <th>Nascimento:</th>
                    <th>Data Cadastro:</th>
                </tr>
            </thead>
            <body>
                <?php

                //Check if any data has been returned
                if (mysqli_num_rows($query_usuarios) > 0):
                    while ($usuario = $query_usuarios->fetch_assoc()){
                    ?>
                    <tr>
                        <!-- Information from database -->
                        <td><?php echo $usuario['nome'] ?></td>
                        <td><?php echo $usuario['telefone'] ?></td>
                        <td><?php echo $usuario['nascimento'] ?></td>
                        <td><?php echo $usuario['data'] ?></td>

                        <!-- Buttons edit and delete -->
                        <td><a href="editar_usuario.php?id=<?php echo $usuario['id'] ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                        <td><a href="#modal<?php echo $usuario['id'] ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

                        <!-- Modal Structure -->
                        <div id="modal<?php echo $usuario['id'] ?>" class="modal">
                            <div class="modal-content">
                                <h4>Ola!</h4>
                                <p>Deseja realmente excluir o usuario?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="includes/deletar.php" method="post">
                                    <!-- Buttons inside modal -->
                                    <input type="hidden" name="id" value="<?php echo $usuario['id'] ?>">
                                    <button type="submit" name="btn-delete" class="btn red">Excluir</button>
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </tr>
                    <?php }
                        else:?>
                        <tr>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                        </tr>
                    <?php
                        endif;
                    ?>
            </body>
        </table>
        <br>
        <a href="cadastrar_usuario.php" class="btn"> Adicionar Usuario</a>
    </div>
</div>

<?php
    //Footer
    include_once 'includes/footer.php';
?>



