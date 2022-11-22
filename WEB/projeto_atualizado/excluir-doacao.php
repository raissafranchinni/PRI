<?php

$nome_pagina = "Excluir Doação";
require "cabecalho.php";
require "conexao.php";

$codDoacao = filter_input(INPUT_GET, "coddoacao", FILTER_SANITIZE_NUMBER_INT);

echo "<p>codDoacao: $codDoacao</p>";


$sql = "delete from doacao where coddoacao = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$codDoacao]);

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