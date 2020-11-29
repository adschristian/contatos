<?php

session_start();

if (array_key_exists('nome', $_GET) && $_GET['nome'] !== '') {
    $contato = [];
    $contato['nome'] = $_GET['nome'];

    if (array_key_exists('telefone', $_GET)) {
        $contato['telefone'] = $_GET['telefone'];
    } else {
        $contato['telefone'] = '';
    }

    if (array_key_exists('email', $_GET)) {
        $contato['email'] = $_GET['email'];
    } else {
        $contato['email'] = '';
    }

    if (array_key_exists('descricao', $_GET)) {
        $contato['descricao'] = $_GET['descricao'];
    } else {
        $contato['descricao'] = '';
    }
    
    if (array_key_exists('data_nascimento', $_GET)) {
        $contato['data_nascimento'] = date('Y-m-d', $_GET['data_nascimento']);
    } else {
        $contato['data_nascimento'] = '';
    }

    $contato['favorito'] = $_GET['favorito'] ?: '';
    

    $_SESSION['contatos'][] = $contato;
}

$listaContatos = [];
if (array_key_exists('contatos', $_SESSION)) {
    $listaContatos = $_SESSION['contatos'];
}

include 'template.php';
