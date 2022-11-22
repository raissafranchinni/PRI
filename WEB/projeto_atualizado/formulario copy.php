<?php

$nome_pagina = "Formulário de usuários";
require "cabecalho.php";
?>


<form action="inserir-usuario
.php" method="POST">
    <div class="row">
        <div class="col-8">
            <div class="mb-3">
                <label for="nomecompleto">Nome Completo:</label>
                <input type="nome" id="nome" name="nome" class="form-control" required>
            </div>
           
            </div>
            
        </div>
        <div class="col-3">
            <img src="..." class="img-thumbnail" id="img-preview" alt="...">
        </div>
    </div>
    <button type="submit" class="btn btn-primary"> Gravar </button>
    <button type="reset" class="btn btn-warning"> Cancelar </button>
</form>
<?php
require "rodape.php";
?>