<?php

namespace Tiago\Projetodesign\Desconto;
use Tiago\Projetodesign\Desconto\Desconto;

class UsuarioComum implements IDesconto
{
    public function calculaImposto(Desconto $desconto): float
    {
        return $desconto->valor * 0.1;
    }
}
