<?php
    //Header
    include_once 'includes/header.php';
    include('includes/callAPI.php');

    $resultado=false;

    if(isset($_POST['buscar']))
       $resultado = call_api('https://api.github.com/users/'. $_POST['NomeBuscar'] .'/repos');
    
?>

<div class="row">
    <div class="col s12 m8 push-m2">
        <h3 class="light">Lista de Repositórios</h3>
        <table class="striped" >
            <thead >
                <tr>
                    <form method='post' name='buscar'>
                      <th colspan="4"><input type="text" name="NomeBuscar" placeholder="Informe o usuário do GitHub"><br></th>
                      <th><input type="submit" name="buscar" class="btn" value="Buscar"><br><br></th>
                   </form>
                </tr> 
                <tr>
                    <th>Name</th>
                    <th>Descrição</th>
                    <th>Estrelas</th>
                    <th>Linguagem</th>
                    <th>Data de Criação</th>
                </tr>
            </thead>
            <body>
                <?php
                
                if($resultado)
                {
                  
                    foreach ($resultado as $dados) {
                 ?>
                        <tr>
                            <td><?php echo $dados->name ?></td>
                            <td><?php echo $dados->description ?></td>
                            <td><?php echo $dados->stargazers_count ?></td>
                            <td><?php echo $dados->language ?></td>
                            <td><?php echo date('d-m-Y h:i:s', strtotime($dados->created_at)) ?></td>
                        </tr>
                <?php
                    }}?>
            </body>
        </table>
        <br>
    </div>
</div>

<?php
    //Footer
    include_once 'includes/footer.php';
?>



