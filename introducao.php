<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introdução ao PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
            line-height: 1.6;
        }
        .exemplo {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
        }
        .resultado {
            background-color: #e8f5e9;
            padding: 10px;
            border-left: 4px solid #4caf50;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Introdução ao PHP - Conceitos Básicos</h1>

    <?php
    // 1. VARIÁVEIS E TIPOS DE DADOS
    echo "<h2>1. Variáveis e Tipos de Dados</h2>";

    // Declaração de variáveis (em PHP não precisamos declarar o tipo)
    $nome = "João";          // String
    $idade = 25;             // Integer
    $altura = 1.75;          // Float
    $ativo = true;           // Boolean
    $frutas = ["maçã", "banana", "laranja"]; // Array

    // Exibindo variáveis
    echo "<div class='exemplo'>";
    echo "<h3>Exemplo de variáveis:</h3>";
    echo "Nome: " . $nome . "<br>";
    echo "Idade: " . $idade . "<br>";
    echo "Altura: " . $altura . "<br>";
    echo "Ativo: " . ($ativo ? "Sim" : "Não") . "<br>";
    echo "</div>";

    // 2. OPERADORES
    echo "<h2>2. Operadores</h2>";

    $a = 10;
    $b = 5;

    echo "<div class='exemplo'>";
    echo "<h3>Operadores aritméticos:</h3>";
    echo "Soma: $a + $b = " . ($a + $b) . "<br>";        // Adição
    echo "Subtração: $a - $b = " . ($a - $b) . "<br>";    // Subtração
    echo "Multiplicação: $a * $b = " . ($a * $b) . "<br>"; // Multiplicação
    echo "Divisão: $a / $b = " . ($a / $b) . "<br>";      // Divisão
    echo "Módulo: $a % $b = " . ($a % $b) . "<br>";       // Resto da divisão
    echo "</div>";

    // 3. ESTRUTURAS CONDICIONAIS
    echo "<h2>3. Estruturas Condicionais</h2>";

    echo "<div class='exemplo'>";
    echo "<h3>Exemplo de if/else:</h3>";
    if ($idade >= 18) {
        echo "Maior de idade<br>";
    } else {
        echo "Menor de idade<br>";
    }

    // Exemplo de switch
    echo "<h3>Exemplo de switch:</h3>";
    $dia = 3;
    switch ($dia) {
        case 1:
            echo "Domingo<br>";
            break;
        case 2:
            echo "Segunda-feira<br>";
            break;
        case 3:
            echo "Terça-feira<br>";
            break;
        default:
            echo "Dia inválido<br>";
    }
    echo "</div>";

    // 4. LOOPS (LAÇOS DE REPETIÇÃO)
    echo "<h2>4. Loops</h2>";

    echo "<div class='exemplo'>";
    echo "<h3>Exemplo de for:</h3>";
    for ($i = 1; $i <= 5; $i++) {
        echo "Número: " . $i . "<br>";
    }

    echo "<h3>Exemplo de while:</h3>";
    $contador = 1;
    while ($contador <= 3) {
        echo "Contador: " . $contador . "<br>";
        $contador++;
    }

    echo "<h3>Exemplo de foreach (array):</h3>";
    foreach ($frutas as $fruta) {
        echo "Fruta: " . $fruta . "<br>";
    }
    echo "</div>";

    // 5. FUNÇÕES
    echo "<h2>5. Funções</h2>";

    // Função simples
    function saudacao($nome)
    {
        return "Olá, " . $nome . "!";
    }

    // Função com parâmetros opcionais
    function calcularIMC($peso, $altura = 1.70)
    {
        return $peso / ($altura * $altura);
    }

    echo "<div class='exemplo'>";
    echo "<h3>Exemplo de funções:</h3>";
    echo saudacao("Maria") . "<br>";
    echo "IMC: " . number_format(calcularIMC(70, 1.75), 2) . "<br>";
    echo "</div>";

    // 6. ARRAYS
    echo "<h2>6. Arrays</h2>";

    // Array associativo
    $pessoa = [
        "nome" => "Ana",
        "idade" => 30,
        "cidade" => "São Paulo"
    ];

    echo "<div class='exemplo'>";
    echo "<h3>Array associativo:</h3>";
    foreach ($pessoa as $chave => $valor) {
        echo "$chave: $valor<br>";
    }
    echo "</div>";

    // 7. MANIPULAÇÃO DE STRINGS
    echo "<h2>7. Manipulação de Strings</h2>";

    $texto = "  Curso de PHP  ";

    echo "<div class='exemplo'>";
    echo "<h3>Funções de string:</h3>";
    echo "Original: '" . $texto . "'<br>";
    echo "Trim: '" . trim($texto) . "'<br>";
    echo "Maiúsculas: '" . strtoupper($texto) . "'<br>";
    echo "Minúsculas: '" . strtolower($texto) . "'<br>";
    echo "Tamanho: " . strlen($texto) . " caracteres<br>";
    echo "Substring: '" . substr($texto, 0, 5) . "'<br>";
    echo "</div>";

    // 8. INCLUSÃO DE ARQUIVOS
    echo "<h2>8. Inclusão de Arquivos</h2>";
    echo "<div class='exemplo'>";
    echo "Para incluir outros arquivos PHP, use:<br>";
    echo "include 'arquivo.php';<br>";
    echo "require 'arquivo.php';<br>";
    echo "include_once 'arquivo.php';<br>";
    echo "require_once 'arquivo.php';<br>";
    echo "</div>";
    ?>

    <div class="exemplo">
        <h2>Dicas Importantes:</h2>
        <ul>
            <li>Todo código PHP deve estar entre as tags &lt;?php e ?&gt;</li>
            <li>Variáveis em PHP começam com $</li>
            <li>PHP é case-sensitive para variáveis</li>
            <li>Use ponto (.) para concatenar strings</li>
            <li>Comentários podem ser feitos com // ou /* */</li>
        </ul>
    </div>
</body>
</html> 
