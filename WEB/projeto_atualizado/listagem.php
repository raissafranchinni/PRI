<?php
$nome_pagina = "Listagem de Doadores";
require "cabecalho.php";
require "conexao.php";

$sql = "select * FROM doador order by CodDoador";
$stmt = $conn->query($sql);

?>
<div class="table-responsive">
    <table class="table tble-striped">
        <thead>
            <tr>
                <th scope="col" style="width: 10%;">ID</th>
                <th scope="col" style="width: 12%;">Nome</th> 
                <th scope="col" style="width: 12%;">Telefone</th>
                <th scope="col" style="width: 12%;">CPF</th>
                <th scope="col" style="width: 12%;">Rua</th>
                <th scope="col" style="width: 10%;">Número</th>
                <th scope="col" style="width: 10%;">Bairro</th>
                <th scope="col" style="width: 10%;">Data de cadastro</th>
                <th scope="col" style="width: 10%;" colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while ($row = $stmt->fetch()){
            ?>
            <tr>
                <td><?= $row['coddoador'] ?></td>
                <td><?= $row['nome'] ?></td>
                <td><?= $row['telefone'] ?></td>
                <td><?= $row['cpf'] ?></td>
                <td><?= $row['rua'] ?></td>
                <td><?= $row['numero'] ?></td>
                <td><?= $row['bairro'] ?></td>
                <td><?= $row['datacadastro'] ?></td>
                <td>
                    <a class="btn btn-sm btn-warning"
                       href="formulario-alterar.php?coddoador=<?= $row['coddoador']; ?>">
                        <span data-feather="edit"></span>
                        Editar
                    </a>
                </td>
                <td>
                    <a class="btn btn-sm btn-danger"
                    href="excluir-doador.php?coddoador=<?= $row['coddoador']; ?>"
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
           