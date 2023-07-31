<?php

namespace Tiago\Projetodesign\Compra;

use Tiago\Projetodesign\Desconto\CalculadoraDeDesconto;
use Tiago\Projetodesign\Desconto\Desconto;
use Tiago\Projetodesign\Desconto\UsuarioAdmin;
use Tiago\Projetodesign\Desconto\UsuarioComum;
use Tiago\Projetodesign\Desconto\UsuarioEstudante;

class GeraDescontoCreditoAposCompra implements IAcaoAposGerarCompra
{
    public function executaAcao(CursoCompra $cursoCompra): void
    {
        include("lib/conexao.php");

        require 'vendor/autoload.php';


        //Padrao Strategy cria varios descontos a partir de uma interface
        $calculadora = new CalculadoraDeDesconto();
        $desconto = new Desconto();
        $desconto->valor = $cursoCompra->preco; //passa o valor do curso a ser criado desconto

        $DescontoValor=0;
        if($cursoCompra->TipoUsuario==0)
          $DescontoValor = $calculadora->calcula($desconto, new UsuarioComum());
        else
          if($cursoCompra->TipoUsuario==1)
             $DescontoValor = $calculadora->calcula($desconto, new UsuarioAdmin());
          else
            if($cursoCompra->TipoUsuario==2)
             $DescontoValor = $calculadora->calcula($desconto, new UsuarioEstudante());


        $novo_credito = $cursoCompra->creditoUsuario - ($cursoCompra->preco - $DescontoValor);
        $id_user = $cursoCompra->IdUsuario;

        $mysqli->query("UPDATE usuarios SET creditos = '$novo_credito' WHERE id = '$id_user'") or die($mysqli->error);
        
        if($mysqli->error)
        echo "Erro Desconto Credito: ".$mysqli->error;
       // else
     //   echo "Desconto Gerado ";
        $mysqli->close();
    }
}
