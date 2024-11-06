<?php
function formatarData($data) {
    $dataObj = DateTime::createFromFormat('Y-m-d', $data);
    return $dataObj ? $dataObj->format('d/m/Y') : '';
}

// Verifica se o ID foi enviado via POST e se não está vazio
if (isset($_POST['informar_id']) && !empty($_POST['informar_id'])) {
    $id = $_POST['informar_id']; // Captura o ID informado

    // Proteção contra injeção de SQL
    $id = mysqli_real_escape_string($conexao, $id);

    // Query para buscar o registro com o ID informado
    $sql = "SELECT * FROM registros WHERE id={$id}";
    $rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar dados: " . mysqli_error($conexao));

    // Verifica se encontrou o registro
    if (mysqli_num_rows($rs) > 0) {
        $dados = mysqli_fetch_assoc($rs); // Armazena os dados do registro
    } else {
        echo "Registro não encontrado.";
        $dados = []; // Define um array vazio para evitar o erro
    }
} else {
    $dados = []; // Inicializa a variável como um array vazio caso não haja pesquisa
}
?>

<header>
    
</header>

<form method="POST" action="">
    <div class="input-group mb-5 mt-5 d-print-none">
        <span class="input-group-text" for="informar_id">Informe o ID:</span>
        <input class="form-control col-md-2" type="number" name="informar_id" id="informar_id">
        <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i> Pesquisar</button>
    </div>
</form>

<div name="certificado" class="border border-light p-4 rounded" id="certificado">
    <h3>Certificado de Garantia</h3>
    <div class="row mb-2">
        <div class="col-md-2 input-group">
            <span class="input-group-text">ID</span>
            <p name="id" class="form-control"><?php echo isset($dados["id"]) ? $dados["id"] : ''; ?></p>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-6 input-group">
            <span class="input-group-text">Cliente</span>
            <p name="nome_cliente" class="form-control"><?php echo isset($dados["nome_cliente"]) ? strtoupper($dados["nome_cliente"]) : ''; ?></p>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-4">
            <div class="input-group">
                <span class=" input-group-text">Veículo</span>
                <p name="fab_veiculo" class="form-control"><?php echo isset($dados["fab_veiculo"]) ? strtoupper($dados["fab_veiculo"]) : ''; ?></p>
                <p name="mod_veiculo" class="form-control"><?php echo isset($dados["mod_veiculo"]) ? $dados["mod_veiculo"] : ''; ?></p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="input-group">
                <span class="input-group-text">Ano</span>
                <p name="ano_veiculo" class="form-control"><?php echo isset($dados["ano_veiculo"]) ? $dados["ano_veiculo"] : ''; ?></p>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-3 input-group">
            <span class="input-group-text">Marca</span>
            <p name="fab_item" class="form-control"><?php echo isset($dados["fab_item"]) ? strtoupper($dados["fab_item"]) : ''; ?></p>
        </div>
        <div class="col-md-3 input-group">
            <span class="input-group-text">N. peça</span>
            <p name="num_fabricante" class="form-control"><?php echo isset($dados["num_fabricante"]) ? strtoupper($dados["num_fabricante"]) : ''; ?></p>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-3 input-group">
            <span class="input-group-text">KM aplicação:</span>
            <p name="km_aplicacao" class="form-control"><?php echo isset($dados["km_aplicacao"]) ? $dados["km_aplicacao"] : ''; ?></p>
        </div>
        <div class="col-md-3 input-group">
            <span class="input-group-text">KM defeito:</span>
            <p name="km_defeito" class="form-control"><?php echo isset($dados["km_defeito"]) ? $dados["km_defeito"] : ''; ?></p>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-6 input-group">
            <span class="input-group-text">Defeito</span>
            <p name="defeito" class="form-control"><?php echo isset($dados["defeito"]) ? strtoupper($dados["defeito"]) : ''; ?></p>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-3 input-group">
            <span class="input-group-text">NF venda cliente</span>
            <p name="nf_venda" class="form-control"><?php echo isset($dados["nf_venda"]) ? $dados["nf_venda"] : ''; ?></p>
        </div>
        <div class="col-md-3 input-group">
            <span class="input-group-text">Emissão</span>
            <p name="data_nf_venda" class="form-control"><?php echo isset($dados["data_nf_venda"]) ? formatarData($dados["data_nf_venda"]) : ''; ?></p>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-6 input-group">
            <span class="input-group-text">Distribuidor</span>
            <p name="fornecedor" class="form-control"><?php echo isset($dados["fornecedor"]) ? strtoupper($dados["fornecedor"]) : ''; ?></p>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-3 input-group">
            <span class="input-group-text">NF compra</span>
            <p name="nf_compra" class="form-control"><?php echo isset($dados["nf_compra"]) ? $dados["nf_compra"] : ''; ?></p>
        </div>
        <div class="col-md-3 input-group">
            <span class="input-group-text">Emissão</span>
            <p name="data_nf_compra" class="form-control"><?php echo isset($dados["data_nf_compra"]) ? formatarData($dados["data_nf_compra"]) : ''; ?></p>
        </div>
    </div>
</div>

