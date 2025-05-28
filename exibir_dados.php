<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Cadastro</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Dados do Cadastro</h1>
        
        <?php
        // Verifica se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Função para limpar e validar dados
            function limparDados($dado)
            {
                $dado = trim($dado);
                $dado = stripslashes($dado);
                $dado = htmlspecialchars($dado);
                return $dado;
            }

            // Exibe os dados do formulário
            echo "<div class='dados-item'>";
            echo "<div class='dados-label'>Nome Completo:</div>";
            echo "<div class='dados-valor'>" . limparDados($_POST['nome']) . "</div>";
            echo "</div>";

            echo "<div class='dados-item'>";
            echo "<div class='dados-label'>E-mail:</div>";
            echo "<div class='dados-valor'>" . limparDados($_POST['email']) . "</div>";
            echo "</div>";

            echo "<div class='dados-item'>";
            echo "<div class='dados-label'>Telefone:</div>";
            echo "<div class='dados-valor'>" . limparDados($_POST['telefone']) . "</div>";
            echo "</div>";

            echo "<div class='dados-item'>";
            echo "<div class='dados-label'>Data de Nascimento:</div>";
            echo "<div class='dados-valor'>" . limparDados($_POST['data_nascimento']) . "</div>";
            echo "</div>";

            echo "<div class='dados-item'>";
            echo "<div class='dados-label'>Gênero:</div>";
            echo "<div class='dados-valor'>" . limparDados($_POST['genero']) . "</div>";
            echo "</div>";

            echo "<div class='dados-item'>";
            echo "<div class='dados-label'>Estado:</div>";
            echo "<div class='dados-valor'>" . limparDados($_POST['estado']) . "</div>";
            echo "</div>";

            echo "<div class='dados-item'>";
            echo "<div class='dados-label'>Cidade:</div>";
            echo "<div class='dados-valor'>" . limparDados($_POST['cidade']) . "</div>";
            echo "</div>";

            echo "<div class='dados-item'>";
            echo "<div class='dados-label'>Endereço:</div>";
            echo "<div class='dados-valor'>" . nl2br(limparDados($_POST['endereco'])) . "</div>";
            echo "</div>";

            echo "<div class='dados-item'>";
            echo "<div class='dados-label'>Interesses:</div>";
            echo "<div class='dados-valor'>";
            if (isset($_POST['interesses']) && is_array($_POST['interesses'])) {
                echo implode(", ", array_map('limparDados', $_POST['interesses']));
            } else {
                echo "Nenhum interesse selecionado";
            }
            echo "</div>";
            echo "</div>";
        } else {
            echo "<p class='mensagem erro'>Nenhum dado foi enviado.</p>";
        }
        ?>

        <a href="cadastro.php" class="voltar-btn">Voltar ao Formulário</a>
    </div>
</body>
</html> 
