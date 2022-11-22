<?php

$nome_pagina = "Inserir Pessoa";
require "cabecalho.php";
require "conexao.php";

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

$sql = "insert into doacao (nomeDoador, CodDoador, codProdutos, data, tipoDoacao) values (?,?,?,?,?)";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$nomeDoador, $codDoador, $codProdutos, $data, $tipoDoacao]);

if($result == true){
?>

<div class ="alert alert-success" role="alert">
    <h4>Dados gravados com sucesso!</h4>
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

?>
<p>
    <a href="formulario-doacao.php">Voltar para o formulário de Cadastro</a>
</p>
<p>
    <a href="listagem-doacao.php">Ir para a listagem de Doações</a>
</p>

<?php
require "rodape.php";
?>*/