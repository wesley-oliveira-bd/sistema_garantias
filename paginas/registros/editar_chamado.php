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
        <div class="row">
            <div class="col-md-2">
                <label class="form-label" for="id" name="id">ID: </label>
                <input class="form-control" type="number" name="id" id="id" value="<?=$dados["id"]?>">
            </div>
        </div>

        
            <div class="row">
                <div class="col-md-2">
                    <label class="form-label" for="data_abertura" name="data_abertura">Data abertura: </label>
                    <input class="form-control" type="date" name="data_abertura" id="data_abertura" value="<?=$dados["data_abertura"]?>">
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="cod_cliente" name="cod_cliente">Cod. cliente: </label>
                    <input class="form-control" type="text" name="cod_cliente" id="cod_cliente" value="<?=$dados["cod_cliente"]?>">
                </div>
                <div class="col-md-8">
                    <label class="form-label" for="nome_cliente" name="nome_cliente">Nome cliente: </label>
                    <input class="form-control" type="text" name="nome_cliente" id="nome_cliente" value="<?=$dados["nome_cliente"]?>">
                </div>
            </div>
        

        <div class="row">
            <div class="col-md-2">
                <label class="form-label" for="num_os" name="num_os">N. OS: </label>
                <input class="form-control" type="number" name="num_os" id="num_os" value="<?=$dados["num_os"]?>">
            </div>
            <div class="col-md-2">
                <label class="form-label" for="data_os" name="data_os">Data OS: </label>
                <input class="form-control" type="date" name="data_os" id="data_os" value="<?=$dados["data_os"]?>">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="oficina" name="oficina">Oficina: </label>
                <input class="form-control" type="text" name="oficina" id="oficina" value="<?=$dados["oficina"]?>">
            </div>
            <div class="col-md-2">
                <label class="form-label" for="valor_venda" name="valor_venda">Valor peça: </label>
                <input class="form-control" type="number" name="valor_venda" id="valor_venda" value="<?=$dados["valor_venda"]?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label class="form-label" for="fab_veiculo" name="fab_veiculo">Marca veículo: </label>
                <select class="form-control" name="fab_veiculo" id="fab_veiculo">
                    <option <?php echo ($dados['fab_veiculo']=='')?'selected':''?> value="">Selecione...</option>
                    <option <?php echo ($dados['fab_veiculo']=='MB')?'selected':''?> value="MB">Mercedes</option>
                    <option <?php echo ($dados['fab_veiculo']=='VW')?'selected':''?> value="VW">Volkswagen</option>
                    <option <?php echo ($dados['fab_veiculo']=='FORD')?'selected':''?> value="FORD">Ford</option>
                    <option <?php echo ($dados['fab_veiculo']=='GM')?'selected':''?> value="GM">Chevrolet</option>
                    <option <?php echo ($dados['fab_veiculo']=='SC')?'selected':''?> value="SC">Scania</option>
                    <option <?php echo ($dados['fab_veiculo']=='VOLVO')?'selected':''?> value="VOLVO">Volvo</option>
                    <option <?php echo ($dados['fab_veiculo']=='IVECO')?'selected':''?> value="IVECO">Iveco</option>
                    <option <?php echo ($dados['fab_veiculo']=='DAF')?'selected':''?> value="DAF">DAF</option>
                    <option <?php echo ($dados['fab_veiculo']=='outros')?'selected':''?> value="outros">Outros</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label" for="mod_veiculo" name="mod_veiculo">Modelo veículo: </label>
                <input class="form-control" type="text" name="mod_veiculo" id="mod_veiculo" value="<?=$dados["mod_veiculo"]?>">
            </div>
            <div class="col-md-3">
                <label for="ano_veiculo" name="ano_veiculo">Ano veículo: </label>
                <input class="form-control" type="number" name="ano_veiculo" id="ano_veiculo" value="<?=$dados["ano_veiculo"]?>">
            </div>
            <div class="col-md-3">
                <label class="form-label" for="placa_veiculo" name="placa_veiculo">Placa veículo: </label>
                <input class="form-control" type="text" name="placa_veiculo" id="placa_veiculo" value="<?=$dados["placa_veiculo"]?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label class="form-label" for="cod_item" name="cod_item">Cod. peça: </label>
                <input class="form-control" type="number" name="cod_item" id="cod_item" value="<?=$dados["cod_item"]?>">
            </div>
            <div class="col-md-3">
                <label class="form-label" for="num_fabricante" name="num_fabricante">Número fabricante: </label>
                <input class="form-control" type="text" name="num_fabricante" id="num_fabricante" value="<?=$dados["num_fabricante"]?>">
            </div>
            <div class="col-md-3">
                <label class="form-label" for="fab_item" name="fab_item">Fabricante: </label>
                <input class="form-control" type="text" name="fab_item" id="fab_item" value="<?=$dados["fab_item"]?>">
            </div>
            <div class="col-md-3">
                <label class="form-label" for="quant" name="quant">Quantidade: </label>
                <input class="form-control" type="number" name="quant" id="quant" value="<?=$dados["quant"]?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label class="form-label" for="km_aplicacao" name="km_aplicacao">KM aplicação: </label>
                <input class="form-control" type="number" name="km_aplicacao" id="km_aplicacao" value="<?=$dados["km_aplicacao"]?>">
            </div>
            <div class="col-md-2">
                <label class="form-label" for="km_defeito" name="km_defeito">KM defeito: </label>
                <input class="form-control" type="number" name="km_defeito" id="km_defeito" value="<?=$dados["km_defeito"]?>">
            </div>
            <div class="col-md-8 mb-3">
                <label class="form-label" for="defeito" name="defeito">Defeito: </label>
                <input class="form-control" type="text" name="defeito" id="defeito" value="<?=$dados["defeito"]?>">
            </div>
        </div>

        <div class="d-grid gap-2">
        <button class="btn btn-outline-success" type="submit">Salvar</button>
        </div>
    </form>
</div>

<?php endif; ?>