<?php

$nome_pagina = "Alterar Doação";
require "cabecalho.php";
require "conexao.php";

$codDoacao = filter_input(INPUT_POST, "coddoacao", FILTER_SANITIZE_NUMBER_INT);
$codDoador = filter_input(INPUT_POST, "nomedoador", FILTER_SANITIZE_NUMBER_INT);
$codProdutos = filter_input(INPUT_POST, "produtos", FILTER_SANITIZE_NUMBER_INT);
$data = filter_input(INPUT_POST, "data", FILTER_SANITIZE_SPECIAL_CHARS);
$tipoDoacao = filter_input(INPUT_POST, "tipodoacao", FILTER_SANITIZE_SPECIAL_CHARS);

$sqlNomeDoador = "SELECT nome FROM doador WHERE coddoador = $codDoador";
$stmtDoador = $conn->query($sqlNomeDoador);
$resultDoador = $stmtDoador->fetch();
$nomeDoador = $resultDoador['nome'];

$sqlNomeProduto = "SELECT produto FROM produtos WHERE codprodutos = $codProdutos";
$stmtProduto = $conn->query($sqlNomeProduto);
$resultProduto = $stmtProduto->fetch();
$nomeProduto = $resultProduto['produto'];

echo "<p>Nome: $nomeDoador</p>";
echo "<p>Produto: $nomeProduto</p>";
echo "<p>Data: $data</p>";
echo "<p>Tipo de doação: $tipoDoacao</p>";

$sql = "update doacao set
                         nomedoador = ?, 
                         coddoador = ?,
                         codprodutos = ?,
                         data = ?,
                         tipodoacao = ?
                         where coddoacao = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$nomeDoador, $codDoador, $codProdutos, $data, $tipoDoacao, $codDoacao]);

if($result == true){
?>

<div class ="alert alert-success" role="alert">
    <h4>Dados Alterados com sucesso!</h4>
</div>

<?php
} else{
    ?> 
    <div class="alert alert-danger" role="alert">
        <h4>Falha ao carregar os dados.</h4>
        <p><?php echo $stmt->error; ?></p>
    </div>
    <?php
}



require "rodape.php";
?>