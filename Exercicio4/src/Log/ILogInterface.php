<?php

namespace Tiago\Projetodesign\Log;

interface ILogInterface
{
    public function escreve(string $mensagemFormatada): void;
}
