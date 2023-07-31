<?php

namespace Tiago\Projetodesign\Log;
class GeraLogBancoDB implements ILogInterface
{
    public function escreve(string $mensagemFormatada): void
    {
        include('lib/conexao.php');
        $id = $_SESSION['usuario'];
        $sql_code = "INSERT INTO log (id_usuario, descricao,data) VALUES(
            $id,
            '$mensagemFormatada',
            NOW()
        )";
        $inserido = $mysqli->query($sql_code);

        if(!$inserido)
            $erro[] = "Falha ao inserir no banco de dados: " . $mysqli->error;

        $mysqli->close();
    }
}

?>
