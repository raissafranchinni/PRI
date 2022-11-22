<?php

$nome_pagina = "Alterar Doador";
require "cabecalho.php";
require "conexao.php";

$codDoador = filter_input(INPUT_POST, "coddoador", FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_NUMBER_INT);
$cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_NUMBER_INT);
$numero = filter_input(INPUT_POST, "numero", FILTER_SANITIZE_NUMBER_INT);
$bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_SPECIAL_CHARS);
$rua = filter_input(INPUT_POST, "rua", FILTER_SANITIZE_SPECIAL_CHARS);
$datacad = filter_input(INPUT_POST, "datacad", FILTER_SANITIZE_SPECIAL_CHARS);

echo "<p>Nome: $nome</p>";
echo "<p>Telefone: $telefone</p>";
echo "<p>CPF: $cpf</p>";
echo "<p>Rua: $rua</p>";
echo "<p>Numero: $numero</p>";
echo "<p>Bairro: $bairro</p>";
echo "<p>Data de Cadastro: $datacad</p>";

$sql = "update doador set
                         nome = ?, 
                         telefone = ?, 
                         cpf = ?,
                         numero = ?,
                         bairro = ?,
                         rua = ?,
                         datacadastro = ?
                         where coddoador = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$nome, $telefone, $cpf, $numero, $bairro, $rua, $datacad, $codDoador]);

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