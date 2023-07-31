<?php
namespace Tiago\Projetodesign\Log;

class ArquivoLogManager extends LogManager
{
    private string $caminhoArquivo;

    public function __construct(string $caminhoArquivo)
    {
        $this->caminhoArquivo = $caminhoArquivo;
    }

    public function criarLogWritter(): ILogInterface
    {
        return new GeraLogArquivo($this->caminhoArquivo);
    }
}
