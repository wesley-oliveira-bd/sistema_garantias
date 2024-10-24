<header>
    <h3>Dados Fiscais</h3>
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
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $sql = "SELECT 
        id,
        upper(nome_cliente) AS nome_cliente,
        cod_item,
        upper(num_fabricante) AS num_fabricante,
        quant,
        upper(fornecedor) AS fornecedor,
        nf_garantia,
        DATE_FORMAT(data_saida, '%d/%m/%Y') AS data_saida,
        upper(status) AS status,
        nf_retorno,
        valor_venda
        FROM registros WHERE lower(status) <> 'procedente'";

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
            <td>R$ <?=number_format($dados['valor_venda'], 2, ',', '.') ?></td>
            <td><a href="index.php?menuop=editar_dados_fiscais&id=<?=$dados["id"]?>">editar</a></td>
        </tr>

    <?php } ?>

    </tbody>
    
</table>

<?php

?>