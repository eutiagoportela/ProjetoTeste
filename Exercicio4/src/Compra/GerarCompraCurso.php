<?php

namespace Tiago\Projetodesign\Compra;
use Tiago\Projetodesign\Compra\IAcaoAposGerarCompra;


class GerarCompraCurso
{
    /** @var IAcaoAposGerarCompra[] */
    private array $acoesAposGerarPedido = [];

    public function __construct()
    {
    }

    public function adicionarAcaoAoGerarCompra(IAcaoAposGerarCompra $acao)
    {
        $this->acoesAposGerarPedido[] = $acao;
    }

    public function execute(CursoCompra $cursoCompra)
    {
 
        foreach ($this->acoesAposGerarPedido as $acao) {
            $acao->executaAcao($cursoCompra);
        }

    }
}
