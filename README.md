Projeto se trata de um EAD, onde se cadastra usuarios, por padrão ao gerar o script sql, já vem o usuario admin@gmail.com com senha 123456, para logar e cadastrar o que for necessário.
Este projeto tem Observer para disparar 3 operações após a compra de curso, Strategy para verificar qual desconto o tipo de usuário possui e o Factory, para geração de log no caso tem 3 tipos no projeto inicialmente:

 (Observer) - Ao gerar compra de um curso que realiza 3 operações: 
 1- Gera relatorio venda no banco
 2- Gera o desconto no credito do cliente 
 3- Gera Log Banco da compra.

Chamado na tela loja_cursos.php :
Observer - Apos comprar curso, dispara

GerarRelatorioBancoAposCompra.php
GeraDescontoCreditoAposCompra.php
GerarLogAposCompra.php

-----------------------------------------------------------------------------------------
 (Factory) - Que cria geradores de Log:
        1- Grava no banco o GeraLogBancoDB.php
        2- Grava no arquivo o GeraLogArquivo.php

Para as seguintes telas:

login.php
cadastrar_usuario.php
editar_usuario.php
deletar_usuario.php
cadastrar_curso.php
editar_curso.php
deletar_curso.php


----------------------------------------------------------------------------------------

(Strategy) - Apos compra de curso verifica o desconto pelo tipo de usuario:
GeraDescontoCreditoAposCompra.php

Estudante - 50%
Admin - 30%
Comum - 10%




