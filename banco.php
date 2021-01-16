<?php

$servidor = 'localhost';
$banco = 'contatos';
$usuario = 'cas';
$senha = 'alves';

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if (mysqli_connect_errno($conexao)) {
    echo "problemas ao conectar ao banco de dados '{$banco}'. erro: ";
    echo mysqli_connect_errno();
    die();
}


/**
 * @param mysqli $conexao
 * @return array
 */
function busca_contatos($conexao)
{
    $sql = 'SELECT * FROM contatos;';
    $resultado = mysqli_query($conexao, $sql);

    $contatos = [];

    while ($contato = mysqli_fetch_assoc($resultado)) {
        $contatos[] = $contato;
    }

    return $contatos;
}


/**
 * @param mysqli $conexao
 * @param array $contato
 */
function gravar_contato($conexao, $contato)
{
    $sql = "INSERT INTO contatos (nome, email, telefone, data_nascimento, descricao, favorito) ";
    $sql .= "VALUES (
        '{$contato['nome']}',
        '{$contato['email']}',
        '{$contato['telefone']}',
        '{$contato['data_nascimento']}',
        '{$contato['descricao']}',
        {$contato['favorito']}
    );";

    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado) {
        echo "falha ao gravar contato. erro: ";
        echo mysqli_error($conexao);
        die();
    }
}


/**
 * @param mysqli $conexao
 * @param array $contato
 * @return void
 */
function atualizar_contato($conexao, $contato)
{
    $sql = 'UPDATE contatos SET ';
    $sql .= "
        nome = '{$contato['nome']}',
        telefone = '{$contato['telefone']}',
        email = '{$contato['email']}',
        descricao = '{$contato['descricao']}',
        data_nascimento = '{$contato['data_nascimento']}',
        favorito = {$contato['favorito']} ";
    $sql .= "WHERE id = {$contato['id']};";

    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado) {
        echo "falha ao atualizar contato de ID = {$contato['id']}. erro: ";
        echo mysqli_error($conexao);
        die();
    }
}


/**
 * @param mysqli $conexao
 * @param int $id
 * @return array|null
 */
function buscar_contato($conexao, $id)
{
    $sql = "SELECT * FROM contatos WHERE id=$id";
    $resultado = mysqli_query($conexao, $sql);
    return mysqli_fetch_assoc($resultado);
}


/**
 * @param mysqli $conexao
 * @param int $id
 */
function remover_contato($conexao, $id)
{
    $sql = "DELETE FROM contatos WHERE id=$id;";

    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado) {
        echo "falha ao remover contato de ID = $id. erro: ";
        echo mysqli_error($conexao);
        die();
    }
}


/**
 * @param mysqli $conexao
 * @param int $contato_id
 */
function buscar_fotos($conexao, $contato_id)
{
    $sql = "SELECT * FROM fotos WHERE contato_id = {$contato_id};";
    $resultado = mysqli_query($conexao, $sql);
    $anexos = [];
    while ($anexo = mysqli_fetch_assoc($resultado)) {
        $anexos[] = $anexo;
    }
    return $anexos;
}


/**
 * @param mysqli $conexao
 * @param array $foto
 */
function gravar_foto($conexao, $foto)
{
    $sql = "INSERT INTO fotos
        (contato_id, nome, arquivo)
        VALUES (
            {$foto['contato_id']},
            '{$foto['nome']}',
            '{$foto['arquivo']}'
        );";
    $resultado = mysqli_query($conexao, $sql);
    if (!$resultado) {
        echo 'falha ao cadastrar foto. erro: ';
        echo mysqli_error($conexao);
        die();
    }
}


/**
 * @param mysqli $conexao
 * @param int $id
 * @return string[]|null
 */
function buscar_foto($conexao, $id)
{
    $sql = "SELECT * FROM fotos WHERE id = {$id};";
    $resultado = mysqli_query($conexao, $sql);
    return mysqli_fetch_assoc($resultado);
}


/**
 * @param mysqli $conexao
 * @param int $id
 */
function remover_foto($conexao, $id)
{
    $sql = "DELETE FROM fotos WHERE id = {$id};";
    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado) {
        echo "falha ao remover foto do contato de ID = {$id}. erro: ";
        echo mysqli_error($conexao);
        die();
    }
}
