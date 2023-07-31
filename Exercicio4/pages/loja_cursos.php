<?php
use Tiago\Projetodesign\Compra\CursoCompra;
use Tiago\Projetodesign\Compra\GeraDescontoCreditoAposCompra;
use Tiago\Projetodesign\Compra\GerarCompraCurso;
use Tiago\Projetodesign\Compra\GerarLogAposCompra;
use Tiago\Projetodesign\Compra\GerarRelatorioBancoAposCompra;


include('lib/protect.php');
require './vendor/autoload.php';
include("lib/conexao.php");
protect(0);

if(!isset($_SESSION))
    session_start();

$erro = false;
if(isset($_POST['adquirir'])) {

    // verificar se o usuario possui creditos para compra-lo
    $id_user = $_SESSION['usuario'];
    $sql_query_creditos = $mysqli->query("SELECT * FROM usuarios WHERE id = '$id_user'") ;
    $usuario = $sql_query_creditos->fetch_assoc();

    $creditos_do_usuario = $usuario['creditos'];

    $id_curso = intval($_POST['adquirir']);
    var_dump($mysqli->error);
    $sql_query_curso = $mysqli->query("SELECT * FROM cursos WHERE id = '$id_curso'") ;
    $curso = $sql_query_curso->fetch_assoc();

    $preco_do_curso = $curso['preco'];
    var_dump($mysqli->error);
    if($preco_do_curso > $creditos_do_usuario) {
        $erro = "Você não possui créditos para adquirir este curso.";
    } else {

        $cursoClasse = new CursoCompra();
        var_dump($cursoClasse);
        $cursoClasse ->Id = $curso['id'];
        $cursoClasse ->IdUsuario = $id_user;
        $cursoClasse ->titulo = $curso['titulo'];
        $cursoClasse ->preco = $curso['preco'];
        $cursoClasse ->TipoUsuario = $usuario['admin'];
        $cursoClasse ->creditoUsuario = $creditos_do_usuario;
        

        $GerarCompraCurso = new GerarCompraCurso();
        $GerarCompraCurso->adicionarAcaoAoGerarCompra(new GerarRelatorioBancoAposCompra());
        $GerarCompraCurso->adicionarAcaoAoGerarCompra(new GeraDescontoCreditoAposCompra());
        $GerarCompraCurso->adicionarAcaoAoGerarCompra(new GerarLogAposCompra());
        $GerarCompraCurso->execute($cursoClasse);

       die("<script>location.href='index.php?p=meus_cursos';</script>");
    }
   
    
}


$id_usuario = $_SESSION['usuario'];
$cursos_query = $mysqli->query("SELECT * FROM cursos WHERE id NOT IN (SELECT id_curso FROM relatorio WHERE id_usuario = '$id_usuario')") or die($mysqli->error);
$mysqli->close();
?>
<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Loja de Cursos</h4>
                    <span>Adquira nossos cursos usando o seu crédito</span>
                </div>  
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">Loja de Cursos</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
        <?php if($erro !== false) {
                                    ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $erro; ?>
            </div>
            <?php
        }
        ?>
        </div>
        <?php while($curso = $cursos_query->fetch_assoc()) { ?>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo $curso['titulo']; ?></h5>
                </div>
                <div class="card-block">
                    <img src="<?php echo $curso['imagem']; ?>" class="img-fluid mb-3" alt="">
                    <p>
                    <?php echo $curso['descricao_curta']; ?>
                    </p>
                    <form action="" method="post">
                        <button type="submit" name="adquirir" value="<?php echo $curso['id']; ?>" class="btn form-control btn-out-dashed btn-success btn-square">Adquirir por R$ <?php echo number_format($curso['preco'], 2, ',', '.'); ?></button>   
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
        
    </div>
</div>