<?php

$nome_pagina = "Excluir Doador ";
require "cabecalho.php";
require "conexao.php";

$codDoador = filter_input(INPUT_GET, "coddoador", FILTER_SANITIZE_NUMBER_INT);

$sqlVerifica = "SELECT COUNT(*) FROM doacao WHERE coddoador = $codDoador";
$stmtVerifica = $conn->query($sqlVerifica);
$resultVerifica = $stmtVerifica->fetch();
$qtdVerifica = $resultVerifica['count'];

if ($qtdVerifica > 0){
    $sql = "delete from doacao where coddoador = ?";

    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$codDoador]); 
    echo "<script>alert('Foi encontrado um ou mais registros de doação com este doador! Portando, também iremos excluir estes registros! Total de registros: $qtdVerifica');</script>";
}

echo "<p>codDoador:$codDoador</p>";


$sql = "delete from doador where coddoador = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$codDoador]);

if($result == true){
?>

<div class ="alert alert-success" role="alert">
    <h4>Dados Excluidos com sucesso!</h4>
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