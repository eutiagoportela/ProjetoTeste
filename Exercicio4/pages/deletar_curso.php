<?php
use Tiago\Projetodesign\Log\ArquivoLogManager;
use Tiago\Projetodesign\Log\DataBaseLogManager;

include("lib/conexao.php");
include('lib/protect.php');
require './vendor/autoload.php';
protect(1);
$id = intval($_GET['id']);

$mysql_query = $mysqli->query("SELECT imagem FROM cursos WHERE id = '$id'") or die($mysqli->error);
$curso = $mysql_query->fetch_assoc();

if(unlink($curso['imagem'])) {
    $mysqli->query("DELETE FROM cursos WHERE id = '$id'") or die($mysqli->error);
}



//gera log no banco e em arquivo usando o padrão Factory, que fabrica geradores de Log
$logManager1 = new ArquivoLogManager(__DIR__ . '/log');
$logManager1->log('info', 'Curso - '.$id .' - Deletado por '.$_SESSION['usuario']." = ".$_SESSION['nome']);
$logManager2 = new DataBaseLogManager();
$logManager2->log('info', 'Curso - '.$id .' - Deletado por '.$_SESSION['usuario']." = ".$_SESSION['nome']);

die("<script>location.href=\"index.php?p=gerenciar_cursos\";</script>");