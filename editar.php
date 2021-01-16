<?php

session_start();

require 'banco.php';
require 'ajudantes.php';

$exibir_tabela = false;

$contato = pegar_dados(true);

if ($contato) {
    atualizar_contato($conexao, $contato);
    header('Location: contatos.php');
    die();
}

$contato = buscar_contato($conexao, $_GET['id']);

require 'template.php';
