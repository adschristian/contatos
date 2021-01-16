<?php

session_start();

require 'banco.php';
require 'ajudantes.php';

$exibir_tabela = true;

$contato = pegar_dados();

if ($contato) {
    gravar_contato($conexao, $contato);
    header('Location: contatos.php');
    die();
}

$listaContatos = busca_contatos($conexao);

$contato = [
    'id' => 0,
    'nome' => '',
    'telefone' => '',
    'email' => '',
    'descricao' => '',
    'data_nascimento' => '',
    'favorito' => 0
];

require 'template.php';
