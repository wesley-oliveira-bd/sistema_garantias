<header><h3>Atualizar Dados Fiscais</h3></header>

<?php

$id = mysqli_real_escape_string($conexao, $_POST["id"]);
$fornecedor = mysqli_real_escape_string($conexao, $_POST["fornecedor"]);
$nf_compra = mysqli_real_escape_string($conexao, $_POST["nf_compra"]);
$data_nf_compra = mysqli_real_escape_string($conexao, $_POST["data_nf_compra"]);
$valor_compra = mysqli_real_escape_string($conexao, $_POST["valor_compra"]);
$nf_venda = mysqli_real_escape_string($conexao, $_POST["nf_venda"]);
$data_nf_venda = mysqli_real_escape_string($conexao, $_POST["data_nf_venda"]);
$nf_garantia = mysqli_real_escape_string($conexao, $_POST["nf_garantia"]);
$data_nf_garantia = mysqli_real_escape_string($conexao, $_POST["data_nf_garantia"]);
$transporte = mysqli_real_escape_string($conexao, $_POST["transporte"]);
$nf_retorno = mysqli_real_escape_string($conexao, $_POST["nf_retorno"]);
$data_nf_retorno = mysqli_real_escape_string($conexao, $_POST["data_nf_retorno"]);
$status = mysqli_real_escape_string($conexao, $_POST["status"]);
$observ = mysqli_real_escape_string($conexao, $_POST["observ"]);

$sql = "UPDATE registros SET
    fornecedor = '{$fornecedor}',
    nf_compra = '{$nf_compra}',
    data_nf_compra = '{$data_nf_compra}',
    valor_compra = '{$valor_compra}',
    nf_venda = '{$nf_venda}',
    data_nf_venda = '{$data_nf_venda}',
    nf_garantia = '{$nf_garantia}',
    data_nf_garantia = '{$data_nf_garantia}',
    transporte = '{$transporte}',
    nf_retorno = '{$nf_retorno}',
    data_nf_retorno = '{$data_nf_retorno}',
    status = '{$status}',
    observ = '{$observ}' 
    WHERE id = '{$id}'
";

mysqli_query($conexao, $sql) or die ("Erro ao atualizar registro." . mysqli_error($conexao));

echo "Registro atualizado com sucesso.";

?>
