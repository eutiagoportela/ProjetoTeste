<?php

namespace Tiago\Projetodesign\Desconto;
use Tiago\Projetodesign\Desconto\Desconto;


class CalculadoraDeDesconto
{
    public function calcula(Desconto $desconto, IDesconto $Idesconto): float
    {
        return $Idesconto->calculaImposto($desconto);
    }
}
