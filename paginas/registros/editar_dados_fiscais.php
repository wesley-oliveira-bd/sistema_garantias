<?php
// Função para formatar a data
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
        $dados = []; // Define um array vazio para evitar erro
    }
} else {
    $dados = []; // Inicializa a variável como um array vazio caso não haja pesquisa
}
?>

<header>
    <h3>Editar Dados Fiscais</h3>
</header>

<form method="POST" action="">
    <div class="input-group">
        <label for="informar_id">Informe o ID: </label>
        <input type="number" name="informar_id" id="informar_id">
        <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisar</button>
    </div>
</form>

<?php if (!empty($dados)): ?> <!-- Exibe o formulário somente se $dados estiver preenchido -->

<form action="index.php?menuop=inserir_dados_fiscais" method="post">
    <div class="row">
        <div class="col-md-2">
            <label class="form-label" for="id" name="id">ID: </label>
            <input class="form-control" type="number" name="id" id="id" readonly value="<?=$dados["id"]?>">
        </div>
        <div class="col-md-2">
            <label class="form-label"  for="cod_item" name="cod_item">Cod. peça: </label>
            <input class="form-control" type="number" name="cod_item" id="cod_item" readonly value="<?=$dados["cod_item"]?>">
        </div>
        <div class="col-md-2">
            <label class="form-label"  for="num_fabricante" name="num_fabricante">Número fabricante: </label>
            <input class="form-control" type="text" name="num_fabricante" id="num_fabricante" readonly value="<?=$dados["num_fabricante"]?>">
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label class="form-label"  for="fornecedor" name="fornecedor">Fornecedor: </label>
            <input class="form-control" type="text" name="fornecedor" id="fornecedor" value="<?=$dados["fornecedor"]?>">
        </div>
        <div class="col-md-3">
            <label class="form-label"  for="nf_compra" name="nf_compra">NF compra: </label>
            <input class="form-control" type="number" name="nf_compra" id="nf_compra" value="<?=$dados["nf_compra"]?>">
        </div>
        <div class="col-md-3">
            <label class="form-label"  for="data_nf_compra" name="data_nf_compra">Data compra: </label>
            <input class="form-control" type="date" name="data_nf_compra" id="data_nf_compra" value="<?=$dados["data_nf_compra"]?>">
        </div>
        <div class="col-md-3">
            <label class="form-label"  for="valor_compra" name="valor_compra">Valor compra: </label>
            <input class="form-control" type="number" name="valor_compra" id="valor_compra" value="<?=$dados["valor_compra"]?>">
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label class="form-label"  for="nf_venda" name="nf_venda">NF venda: </label>
            <input class="form-control" type="number" name="nf_venda" id="nf_venda" value="<?=$dados["nf_venda"]?>">
        </div>
        <div class="col-md-3">
            <label class="form-label"  for="data_nf_venda" name="data_nf_venda">Data venda: </label>
            <input class="form-control" type="date" name="data_nf_venda" id="data_nf_venda" value="<?=$dados["data_nf_venda"]?>">
        </div>
        <div class="col-md-3">
            <label class="form-label"  for="nf_garantia" name="nf_garantia">NF Garantia: </label>
            <input class="form-control" type="number" name="nf_garantia" id="nf_garantia" value="<?=$dados["nf_garantia"]?>">
        </div>
        <div class="col-md-3">
            <label class="form-label"  for="data_nf_garantia" name="data_nf_garantia">Data garantia: </label>
            <input class="form-control" type="date" name="data_nf_garantia" id="data_nf_garantia" value="<?=$dados["data_nf_garantia"]?>">
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label class="form-label" for="transporte" name="transporte">Transport.: </label>
            <input class="form-control" type="text" name="transporte" id="transporte" value="<?=$dados["transporte"]?>">
        </div>
        <div class="col-md-3">
            <label class="form-label" for="data_saida" name="data_saida">Data saida: </label>
            <input class="form-control" type="date" name="data_saida" id="data_saida" value="<?=$dados["data_saida"]?>">
        </div>
        <div class="col-md-3">
            <label class="form-label" for="nf_retorno" name="nf_retorno">NF retorno: </label>
            <input class="form-control" type="number" name="nf_retorno" id="nf_retorno" value="<?=$dados["nf_retorno"]?>">
        </div>
        <div class="col-md-3">
            <label class="form-label" for="data_nf_retorno" name="data_nf_retorno">Data retorno: </label>
            <input class="form-control" type="date" name="data_nf_retorno" id="data_nf_retorno" value="<?=$dados["data_nf_retorno"]?>">
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label class="form-label" for="status" name="status">Status: </label>
            <input class="form-control mb-3" type="text" name="status" id="status" value="<?=$dados["status"]?>">
        </div>
        <div class="col-md-6">
            <label class="form-label" for="observ" name="observ">Observ.: </label>
            <input class="form-control" type="text" name="observ" id="observ" value="<?=$dados["observ"]?>">
        </div>

        
        
    </div>

    <div class="d-grid gap-2">
        <button name="btn_salvar" class="btn btn-outline-success mb-3" type="submit">Salvar</button>
    </div>

</form>

<div class="row d-flex align-items-baseline"> <!-- Alinha os itens no centro verticalmente -->
    <!-- Coluna para o formulário de upload -->
    <div class="col-md-6 align-self-center">
        <form action="" method="post" id="form_upload_laudo" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$id?>">
            <label for="arquivo" class="form-label">Anexar laudo</label>
            <div class="input-group">
                <input class="form-control" type="file" name="arquivo" id="arquivo">
                <input class="btn btn-secondary" type="submit" value="Enviar">
            </div>
        </form>
    </div>

    <!-- Coluna para o botão "Ver Laudo" -->
    <div class="col-md-3 align-self-end"> <!-- Alinha o conteúdo verticalmente no centro -->
        <?php 
            if ($dados["laudo"] == "" || !file_exists('./paginas/registros/laudos/'.$dados["laudo"])) {
               $laudo = "sem_laudo.jpg";
            } else {
                $laudo = $dados["laudo"];
            }
        ?>
        <a href="./paginas/registros/laudos/<?=$laudo?>" class="btn btn-primary form-control" target="_blank">Ver laudo</a>
    </div>
</div>

<?php endif; ?>
