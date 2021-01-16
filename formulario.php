<form method="POST">
    <fieldset>
        <legend>Novo contato</legend>
        <input type="hidden" name="id" value="<?= $contato['id'] ?>">
        <label>
            Nome:
            <input type="text" name="nome" value="<?= $contato['nome'] ?>" />
        </label><br>
        <label>
            Telefone:
            <input type="tel" name="telefone" value="<?= $contato['telefone'] ?>" />
        </label><br>
        <label>
            Email:
            <input type="email" name="email" value="<?= $contato['email'] ?>" />
        </label><br>
        <label>
            Descrição (Opcional):
            <textarea name="descricao"><?= $contato['descricao'] ?></textarea>
        </label><br>
        <label>
            Data de nascimento:
            <input type="date" name="data_nascimento" value="<?= $contato['data_nascimento'] ?>">
        </label><br>
        <label>
            É favorito?
            <input type="checkbox" name="favorito" <?= $contato['favorito'] ? 'checked' : '' ?> />
        </label><br>
        <input type="submit" name="enviar" value="<?= $contato['id'] > 0 ? 'Atualizar' : 'Cadastrar'; ?>">
    </fieldset>
</form>