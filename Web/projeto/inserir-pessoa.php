<?php

$nome_pagina = "Inserir Pessoa";
require "cabecalho.php";
require "conexao.php";

$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_SPECIAL_CHARS);
$cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_SPECIAL_CHARS);
$endereço = filter_input(INPUT_POST, "endereço", FILTER_SANITIZE_SPECIAL_CHARS);
$numero = filter_input(INPUT_POST, "numero", FILTER_SANITIZE_SPECIAL_CHARS);
$bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_SPECIAL_CHARS);
$genero = filter_input(INPUT_POST, "genero", FILTER_SANITIZE_SPECIAL_CHARS);
$datacad = filter_input(INPUT_POST, "datacad", FILTER_SANITIZE_SPECIAL_CHARS);


echo "<p>Nome: $nome</p>";
echo "<p>Telefone: $telefone</p>";
echo "<p>CPF: $cpf</p>";
echo "<p>Endereço: $endereço</p>";
echo "<p>Numero: $numero</p>";
echo "<p>Bairro: $bairro</p>";
echo "<p>Gênero: $genero</p>";
echo "<p>Data de Cadastro: $datacad</p>";


$sql = "insert into pessoas(nome, telefone, cpf, endereço, numero, bairro, genero, datacad) values (?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$nome, $telefone, $cpf, $endereço, $numero, $bairro, $genero, $datacad]);

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
    <a href="formulario.php">Voltar para o formulário de Cadastro</a>
</p>
<p>
    <a href="formulario.php">Ir para a listagem de Doações</a>
</p>

<?php
require "rodape.php";
?>