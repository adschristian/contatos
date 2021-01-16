<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>
</head>

<body>
    <h1>Lista de contatos</h1>

    <?php require 'formulario.php' ?>

    <?php if ($exibir_tabela) : ?>
        <?php require 'tabela.php'; ?>
    <?php endif ?>
    
</body>

</html>