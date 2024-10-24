<header>
    <h3>Atualizar Chamado</h3>
</header>

<?php 

$id = mysqli_real_escape_string($conexao, $_POST["id"]);
$data_abertura = mysqli_real_escape_string($conexao, $_POST["data_abertura"]);
$cod_cliente = mysqli_real_escape_string($conexao, $_POST["cod_cliente"]);
$nome_cliente = mysqli_real_escape_string($conexao, $_POST["nome_cliente"]);
$num_os = mysqli_real_escape_string($conexao, $_POST["num_os"]);
$data_os = mysqli_real_escape_string($conexao, $_POST["data_os"]);
$oficina = mysqli_real_escape_string($conexao, $_POST["oficina"]);
$valor_venda = mysqli_real_escape_string($conexao, $_POST["valor_venda"]);
$fab_veiculo = mysqli_real_escape_string($conexao, $_POST["fab_veiculo"]);
$mod_veiculo = mysqli_real_escape_string($conexao, $_POST["mod_veiculo"]);
$ano_veiculo = mysqli_real_escape_string($conexao, $_POST["ano_veiculo"]);
$placa_veiculo = mysqli_real_escape_string($conexao, $_POST["placa_veiculo"]);
$cod_item = mysqli_real_escape_string($conexao, $_POST["cod_item"]);
$num_fabricante = mysqli_real_escape_string($conexao, $_POST["num_fabricante"]);
$fab_item = mysqli_real_escape_string($conexao, $_POST["fab_item"]);
$quant = mysqli_real_escape_string($conexao, $_POST["quant"]);
$km_aplicacao = mysqli_real_escape_string($conexao, $_POST["km_aplicacao"]);
$km_defeito = mysqli_real_escape_string($conexao, $_POST["km_defeito"]);
$defeito = mysqli_real_escape_string($conexao, $_POST["defeito"]);

$sql = "UPDATE registros SET
    data_abertura = '{$data_abertura}',
    cod_cliente = '{$cod_cliente}',
    nome_cliente = '{$nome_cliente}',
    num_os = '{$num_os}',
    data_os = '{$data_os}',
    oficina = '{$oficina}',
    valor_venda = '{$valor_venda}',
    fab_veiculo = '{$fab_veiculo}',
    mod_veiculo = '{$mod_veiculo}',
    ano_veiculo = '{$ano_veiculo}',
    placa_veiculo = '{$placa_veiculo}',
    cod_item = '{$cod_item}',
    num_fabricante = '{$num_fabricante}',
    fab_item = '{$fab_item}',
    quant = '{$quant}',
    km_aplicacao = '{$km_aplicacao}',
    km_defeito = '{$km_defeito}',
    defeito = '{$defeito}' 
    WHERE id = '{$id}'
";

mysqli_query($conexao, $sql) or die ("Erro ao realizar a consulta." . mysqli_error($conexao));

echo "O registro foi atualizado com sucesso.";

?>