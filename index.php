<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastros</title>
    <link rel="stylesheet" href="css/estilos.css">
    <style>
        .menu-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .menu-item {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .menu-item:hover {
            transform: translateY(-5px);
        }
        .menu-item h2 {
            color: #2c3e50;
            margin-top: 0;
            margin-bottom: 10px;
        }
        .menu-item p {
            color: #666;
            margin-bottom: 15px;
            line-height: 1.5;
        }
        .menu-item a {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.2s;
        }
        .menu-item a:hover {
            background-color: #45a049;
        }
        .menu-item .destaque {
            background-color: #e8f5e9;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
            font-size: 0.9em;
        }
        .menu-item .requisitos {
            background-color: #fff3e0;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="menu-container">
        <h1>Sistema de Cadastros</h1>
        <p style="text-align: center; margin-bottom: 30px;">Bem-vindo ao sistema de cadastros. Escolha uma das opções abaixo para começar.</p>

        <div class="menu-item">
            <h2>Introdução ao PHP</h2>
            <p>Material didático com exemplos práticos dos conceitos básicos de PHP, incluindo variáveis, operadores, estruturas condicionais, loops, funções e muito mais.</p>
            <div class="destaque">
                <strong>Conteúdo Abordado:</strong>
                <ul>
                    <li>Variáveis e Tipos de Dados</li>
                    <li>Operadores Aritméticos</li>
                    <li>Estruturas Condicionais (if/else, switch)</li>
                    <li>Loops (for, while, foreach)</li>
                    <li>Funções e Parâmetros</li>
                    <li>Arrays e Manipulação de Strings</li>
                    <li>Inclusão de Arquivos</li>
                </ul>
            </div>
            <a href="introducao.php">Acessar Introdução ao PHP</a>
        </div>

        <div class="menu-item">
            <h2>Cadastro de Pessoas</h2>
            <p>Formulário completo para cadastro de pessoas, incluindo dados pessoais, endereço e interesses. 
               Os dados são exibidos em uma página separada após o envio.</p>
            <div class="destaque">
                <strong>Funcionalidades:</strong>
                <ul>
                    <li>Formulário com validação</li>
                    <li>Campos para dados pessoais</li>
                    <li>Seleção de estado</li>
                    <li>Múltipla escolha de interesses</li>
                    <li>Exibição dos dados em página separada</li>
                </ul>
            </div>
            <a href="cadastro.php">Acessar Cadastro de Pessoas</a>
        </div>

        <div class="menu-item">
            <h2>Cadastro de Produtos</h2>
            <p>Sistema de cadastro de produtos com armazenamento em banco de dados MySQL. 
               Inclui formulário de cadastro e listagem dos produtos cadastrados.</p>
            <div class="destaque">
                <strong>Funcionalidades:</strong>
                <ul>
                    <li>Cadastro de produtos com nome, descrição, preço e quantidade</li>
                    <li>Armazenamento em banco de dados MySQL</li>
                    <li>Listagem dos produtos cadastrados</li>
                    <li>Formatação de preços em reais</li>
                    <li>Ordenação por data de cadastro</li>
                </ul>
            </div>
            <div class="requisitos">
                <strong>Requisitos:</strong>
                <ul>
                    <li>Banco de dados MySQL configurado</li>
                    <li>Executar o script SQL para criar a tabela</li>
                </ul>
            </div>
            <a href="cadastro_produto.php">Acessar Cadastro de Produtos (Versão Tradicional)</a>
        </div>

        <div class="menu-item">
            <h2>Cadastro de Produtos (AJAX)</h2>
            <p>Versão moderna do sistema de cadastro de produtos utilizando AJAX para uma experiência mais dinâmica. 
               Os dados são salvos e a lista é atualizada sem recarregar a página.</p>
            <div class="destaque">
                <strong>Funcionalidades:</strong>
                <ul>
                    <li>Todas as funcionalidades da versão tradicional</li>
                    <li>Salvamento de dados via AJAX</li>
                    <li>Atualização dinâmica da lista de produtos</li>
                    <li>Mensagens de feedback em tempo real</li>
                    <li>Interface mais responsiva e moderna</li>
                </ul>
            </div>
            <div class="requisitos">
                <strong>Requisitos:</strong>
                <ul>
                    <li>Mesmos requisitos da versão tradicional</li>
                    <li>Navegador com suporte a JavaScript</li>
                </ul>
            </div>
            <a href="cadastro_produto_ajax.php">Acessar Cadastro de Produtos (Versão AJAX)</a>
        </div>

        <div class="menu-item">
            <h2>Estrutura do Sistema</h2>
            <p>O sistema está organizado nos seguintes arquivos:</p>
            <ul>
                <li><strong>index.php</strong> - Esta página inicial</li>
                <li><strong>introducao.php</strong> - Material didático de introdução ao PHP</li>
                <li><strong>cadastro.php</strong> - Formulário de cadastro de pessoas</li>
                <li><strong>exibir_dados.php</strong> - Exibição dos dados do cadastro de pessoas</li>
                <li><strong>cadastro_produto.php</strong> - Sistema de cadastro de produtos (versão tradicional)</li>
                <li><strong>cadastro_produto_ajax.php</strong> - Sistema de cadastro de produtos (versão AJAX)</li>
                <li><strong>salvar_produto.php</strong> - Endpoint AJAX para salvar produtos</li>
                <li><strong>conexao.php</strong> - Arquivo de conexão com o banco de dados</li>
                <li><strong>criar_tabela.sql</strong> - Script SQL para criar a tabela de produtos</li>
                <li><strong>css/estilos.css</strong> - Arquivo de estilos compartilhado</li>
            </ul>
        </div>

        <div class="menu-item">
            <h2>Configuração do Banco de Dados</h2>
            <p>Para usar o sistema de cadastro de produtos, é necessário configurar o banco de dados:</p>
            <ol>
                <li>Acesse o phpMyAdmin (http://localhost/phpmyadmin)</li>
                <li>Vá na aba "SQL"</li>
                <li>Cole o conteúdo do arquivo <strong>criar_tabela.sql</strong></li>
                <li>Clique em "Executar"</li>
            </ol>
            <div class="requisitos">
                <strong>Configurações do banco:</strong>
                <ul>
                    <li>Host: localhost</li>
                    <li>Banco: meusite</li>
                    <li>Usuário: root</li>
                    <li>Senha: (em branco)</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html> 