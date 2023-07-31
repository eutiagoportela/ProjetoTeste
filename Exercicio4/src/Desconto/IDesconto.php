<?php

namespace Tiago\Projetodesign\Desconto;

interface IDesconto
{
    public function calculaImposto(Desconto $desconto): float;
}