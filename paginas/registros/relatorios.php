<header>
    <h3>Relatórios</h3>
</header>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Cod.Item</th>
            <th>N.Fabricante</th>
            <th>QT</th>
            <th>Fornecedor</th>
            <th>NF Garantia</th>
            <th>Data saida</th>
            <th>Status</th>
            <th>NF Retorno</th>
            <th>Valor venda</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $sql = "SELECT * FROM registros";
        $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta" . mysqli_error($conexao));
        while($dados=mysqli_fetch_assoc($rs)){

    ?>
        <tr>
            <td><?=$dados["id"] ?></td>
            <td><?=$dados["nome_cliente"] ?></td>
            <td><?=$dados["cod_item"] ?></td>
            <td><?=$dados["num_fabricante"] ?></td>
            <td><?=$dados["quant"] ?></td>
            <td><?=$dados["fornecedor"] ?></td>
            <td><?=$dados["nf_garantia"] ?></td>
            <td><?=$dados["data_saida"] ?></td>
            <td><?=$dados["status"] ?></td>
            <td><?=$dados["nf_retorno"] ?></td>
            <td><?=$dados["valor_venda"] ?></td>
        </tr>

    <?php } ?>

    </tbody>
    
</table>

<?php

?>