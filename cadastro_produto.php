<?php
require_once 'conexao.php';

$mensagem = '';
$tipo_mensagem = '';

// print "<pre>";
// print_r($_POST);
// print "</pre>";

// Processar o formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpar e validar os dados
    $nome = limparDados($_POST['nome']);
    $descricao = limparDados($_POST['descricao']);
    $preco = limparDados($_POST['preco']);
    $quantidade = limparDados($_POST['quantidade']);

    // Validar preço e quantidade
    if (!is_numeric($preco) || !is_numeric($quantidade)) {
        $mensagem = "Preço e quantidade devem ser números válidos.";
        $tipo_mensagem = "erro";
    } else {
        // Preparar e executar a consulta
        $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade, data_cadastro) 
                VALUES ('$nome', '$descricao', $preco, $quantidade, NOW());";
        // print $sql;
        // exit;

        if (executarConsulta($sql)) {
            $mensagem = "Produto cadastrado com sucesso!";
            $tipo_mensagem = "sucesso";
        } else {
            $mensagem = "Erro ao cadastrar produto.";
            $tipo_mensagem = "erro";
        }
    }
}


// Buscar produtos cadastrados
$sql = "SELECT * FROM produtos ORDER BY data_cadastro DESC";
$resultado = executarConsulta($sql);
// print "<pre>";
// print_r($resultado);
// print "</pre>";

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro de Produtos</h1>

        <?php if ($mensagem) : ?>
            <div class="mensagem <?php echo $tipo_mensagem; ?>">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
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

        <a href="index.php" class="voltar-btn">Voltar ao Menu Principal</a>
    </div>
</body>
</html>

<?php
// Fechar a conexão ao finalizar
fecharConexao();
?> 
