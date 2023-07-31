<?php
//Connection
include('conexao.php');

//Function against XSS
function clear($input) {
    global $mysqli;
    $var = mysqli_escape_string($mysqli, $input);
    $var = htmlspecialchars($var);
    return $var;
}

if (isset($_POST['btn-delete'])):
    $id = clear($_POST['id']);

    $sql = "DELETE FROM usuarios WHERE id = '$id'";
    if(mysqli_query($mysqli, $sql)):
        header('Location: ../principal.php');
    else:
        header('Location: ../principal.php');
        $mysqli -> close();
    endif;
endif;

?>