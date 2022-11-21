<?php

$nome_pagina = "Cadastro de Doadores";
require "cabecalho.php";
?>



<form action="inserir-doador.php" method="POST">
    <div class="row">
        <div class="col-3">
            <div class="mb-3">
                <label for="nome">Nome Completo:</label>
                <input type="nome" id="nome" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="telefone">Telefone:</label>
                <input type="telefone" id="telefone" name="telefone" class="form-control" required pattern="(##)#####-####">
            </div>

            <div class="mb-3">
                <label for="cpf">CPF:</label>
                <input type="cpf" id="cpf" name="cpf" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="endereço">Endereço:</label>
                <input type="endereço" id="endereço" name="endereço" class="form-control" required>
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
                <input type="data" id="datacad" name="datacad" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="confsenha"> Confirmação de senha:</label>
                <input type="password" id="confsenha" name="confsenha" class="form-control" required>
            </div>

        </div>
        
        


    <button type="submit" class="btn btn-primary"> Gravar </button>
    <button type="reset" class="btn btn-warning"> Cancelar </button>
    </div>

</form>
<?php
require "rodape.php";
?>