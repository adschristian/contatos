<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos</title>
</head>

<body>
    <div class="bloco_principal">
        <h1>Contato: <?= $contato['nome'] ?> </h1>
        <p>
            <a href="contatos.php">Voltar para a lista de contatos</a>
        </p>
        <p>
            <strong>Telefone:</strong>
            <?= $contato['telefone']; ?>
        </p>
        <p>
            <strong>Email:</strong>
            <?= $contato['email']; ?>
        </p>
        <p>
            <strong>Descricao:</strong>
            <?= nl2br($contato['descricao']); ?>
        </p>
        <p>
            <strong>Data de nascimento:</strong>
            <?= traduz_data_para_exibir($contato['data_nascimento']); ?>
        </p>
        <p>
            <strong>Favorito:</strong>
            <?= traduz_favorito($contato['favorito']); ?>
        </p>

        <h2>Anexos</h2>
        <!--lista de anexos-->
        <?php if (count($fotos)) : ?>
            <table>
                <tr>
                    <th>Foto</th>
                    <th>Opções</th>
                </tr>

                <?php foreach ($fotos as $foto) : ?>
                    <tr>
                        <td><?= $foto['nome']; ?></td>
                        <td>
                            <a href="fotos/<?= $foto['arquivo']; ?>">Download</a>
                            <a href="remover_foto.php?id=<?= $foto['id']; ?>">Remover</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>Não há fotos para este contato.</p>
        <?php endif; ?>

        <!-- formulario para um novo anexo -->
        <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Nova foto</legend>
                <input type="hidden" name='contato_id' value="<?= $contato['id'] ?>">
                <label>
                    <?php if ($tem_erros && array_key_exists('foto', $erros_validacao)) : ?>
                        <span class="erro">
                            <?= $erros_validacao['foto']; ?>
                        </span>
                    <?php endif; ?>
                    <input type="file" name="foto">
                </label>
                <input type="submit" value="Cadastrar">
            </fieldset>
        </form>

    </div>
</body>

</html>