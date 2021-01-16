<?php

include 'banco.php';
include 'ajudantes.php';

$tem_erros = false;
$erros_validacao = [];

if (tem_post()) {
    // upload dos anexos
    $contato_id = $_POST['contato_id'];

    if (!array_key_exists('foto', $_FILES)) {
        $tem_erros = true;
        $erros_validacao['foto'] = 'Você deve selecionar um arquivo para anexar.';
    } else {
        if (tratar_foto($_FILES['foto'])) {
            $nome = $_FILES['foto']['name'];
            $foto = [
                'contato_id' => $contato_id,
                'nome' => substr($nome, 0, -4),
                'arquivo' => $nome,
            ];
        } else {
            $tem_erros = true;
            $erros_validacao['anexo'] = 'Envie anexos nos formatos jpg ou pnj.';
        }
    }

    if (!$tem_erros) {
        gravar_foto($conexao, $foto);
    }
}

$contato = buscar_contato($conexao, $_GET['id']);
$fotos = buscar_fotos($conexao, $_GET['id']);

include 'template_contato.php';
