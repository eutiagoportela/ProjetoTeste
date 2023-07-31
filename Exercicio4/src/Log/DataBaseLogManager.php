<?php

namespace Tiago\Projetodesign\Log;

class DataBaseLogManager extends LogManager
{
    public function criarLogWritter(): ILogInterface
    {
        return new GeraLogBancoDB();
    }
}
