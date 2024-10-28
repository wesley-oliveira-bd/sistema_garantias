<?php
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
    <h3>Editar Dados Fiscais</h3>
</header>

<form method="POST" action="">
    <label for="informar_id">Informe o ID: </label>
    <input type="number" name="informar_id" id="informar_id">
    <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisar</button>
</form>

<?php if (!empty($dados)): ?> <!-- Exibe o formulário somente se $dados estiver preenchido -->

<form action="index.php?menuop=inserir_dados_fiscais" method="post">
    <div>
        <label for="id" name="id">ID: </label>
        <input type="number" name="id" id="id" value="<?=$dados["id"]?>">
    </div>
    <div>
        <label for="cod_item" name="cod_item">Cod. peça: </label>
        <input type="number" name="cod_item" id="cod_item" value="<?=$dados["cod_item"]?>">
    </div>
    <div>
        <label for="num_fabricante" name="num_fabricante">Número fabricante: </label>
        <input type="text" name="num_fabricante" id="num_fabricante" value="<?=$dados["num_fabricante"]?>">
    </div>
    <div>
        <label for="fornecedor" name="fornecedor">Fornecedor: </label>
        <input type="text" name="fornecedor" id="fornecedor" value="<?=$dados["fornecedor"]?>">
    </div>
    <div>
        <label for="nf_compra" name="nf_compra">NF compra: </label>
        <input type="number" name="nf_compra" id="nf_compra" value="<?=$dados["nf_compra"]?>">
    </div>
    <div>
        <label for="data_nf_compra" name="data_nf_compra">Data compra: </label>
        <input type="date" name="data_nf_compra" id="data_nf_compra" value="<?=$dados["data_nf_compra"]?>">
    </div>
    <div>
        <label for="valor_compra" name="valor_compra">Valor compra: </label>
        <input type="number" name="valor_compra" id="valor_compra" value="<?=$dados["valor_compra"]?>">
    </div>
    <div>
        <label for="nf_venda" name="nf_venda">NF venda: </label>
        <input type="number" name="nf_venda" id="nf_venda" value="<?=$dados["nf_venda"]?>">
    </div>
    <div>
        <label for="data_nf_venda" name="data_nf_venda">Data venda: </label>
        <input type="date" name="data_nf_venda" id="data_nf_venda" value="<?=$dados["data_nf_venda"]?>">
    </div>
    <div>
        <label for="nf_garantia" name="nf_garantia">NF Garantia: </label>
        <input type="number" name="nf_garantia" id="nf_garantia" value="<?=$dados["nf_garantia"]?>">
    </div>
    <div>
        <label for="data_nf_garantia" name="data_nf_garantia">Data garantia: </label>
        <input type="date" name="data_nf_garantia" id="data_nf_garantia" value="<?=$dados["data_nf_garantia"]?>">
    </div>
    <div>
        <label for="transporte" name="transporte">Transport.: </label>
        <input type="text" name="transporte" id="transporte" value="<?=$dados["transporte"]?>">
    </div>
    <div>
        <label for="nf_retorno" name="nf_retorno">NF retorno: </label>
        <input type="number" name="nf_retorno" id="nf_retorno" value="<?=$dados["nf_retorno"]?>">
    </div>
    <div>
        <label for="data_nf_retorno" name="data_nf_retorno">Data retorno: </label>
        <input type="date" name="data_nf_retorno" id="data_nf_retorno" value="<?=$dados["data_nf_retorno"]?>">
    </div>
    <div>
        <label for="status" name="status">Status: </label>
        <input type="text" name="status" id="status" value="<?=$dados["status"]?>">
    </div>
    <div>
        <label for="observ" name="observ">Observ.: </label>
        <input type="text" name="observ" id="observ" value="<?=$dados["observ"]?>">
    </div>
    <div>
        <button class="btn btn-outline-success btn-sm" type="submit"> Salvar</button>
    </div>

</form>
<?php endif; ?>