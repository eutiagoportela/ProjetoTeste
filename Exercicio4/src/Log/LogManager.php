<?php

namespace Tiago\Projetodesign\Log;

abstract class LogManager
{
    public function log(string $severidade, string $mensagem): void
    {
        /** @var ILogInterface $logWritter */
        $logWritter = $this->criarLogWritter();

        $dataHoje = date('d/m/Y');
        $mensagemFormatada = "[$dataHoje][$severidade]: $mensagem";
        $logWritter->escreve($mensagemFormatada);
    }

    abstract public function criarLogWritter(): ILogInterface;
}
