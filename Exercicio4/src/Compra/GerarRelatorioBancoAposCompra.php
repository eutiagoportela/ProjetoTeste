<?php

namespace Tiago\Projetodesign\Compra;


class GerarRelatorioBancoAposCompra implements IAcaoAposGerarCompra
{
    public function executaAcao(CursoCompra $cursoCompra): void
    {
        include("lib/conexao.php");

        $id_user = $cursoCompra->IdUsuario;
        $id_curso = $cursoCompra->Id;
        $preco_do_curso = $cursoCompra->preco;

        $mysqli->query("INSERT INTO relatorio (id_usuario, id_curso, valor, data_compra) VALUES(
            '$id_user',
            '$id_curso',
            '$preco_do_curso',
            NOW()
        )"); 

        if($mysqli->error)
          echo "Erro Gerando Relatorio: ".$mysqli->error;
       // else
       //    echo "Relatorio Gerado ";

          $mysqli->close();
    }
}
