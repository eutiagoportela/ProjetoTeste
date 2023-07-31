<?php

namespace Tiago\Projetodesign\Compra;

class GerarLogAposCompra implements IAcaoAposGerarCompra
{
    public function executaAcao(CursoCompra $cursoCompra): void
    {

        $mensagemFormatada = "Compra do Curso: -" .$cursoCompra->titulo ." pelo usuario Id: ".$cursoCompra->IdUsuario;
        include('lib/conexao.php');
        $id = $_SESSION['usuario'];
        $sql_code = "INSERT INTO log (id_usuario, descricao,data) VALUES(
            $id,
            '$mensagemFormatada',
            NOW()
        )";
        $inserido = $mysqli->query($sql_code);

        if(!$inserido)
            echo  "Log - Falha ao inserir no banco de dados: " . $mysqli->error;
       // else
       //     echo "Log Gerado ";
        $mysqli->close();
    }
}



