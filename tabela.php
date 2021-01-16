<table border="1">
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Data de Nasc.</th>
        <th>Descrição</th>
        <th>Favorito</th>
        <th>Opções</th>
    </tr>
    <?php foreach ($listaContatos as $contato) : ?>
        <tr>
            <td>
                <a href="contato.php?id=<?= $contato['id']; ?>">
                    <?= $contato['nome']; ?>
                </a>
            </td>
            <td><?= $contato['telefone']; ?></td>
            <td><?= $contato['email']; ?></td>
            <td><?= traduz_data_para_exibir($contato['data_nascimento']); ?></td>
            <td><?= $contato['descricao']; ?></td>
            <td><?= traduz_favorito($contato['favorito']); ?></td>
            <td>
                <a href="editar.php?id=<?= $contato['id'] ?>">Editar</a>
                <a href="remover.php?id=<?= $contato['id'] ?>">Remover</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>