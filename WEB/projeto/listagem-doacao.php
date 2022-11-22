<?php
$nome_pagina = "Listagem de Doações";
require "cabecalho.php";
require "conexao.php";

$sql = "select * FROM doacao order by coddoacao";
$stmt = $conn->query($sql);

?>
<div class="table-responsive">
    <table class="table tble-striped">
        <thead>
            <tr>
                <th scope="col" style="width: 10%;">ID Doação</th>
                <th scope="col" style="width: 12%;">Nome doador</th> 
                <th scope="col" style="width: 10s%;">ID Doador</th>
                <th scope="col" style="width: 12%;">Nome do Produto</th> 
                <th scope="col" style="width: 12%;">Código do Produto</th>
                <th scope="col" style="width: 12%;">Data da Doação</th>
                <th scope="col" style="width: 12%;">Tipo da Doação</th>
                <th scope="col" style="width: 10%;" colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while ($row = $stmt->fetch()){
                $codProdutos = $row['codprodutos'];

                $sqlProduto = "SELECT * FROM produtos WHERE codprodutos = $codProdutos";
                $stmtProduto = $conn->query($sqlProduto);
                $resultProduto = $stmtProduto->fetch();
                $nomeProduto = $resultProduto['produto'];
            ?>
            <tr>
                <td><?= $row['coddoacao'] ?></td>
                <td><?= $row['nomedoador'] ?></td>
                <td><?= $row['coddoador'] ?></td>
                <td><?= $nomeProduto ?></td>
                <td><?= $row['codprodutos'] ?></td>
                <td><?= $row['data'] ?></td>
                <td><?= $row['tipodoacao'] ?></td>
                <td>
                    <a class="btn btn-sm btn-warning"
                       href="formulario-alterar-doacao.php?coddoacao=<?= $row['coddoacao']; ?>">
                        <span data-feather="edit"></span>
                        Editar
                    </a>
                </td>
                <td>
                    <a class="btn btn-sm btn-danger"
                    href="excluir-doacao.php?coddoacao=<?= $row['coddoacao']; ?>"
                    onclick="if(!confirm('Tem certeza que deseja excluir?')) return false;">
                        <span data-feather="trash-2"></span>
                        Excluir
                    </a>
                </td>
            </tr>
            <?php 
            }
            ?>
        </tbody> 
    </table>
</div>
<?php

require "rodape.php";

?>
           