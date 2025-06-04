<?php

require_once 'conexao.php';
header('Content-Type: application/json');
$response = [
    'success' => false,
    'message' => '',
    'produtos' => []
];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Limpar e validar os dados
    $nome = limparDados($_POST['nome']);
    $descricao = limparDados($_POST['descricao']);
    $preco = limparDados($_POST['preco']);
    $quantidade = limparDados($_POST['quantidade']);
// Validar preço e quantidade
    if (!is_numeric($preco) || !is_numeric($quantidade)) {
        $response['message'] = "Preço e quantidade devem ser números válidos.";
    } else {
    // Preparar e executar a consulta
        $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade, data_cadastro) 
                VALUES ('$nome', '$descricao', $preco, $quantidade, NOW())";
        if (executarConsulta($sql)) {
            $response['success'] = true;
            $response['message'] = "Produto cadastrado com sucesso!";
        // Buscar produtos atualizados
            $sql = "SELECT * FROM produtos ORDER BY data_cadastro DESC";
            $resultado = executarConsulta($sql);
            while ($produto = mysqli_fetch_assoc($resultado)) {
                $response['produtos'][] = [
                    'nome' => htmlspecialchars($produto['nome']),
                    'descricao' => htmlspecialchars($produto['descricao']),
                    'preco' => number_format($produto['preco'], 2, ',', '.'),
                    'quantidade' => $produto['quantidade'],
                    'data_cadastro' => date('d/m/Y H:i', strtotime($produto['data_cadastro']))
                ];
            }
        } else {
            $response['message'] = "Erro ao cadastrar produto.";
        }
    }
}

echo json_encode($response);
fecharConexao();
