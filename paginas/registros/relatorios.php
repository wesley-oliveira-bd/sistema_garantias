<header>
    <h3>Relatórios</h3>
</header>

<form action="index.php?menuop=relatorios" method="post">
    <input type="text" name="txt_pesquisa" id="">
    <input type="submit" value="Pesquisar">
    <input type="text" name="filtro_nfs">
    <button type="submit" name="nfs_a_emitir" value="1">NFs a Emitir</button>
</form>

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
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>

    <?php

        $quantidade = 10;
        $pagina = (isset($_GET["pagina"])?(int)$_GET["pagina"]:1);
        $inicio = ($quantidade * $pagina)-$quantidade;

        $txt_pesquisa = (isset($_POST["txt_pesquisa"]))?$_POST["txt_pesquisa"]:"";
        $nfs_a_emitir = isset($_POST["nfs_a_emitir"]) ? $_POST["nfs_a_emitir"] : "";
        $filtro_nfs = isset($_POST["filtro_nfs"]) ? $_POST["filtro_nfs"] : "";

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
        FROM registros
        
        ";

        if ($nfs_a_emitir) {
            // Filtro para registros com NF Garantia vazia ou igual a "0"
            $sql .= " WHERE (nf_garantia = '' OR nf_garantia = '0') AND fornecedor LIKE '%{$filtro_nfs}%' LIMIT $inicio, $quantidade";
        } else {
            // Filtro de pesquisa normal
            $sql .= " WHERE 
                id = '{$txt_pesquisa}'
                OR nome_cliente LIKE '%{$txt_pesquisa}%'
                OR cod_item LIKE '%{$txt_pesquisa}%'
                OR num_fabricante LIKE '%{$txt_pesquisa}%'
                OR fornecedor LIKE '%{$txt_pesquisa}%'
                OR status LIKE '%{$txt_pesquisa}%'
                LIMIT $inicio, $quantidade";
        }

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
            <td><a href="index.php?menuop=excluir_registro&id=<?=$dados["id"]?>"> X </a></td>
        </tr>

    <?php } ?>

    </tbody>
    
</table>
<br>

<?php
    //parte da paginação
    $sqlTotal = "SELECT id FROM registros";
    $qrTotal = mysqli_query($conexao, $sqlTotal) or die (mysqli_error($conexao));
    $numTotal = mysqli_num_rows($qrTotal);
    $totalPaginas = ceil($numTotal/$quantidade);
    echo "Total de registros: $numTotal";
    echo "<br>";
    echo '<a href="?menuop=relatorios&pagina=1">Primeira página</a>';        

    if($pagina>6){
        ?>
            <a href="?menuop=relatorios&pagina=<?php echo $pagina-1 ?>"> << </a>
        <?php
    }

    for($i=1; $i<=$totalPaginas; $i++){
        if($i>=($pagina-5) && $i<=($pagina+5)){
            if($i==$pagina){
                echo $i;
            } else {
                echo "<a href=\"?menuop=relatorios&pagina=$i\">$i</a> ";
            }
        }
    }

    if($pagina<($totalPaginas-5)){
        ?>
            <a href="?menuop=relatorios&pagina=<?php echo $pagina+1 ?>"> >> </a>
        <?php
    }

    echo "<a href=\"?menuop=relatorios&pagina=$totalPaginas\">Última página página</a>";
?>