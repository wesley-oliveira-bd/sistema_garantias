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
    <h3>Editar Chamado</h3>
</header>

<form method="POST" action="">
    <label for="informar_id">Informe o ID: </label>
    <input type="number" name="informar_id" id="informar_id">
    <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisar</button>
</form>
<?php if (!empty($dados)): ?> <!-- Exibe o formulário somente se $dados estiver preenchido -->

<div>
    <form action="index.php?menuop=atualizar_chamado" method="post">
        <div>
            <label for="id" name="id">ID: </label>
            <input type="number" name="id" id="id" value="<?=$dados["id"]?>">
        </div>
        <div>
            <label for="data_abertura" name="data_abertura">Data abertura: </label>
            <input type="date" name="data_abertura" id="data_abertura" value="<?=$dados["data_abertura"]?>">
        </div>
        <div>
            <label for="cod_cliente" name="cod_cliente">Cod. cliente: </label>
            <input type="text" name="cod_cliente" id="cod_cliente" value="<?=$dados["cod_cliente"]?>">
        </div>
        <div>
            <label for="nome_cliente" name="nome_cliente">Nome cliente: </label>
            <input type="text" name="nome_cliente" id="nome_cliente" value="<?=$dados["nome_cliente"]?>">
        </div>
        <div>
            <label for="num_os" name="num_os">N. OS: </label>
            <input type="number" name="num_os" id="num_os" value="<?=$dados["num_os"]?>">
        </div>
        <div>
            <label for="data_os" name="data_os">Data OS: </label>
            <input type="date" name="data_os" id="data_os" value="<?=$dados["data_os"]?>">
        </div>
        <div>
            <label for="oficina" name="oficina">Oficina: </label>
            <input type="text" name="oficina" id="oficina" value="<?=$dados["oficina"]?>">
        </div>
        <div>
            <label for="valor_venda" name="valor_venda">Valor peça: </label>
            <input type="number" name="valor_venda" id="valor_venda" value="<?=$dados["valor_venda"]?>">
        </div>
        <div>
            <label for="fab_veiculo" name="fab_veiculo">Marca veículo: </label>
            <input type="text" name="fab_veiculo" id="fab_veiculo" value="<?=$dados["fab_veiculo"]?>">
        </div>
        <div>
            <label for="mod_veiculo" name="mod_veiculo">Modelo veículo: </label>
            <input type="text" name="mod_veiculo" id="mod_veiculo" value="<?=$dados["mod_veiculo"]?>">
        </div>
        <div>
            <label for="ano_veiculo" name="ano_veiculo">Ano veículo: </label>
            <input type="number" name="ano_veiculo" id="ano_veiculo" value="<?=$dados["ano_veiculo"]?>">
        </div>
        <div>
            <label for="placa_veiculo" name="placa_veiculo">Placa veículo: </label>
            <input type="text" name="placa_veiculo" id="placa_veiculo" value="<?=$dados["placa_veiculo"]?>">
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
            <label for="fab_item" name="fab_item">Fabricante: </label>
            <input type="text" name="fab_item" id="fab_item" value="<?=$dados["fab_item"]?>">
        </div>
        <div>
            <label for="quant" name="quant">Quantidade: </label>
            <input type="number" name="quant" id="quant" value="<?=$dados["quant"]?>">
        </div>
        <div>
            <label for="km_aplicacao" name="km_aplicacao">KM aplicação: </label>
            <input type="number" name="km_aplicacao" id="km_aplicacao" value="<?=$dados["km_aplicacao"]?>">
        </div>
        <div>
            <label for="km_defeito" name="km_defeito">KM defeito: </label>
            <input type="number" name="km_defeito" id="km_defeito" value="<?=$dados["km_defeito"]?>">
        </div>
        <div>
            <label for="defeito" name="defeito">Defeito: </label>
            <input type="text" name="defeito" id="defeito" value="<?=$dados["defeito"]?>">
        </div>
        <div>
         <button class="btn btn-outline-success btn-sm" type="submit">Salvar</button>
        </div>
    </form>
</div>

<?php endif; ?>