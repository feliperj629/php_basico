<?php

// Configurações do banco de dados
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'aula';

// Criar conexão
$conexao = mysqli_connect($host, $usuario, $senha, $banco);

// Verificar conexão
if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}

// Definir charset para utf8
mysqli_set_charset($conexao, "utf8");

// Função para limpar dados de entrada
function limparDados($dado)
{
    global $conexao;
    $dado = trim($dado);
    $dado = stripslashes($dado);
    $dado = htmlspecialchars($dado);
    $dado = mysqli_real_escape_string($conexao, $dado);
    return $dado;
}

// Função para executar consultas com segurança
function executarConsulta($sql)
{
    global $conexao;
    // print $sql;
    // exit;
    $resultado = mysqli_query($conexao, $sql);
    if (!$resultado) {
        die("Erro na consulta: " . mysqli_error($conexao));
    }
    return $resultado;
}

// Função para obter o último ID inserido
function obterUltimoId()
{
    global $conexao;
    return mysqli_insert_id($conexao);
}

// Função para fechar a conexão
function fecharConexao()
{
    global $conexao;
    mysqli_close($conexao);
}
