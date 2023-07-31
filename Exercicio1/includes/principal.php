<?php 
include('includes/conexao.php');
if(!isset($_SESSION))
    session_start();

if(!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    die();
}

$id = $_SESSION['usuario'];

$sql_usuarios = "SELECT * FROM usuarios WHERE id != '$id'";
$query_usuarios = $mysqli->query($sql_usuarios) or die($mysqli->error);
$num_usuarios = $query_usuarios->num_rows;
$mysqli -> close();
?>