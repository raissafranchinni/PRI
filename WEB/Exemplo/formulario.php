<?php

$nome_pagina = "Página Inicial de Aplicação";
require "cabecalho.php";
?>

<style>
img{
    display: none;
}
</style>
<script>
function imagePreview(valor){

    var img = document.getElementById('img-preview');

    if(valor){
        img.setAttribute('src', valor);
        img.style.display = 'inline';
    }else{
        img.style.display = 'none';
    }
}
</script>
<form action="inserir-pessoa.php" method="POST">
    <div class="row">
        <div class="col-8">
            <div class="mb-3">
                <label for="nome">Nome Completo:</label>
                <input type="nome" id="nome" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="telefone">Telefone:</label>
                <input type="telefone" id="telefone" name="telefone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cpf">CPF:</label>
                <input type="cpf" id="cpf" name="cpf" class="form-control" required>
            </div>
          
            <div class="mb-3">
                <label class="form-label" for="endereço">Endereço:</label>
                <textarea class="form-control" name="sobre" id="sobre"> </textarea>
            </div>

            <div class="mb-3">
                <label for="numero">N°:</label>
                <input type="numero" id="numero" name="numero" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="bairro">Bairro:</label>
                <input type="bairro" id="bairro" name="bairro" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="genero">Gênero:</label>
                <input type="genero" id="genero" name="genero" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="datacad">Data de Cadastro:</label>
                <input type="datacad" id="datacad" name="datacad" class="form-control" required>
            </div>

        </div>
        <div class="col-4">
            <img src="..." class="img-thumbnail" id="img-preview" alt="...">
        </div>
    </div>
    <button type="submit" class="btn btn-primary"> Gravar </button>
    <button type="reset" class="btn btn-warning"> Cancelar </button>
</form>

</s

<?php
require "rodape.php";
?>