<?php
require_once 'conexao.php';

// Buscar produtos cadastrados
$sql = "SELECT * FROM produtos ORDER BY data_cadastro DESC";
$resultado = executarConsulta($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos (AJAX)</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        .mensagem {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }
        .sucesso {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .erro {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        #mensagem-container {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastro de Produtos (AJAX)</h1>

        <div id="mensagem-container" class="mensagem"></div>

        <form id="form-produto">
            <div class="form-group">
                <label for="nome">Nome do Produto:</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" required></textarea>
            </div>

            <div class="form-group">
                <label for="preco">Preço (R$):</label>
                <input type="number" id="preco" name="preco" step="0.01" min="0" required>
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" id="quantidade" name="quantidade" min="0" required>
            </div>

            <button type="submit">Cadastrar Produto</button>
        </form>

        <div class="lista-produtos">
            <h2>Produtos Cadastrados</h2>
            <div id="tabela-produtos">
                <?php if (mysqli_num_rows($resultado) > 0) : ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Data de Cadastro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($produto = mysqli_fetch_assoc($resultado)) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                                    <td><?php echo htmlspecialchars($produto['descricao']); ?></td>
                                    <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                                    <td><?php echo $produto['quantidade']; ?></td>
                                    <td><?php echo date('d/m/Y H:i', strtotime($produto['data_cadastro'])); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p>Nenhum produto cadastrado.</p>
                <?php endif; ?>
            </div>
        </div>

        <a href="index.php" class="voltar-btn">Voltar ao Menu Principal</a>
    </div>

    <script>
        $(document).ready(function() {
            $('#form-produto').on('submit', function(e) {
                e.preventDefault();
                
                $.ajax({
                    url: 'salvar_produto.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        // Mostrar mensagem
                        $('#mensagem-container')
                            .removeClass('sucesso erro')
                            .addClass(response.success ? 'sucesso' : 'erro')
                            .html(response.message)
                            .show()
                            .delay(3000)
                            .fadeOut();

                        if (response.success) {
                            // Limpar formulário
                            $('#form-produto')[0].reset();
                            
                            // Atualizar tabela
                            if (response.produtos.length > 0) {
                                let html = '<table><thead><tr><th>Nome</th><th>Descrição</th><th>Preço</th><th>Quantidade</th><th>Data de Cadastro</th></tr></thead><tbody>';
                                
                                response.produtos.forEach(function(produto) {
                                    html += `<tr>
                                        <td>${produto.nome}</td>
                                        <td>${produto.descricao}</td>
                                        <td>R$ ${produto.preco}</td>
                                        <td>${produto.quantidade}</td>
                                        <td>${produto.data_cadastro}</td>
                                    </tr>`;
                                });
                                
                                html += '</tbody></table>';
                                $('#tabela-produtos').html(html);
                            } else {
                                $('#tabela-produtos').html('<p>Nenhum produto cadastrado.</p>');
                            }
                        }
                    },
                    error: function() {
                        $('#mensagem-container')
                            .removeClass('sucesso')
                            .addClass('erro')
                            .html('Erro ao processar a requisição.')
                            .show()
                            .delay(3000)
                            .fadeOut();
                    }
                });
            });
        });
    </script>
</body>
</html>

<?php
fecharConexao();
?> 
