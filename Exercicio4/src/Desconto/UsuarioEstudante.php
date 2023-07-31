<?php

namespace Tiago\Projetodesign\Desconto;
use Tiago\Projetodesign\Desconto\Desconto;

class UsuarioEstudante implements IDesconto
{
    public function calculaImposto(Desconto $desconto): float
    {
        return $desconto->valor * 0.50;
    }
}
