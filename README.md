Detalhes sobre o Projeto do Exercicio 4:
 Se trata de um EAD, onde se cadastra usuarios, por padrão ao gerar o script sql, já vem o usuario admin@gmail.com com senha 123456, para logar e cadastrar o que for necessário.
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

Obs: Para mais detalhes veja a pasta Detalhes do Projeto do Exercicio 4.


<h1>Exercicio 1 - Cadastro Usuários:</h1></br></br>
Login:</br>
![image](https://github.com/eutiagoportela/ProjetoTeste/assets/30733976/50a43d39-89ec-4675-a980-cdb081392103)
</br>
</br>
Cadastro de Usuário com Criptografia:</br>
![image](https://github.com/eutiagoportela/ProjetoTeste/assets/30733976/1f712c1a-8b9a-40ef-ae41-3afd2215d5c7)
Tela principal para edição e exclusão de usuários:</br>
![image](https://github.com/eutiagoportela/ProjetoTeste/assets/30733976/6a1698cc-92d2-444f-a594-db6e8f8da6fe)

<h1>Exercicio 2 - Consulta Repositórios GitHub:</h1></br></br>
![image](https://github.com/eutiagoportela/ProjetoTeste/assets/30733976/442973d0-0d66-4be7-b4f1-2bc67d6c0813)

<h1>Exercicio 3 - Importar CSV :</h1></br></br>
![image](https://github.com/eutiagoportela/ProjetoTeste/assets/30733976/7f1890a9-0dfa-4b06-bccd-fa6a74930fe6)
</br></br>3 tipos de pesquisa proposto no exercício.
![image](https://github.com/eutiagoportela/ProjetoTeste/assets/30733976/ccd462b3-26a2-42a3-9ef6-3bd40b1cb73a)

<h1>Exercicio 4 - Projeto com Observer/Strategy/factory :</h1></br></br>
Login: Usuario pre cadastrado pelo sql na pasta.</br></br>
![image](https://github.com/eutiagoportela/ProjetoTeste/assets/30733976/4a9639ac-ceb6-49fb-b5b3-cf4afc192275)

</br>Tela Principal para Usuario Admin</br>
![image](https://github.com/eutiagoportela/ProjetoTeste/assets/30733976/259237ab-1e23-4820-9699-49f331ca5d91)
</br>Crud Cursos - Para usuario Admin</br>
![image](https://github.com/eutiagoportela/ProjetoTeste/assets/30733976/c603120f-b2f0-45fe-b3c2-e545e60e1f7a)
</br>Crud Usuários - Para usuario Admin</br>
![image](https://github.com/eutiagoportela/ProjetoTeste/assets/30733976/a6272a40-2b46-44ae-87c9-9ede0b4e7524)
</br>Relatório de Compra de Cursos - Para usuario Admin</br>
![image](https://github.com/eutiagoportela/ProjetoTeste/assets/30733976/7fda8cca-8bf4-4194-9ebf-a5bc367f0c05)
</br>Tela Principal para Usuario Comum e Estudando </br>
![image](https://github.com/eutiagoportela/ProjetoTeste/assets/30733976/3812a40f-1f44-4805-b9e5-1c1f776a62be)
</br>Loja de Cursos para Usuario Comum e Estudando </br>
![image](https://github.com/eutiagoportela/ProjetoTeste/assets/30733976/25307af1-9213-4bf8-9d26-2bf8707c6cc0)
</br>Meus Cursos para Usuario Comum e Estudando </br>
![image](https://github.com/eutiagoportela/ProjetoTeste/assets/30733976/e3b22d9b-97dd-4886-a278-25e0c440deef)
</br>Cursos Comprados para Usuario Comum e Estudando </br>
![image](https://github.com/eutiagoportela/ProjetoTeste/assets/30733976/0dcd20ee-34ec-4901-aa18-2695141bb666)









