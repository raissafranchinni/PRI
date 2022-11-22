<?php

$nome_pagina = "Formulário (alteração)";
require "cabecalho.php";

require "conexao.php";

$codDoador = filter_input(INPUT_GET, "coddoador", FILTER_SANITIZE_NUMBER_INT);

if (empty($codDoador)) {
?>
    <div class="alert alert-danger" role="alert">
        <h4>Falha ao abrir formulário para edição.</h4>
        <p>CodDoador está vazio.</p>
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
$sql = "select * FROM doador where coddoador  = ?";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([$codDoador]);

$doador = $stmt->fetch();

?>

<form action="alterar-doador.php" method="POST">

    <input type="hidden" name="coddoador" value="<?= $codDoador ?>" required>

    <div class="row">
        <div class="col-8">
            <div class="mb-3">
                <label for="nomecompleto">Nome:</label>
                <input type="nome" id="nome" name="nome" class="form-control" required value="<?= $doador['nome'] ?>">
            </div>
            
            <div class="mb-3">
                <label for="telefone">Telefone:</label>
                <input type="telefone" id="telefone" name="telefone" class="form-control" required value="<?= $doador['telefone'] ?>">
            </div>

            <div class="mb-3">
                <label for="cpf">CPF:</label>
                <input type="cpf" id="cpf" name="cpf" class="form-control" required value="<?= $doador['cpf'] ?>">
            </div>

            <div class="mb-3">
                <label for="endereço">Endereço:</label>
                <input type="endereço" id="endereço" name="rua" class="form-control" required value="<?= $doador['rua'] ?>">
            </div>

            <div class="mb-3">
                <label for="numero">N°:</label>
                <input type="numero" id="numero" name="numero" class="form-control" required value="<?= $doador['numero'] ?>">
            </div>

            <div class="mb-3">
                <label for="bairro">Bairro:</label>
                <input type="bairro" id="bairro" name="bairro" class="form-control" required value="<?= $doador['bairro'] ?>">
            </div>

            <div class="mb-3">
                <label for="datacad">Data de Cadastro:</label>
                <input type="datacad" id="datacad" name="datacad" class="form-control" required value="<?= $doador['datacadastro'] ?>">
            </div>

        </div>
    </div>

    <button type="submit" class="btn btn-primary"> Gravar </button>
    <button type="reset" class="btn btn-wearing"> Cancelar </button>
</form>
<?php
require "rodape.php";
?>