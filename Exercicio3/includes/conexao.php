<?php


//Connect to database
$host = "localhost";
$user = "root";
$pass = "123456";
$db = "cruddb_organizacoes";



$mysqli = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($mysqli, "utf8");

if (mysqli_connect_error()):
    echo "Falha na conexão com o banco de dados". mysqli_connect_error();
endif;

