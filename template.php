<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>
</head>

<body>
    <h1>Lista de contatos</h1>
    <form>
        <fieldset>
            <legend>Nova contato</legend>
            <label>
                Nome:
                <input type="text" name="nome" />
            </label><br>
            <label>
                Telefone:
                <input type="tel" name="telefone" />
            </label><br>
            <label>
                Email:
                <input type="email" name="email" />
            </label><br>
            <label>
                Descrição (Opcional):
                <textarea name="descricao"></textarea>
            </label><br>
            <label>
                Data de nascimento:
                <input type="date" name="data_nascimento">
            </label><br>
            <label>
                É favorito?
                <input type="checkbox" name="favorito" value="sim">
            </label><br>
            <input type="submit" value="Cadastrar">
        </fieldset>
    </form>

    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Data de Nasc.</th>
            <th>Descrição</th>
            <th>Favorito</th>
        </tr>
        <?php foreach ($listaContatos as $contato) : ?>
            <tr>
                <td><?= $contato['nome']; ?></td>
                <td><?= $contato['telefone']; ?></td>
                <td><?= $contato['email']; ?></td>
                <td><?= $contato['data_nascimento']; ?></td>
                <td><?= $contato['descricao']; ?></td>
                <td><?= $contato['favorito']; ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>