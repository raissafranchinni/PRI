<?php

$nome_pagina = "Formulário (alteração)";
require "cabecalho.php";

require "conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) {
?>
    <div class="alert alert-danger" role="alert">
        <h4>Falha ao abrir formulário para edição.</h4>
        <p>ID depessoas está vazio.</p>
        <p><?php echo $stmt->error; ?></p>
    </div>
<?php
    exit;
}
?>
<script>
    function imagePreview(valor) {

        var img = document.getElementById('img-preview');

        if (valor) {
            img.setAttribute('src', valor);
            img.style.display = 'inline';
        } else {
            img.style.display = 'none';
        }
    }
</script>
<?php
$sql = "select id, nome, telefone, cpf, endereço, numero, bairro, genero, datacad sobre FROM pessoas where id  = ?";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([$id]);

$pessoa = $stmt->fetch();

?>

<form action="alterar-pessoa.php" method="POST">

    <input type="hidden" name="id" value="<?= $id ?>" required>

    <div class="row">
        <div class="col-8">
            <div class="mb-3">
                <label for="nomecompleto">Nome Completo:</label>
                <input type="nome" id="nome" name="nome" class="form-control" required value="<?= $pessoa['nome'] ?>">
            </div>
            
            <div class="mb-3">
                <label for="telefone">Telefone:</label>
                <input type="telefone" id="telefone" name="telefone" class="form-control" required value="<?= $pessoa['telefone'] ?>">
            </div>

            <div class="mb-3">
                <label for="cpf">CPF:</label>
                <input type="cpf" id="cpf" name="cpf" class="form-control" required value="<?= $pessoa['cpf'] ?>">
            </div>

            <div class="mb-3">
                <label for="endereço">Endereço:</label>
                <input type="endereço" id="endereço" name="endereço" class="form-control" required value="<?= $pessoa['endereço'] ?>">
            </div>

            <div class="mb-3">
                <label for="numero">N°:</label>
                <input type="numero" id="numero" name="numero" class="form-control" required value="<?= $pessoa['numero'] ?>">
            </div>

            <div class="mb-3">
                <label for="bairro">Bairro:</label>
                <input type="bairro" id="bairro" name="bairro" class="form-control" required value="<?= $pessoa['bairro'] ?>">
            </div>

            <div class="mb-3">
                <label for="genero">Gênero:</label>
                <input type="genero" id="genero" name="genero" class="form-control" required value="<?= $pessoa['genero'] ?>">
            </div>

            <div class="mb-3">
                <label for="datacad">Data de Cadastro:</label>
                <input type="datacad" id="datacad" name="datacad" class="form-control" required value="<?= $pessoa['datacad'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label" for="sobre">Sobre a pessoa:</label>
                <textarea class="form-control" name="sobre" id="sobre"> <?= $pessoa['sobre'] ?></textarea>
            </div>
        </div>
        <div class="col-4">
            <image src="<?= $pessoa['urlfoto'] ?>" class="img-thumbnail" id="img-preview" alt="...">
        </div>
    </div>

    <button type="submit" class="btn btn-primary"> Gravar </button>
    <button type="reset" class="btn btn-wearing"> Cancelar </button>
</form>
<?php
require "rodape.php";
?>