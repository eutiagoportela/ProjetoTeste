<?php


namespace Tiago\Projetodesign\Compra;


interface IAcaoAposGerarCompra
{
    public function executaAcao(CursoCompra $cursoCompra): void;
}