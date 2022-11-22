<?php

$nome_pagina = "Cadastro de Doação";
require "cabecalho.php";
require "conexao.php";
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
<form action="inserir-doacao.php" method="POST">
    <div class="row">
        <div class="col-8">
            <div class="mb-3">
                <label for="nomedoador">Nome do Doador:</label>
                <select id="nomedoador" class="form-select" name="nomedoador">
                    <option selected>[Selecione um doador]</option>
                    <?php 
                        $sqlDoador = "select * from doador order by coddoador";
                        $stmt = $conn -> query($sqlDoador);

                        while ($rowDoador = $stmt->fetch()){
                            $nomeDoador = $rowDoador['nome'];
                            $codDoador = $rowDoador['coddoador'];
                            echo "<option value='$codDoador'>$nomeDoador</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="produtos">Produto</label>
                <select id="produtos" class="form-select" name="produtos">
                    <option selected>[Selecione um produto]</option>
                    <?php 
                        $sqlProdutos = "select * from produtos order by codprodutos";
                        $stmt = $conn -> query($sqlProdutos);

                        while ($rowProduto = $stmt->fetch()){
                            $nomeProduto = $rowProduto['produto'];
                            $codProdutos = $rowProduto['codProdutos'];
                            echo "<option value='$codProdutos'>$nomeProduto</option>";
                        }
                    ?>
                </select>
            </div> 

            <div class="mb-3">
                <label for="data">Data:</label>
                <input type="text" id="data" name="data" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tipodoacao">Tipo da doação:</label>
                <input type="tipodoacao" id="tipodoacao" name="tipodoacao" class="form-control" required>
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