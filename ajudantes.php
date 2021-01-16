<?php


/**
 * @param string $data
 * @return string
 */
function traduz_data_para_exibir($data)
{
    if (empty($data) or $data === '0000-00-00') {
        return '';
    }

    $objeto_data = DateTime::createFromFormat('Y-m-d', $data);
    return $objeto_data->format('d-m-Y');
}


/**
 * @param int $favorito
 * @return string
 */
function traduz_favorito($favorito)
{
    return $favorito ? 'Sim' : 'Não';
}


/**
 * @return bool
 */
function tem_post()
{
    return count($_POST) > 0;
}


/**
 * @param bool $editar
 * @return array|null
 */
function pegar_dados($editar = false)
{
    if (array_key_exists('enviar', $_POST)) {
        $contato = [];
        $erros = [];

        if ($editar) {
            $contato['id'] = $_GET['id'];
        }

        if (array_key_exists('nome', $_POST) && strlen($_POST['nome']) > 0) {
            $contato['nome'] = $_POST['nome'];
        } else {
            $erros['nome'] = 'O nome não pode estar vazio.';
        }

        if (array_key_exists('telefone', $_POST) && strlen($_POST['telefone']) > 0) {
            if (validar_telefone($_POST['telefone'])) {
                $contato['telefone'] = $_POST['telefone'];
            } else {
                $erros['telefone'] = 'O telefone está no formato incorreto.';
            }
        } else {
            $contato['telefone'] = '';
        }

        if (array_key_exists('email', $_POST) && strlen($_POST['email']) > 0) {
            if (validar_email($_POST['email'])) {
                $contato['email'] = $_POST['email'];
            } else {
                $erros['email'] = 'O email é inválido.';
            }
        } else {
            $contato['email'] = '';
        }

        if (array_key_exists('descricao', $_POST)) {
            $contato['descricao'] = $_POST['descricao'];
        } else {
            $contato['descricao'] = '';
        }

        if (array_key_exists('data_nascimento', $_POST)) {
            if (validar_data($_POST['data_nascimento'])) {
                $contato['data_nascimento'] = $_POST['data_nascimento'];
            } else {
                $erros['data_nascimento'] = 'Data de nascimento em formato inválido.';
            }
        } else {
            $contato['data_nascimento'] = '';
        }

        if (array_key_exists('favorito', $_POST)) {
            $contato['favorito'] = 1;
        } else {
            $contato['favorito'] = 0;
        }
    }

    return null;
}


/**
 * @param string $telefone
 * @return bool
 */
function validar_telefone($telefone)
{
    $padrao = '^\([\d]{2}\)[\d]{4,5}\-[\d]{4}$/';
    return (bool) preg_match($padrao, $telefone);
}


/**
 * @param string $email
 * @return bool
 */
function validar_email($email)
{
    $padrao = '/^[\w\.\_]+\@[\w]+\.[\w]+(\.[\w]+)?(\.[\w]+)?$/';
    return (bool) preg_match($padrao, $email);
}


/**
 * @param string $data
 * @return bool
 */
function validar_data($data)
{
    $padrao = '/^[\d]{4}\-[\d]{1,2}\-[\d]{1,2}$/';
    $resultado = preg_match($padrao, $data);

    if ($resultado === 0) {
        return false;
    }

    $data = explode('/', $data);

    $dia = $data[0];
    $mes = $data[1];
    $ano = $data[2];

    return checkdate($mes, $dia, $ano);
}


/**
 * @param array $foto
 */
function tratar_foto($foto)
{
    $padrao = '/^.+(\.jpg|\.png|\.bmp|\.webp)$/';
    $resultado = preg_match($padrao, $foto['name']);
    if ($resultado === 0) {
        return false;
    }

    move_uploaded_file($foto['tmp_name'], "fotos/{$foto['name']}");
    return true;
}