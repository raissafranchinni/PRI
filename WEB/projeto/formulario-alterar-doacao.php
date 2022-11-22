<?php

$nome_pagina = "Formulário (alteração)";
require "cabecalho.php";

require "conexao.php";

$codDoacao = filter_input(INPUT_GET, "coddoacao", FILTER_SANITIZE_NUMBER_INT);

if (empty($codDoacao)) {
?>
    <div class="alert alert-danger" role="alert">
        <h4>Falha ao abrir formulário para edição.</h4>
        <p>CodDoacao está vazio.</p>
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
$sql = "select * FROM doacao where coddoacao = ?";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([$codDoacao]);

$doacao = $stmt->fetch();

?>

<form action="alterar-doacao.php" method="POST">

    <input type="hidden" name="coddoacao" value="<?= $codDoacao ?>" required>

    <div class="row">
        <div class="col-8">
        <div class="mb-3">
                <label for="nomedoador">Nome do Doador:</label>
                <select id="nomedoador" class="form-select" name="nomedoador">
                    <option>[Selecione um doador]</option>
                    <?php 
                        $sqlDoador = "select * from doador order by coddoador";
                        $stmt = $conn -> query($sqlDoador);

                        while ($rowDoador = $stmt->fetch()){
                            $nomeDoador = $rowDoador['nome'];
                            $codDoador = $rowDoador['coddoador'];

                            if ($doacao['coddoador'] == $codDoador){
                                echo "<option selected value='$codDoador'>$nomeDoador</option>"; 
                            } else {
                                echo "<option value='$codDoador'>$nomeDoador</option>";
                            }
                        }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="produtos">Produto</label>
                <select id="produtos" class="form-select" name="produtos">
                    <option>[Selecione um produto]</option>
                    <?php 
                        $sqlProdutos = "select * from produtos order by codprodutos";
                        $stmt = $conn -> query($sqlProdutos);

                        while ($rowProduto = $stmt->fetch()){
                            $nomeProduto = $rowProduto['produto'];
                            $codProdutos = $rowProduto['codprodutos'];

                            if ($doacao['codprodutos'] == $codProdutos){
                                echo "<option selected value='$codProdutos'>$nomeProduto</option>";
                            } else {
                                echo "<option value='$codProdutos'>$nomeProduto</option>";
                            }
                        }
                    ?>
                </select>
            </div> 

            <div class="mb-3">
                <label for="data">Data:</label>
                <input type="text" id="data" name="data" class="form-control" required value="<?= $doacao['data'] ?>">
            </div>

            <div class="mb-3">
                <label for="tipodoacao">Tipo da doação:</label>
                <input type="text" id="tipodoacao" name="tipodoacao" class="form-control" required value="<?= $doacao['tipodoacao'] ?>">
            </div>

        </div>
    </div>

    <button type="submit" class="btn btn-primary"> Gravar </button>
    <button type="reset" class="btn btn-wearing"> Cancelar </button>
</form>
<?php
require "rodape.php";
?>