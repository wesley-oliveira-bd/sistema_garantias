<header>
    <h3>Abrir Chamado de Garantia</h3>
</header>
<div>
    <form class="needs-validation" action="index.php?menuop=inserir_chamado" method="post" novalidate>
    <div class="row">
        <div class="col-md-2">
            <label class="form-label" for="data_abertura" name="data_abertura">Data abertura: </label>
            <input class="form-control" type="date" name="data_abertura" readonly id="data_abertura" required>
        </div>
        <div class="col-md-2">
            <label class="form-label" for="cod_cliente" name="cod_cliente">Cod. cliente: </label>
            <div class="input-group">
                <input class="form-control" type="text" name="cod_cliente" id="cod_cliente" required>
                <div class="invalid-feedback">Informe o código do cliente</div>
            </div>
        </div>
        <div class="col-md-8">
            <label class="form-label" for="nome_cliente" name="nome_cliente">Nome cliente: </label>
            <div class="input-group">
                <input class="form-control" type="text" name="nome_cliente" id="nome_cliente" required>
                <div class="invalid-feedback">Informe o nome do cliente</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <label class="form-label" for="num_os" name="num_os">N. OS: </label>
            <div class="input-group">
                <input class="form-control" type="number" name="num_os" id="num_os" required>
                <div class="invalid-feedback">Informe o número da OS</div>
            </div>
        </div>
        <div class="col-md-2">
            <label class="form-label" for="data_os" name="data_os">Data OS: </label>
            <div class="input-group">
                <input class="form-control" type="date" name="data_os" id="data_os" required>
                <div class="invalid-feedback">Informe a data da OS</div>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="oficina" name="oficina">Oficina: </label>
            <div class="input-group">
                <input class="form-control" type="text" name="oficina" id="oficina" required>
                <div class="invalid-feedback">Informe a oficina onde foi feito o serviço</div>
            </div>
        </div>
        <div class="col-md-2">
            <label class="form-label" for="valor_venda" name="valor_venda">Valor peça: </label>
            <div class="input-group">
                <input class="form-control" type="number" name="valor_venda" id="valor_venda" required>
                <div class="invalid-feedback">Informe o valor de venda da peça</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label class="form-label" for="fab_veiculo" name="fab_veiculo">Marca veículo: </label>
            <div class="input-group">
                <select class="form-control" name="fab_veiculo" id="fab_veiculo" required>
                    <option selected value="">Selecione...</option>
                    <option value="MB">Mercedes</option>
                    <option value="VW">Volkswagen</option>
                    <option value="FORD">Ford</option>
                    <option value="GM">Chevrolet</option>
                    <option value="SC">Scania</option>
                    <option value="VOLVO">Volvo</option>
                    <option value="IVECO">Iveco</option>
                    <option value="DAF">DAF</option>
                    <option value="outros">Outros</option>
                </select>
                <div class="invalid-feedback">Selecione a marca do veículo</div>
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label" for="mod_veiculo" name="mod_veiculo">Modelo veículo: </label>
            <div class="input-group">
                <input class="form-control" type="text" name="mod_veiculo" id="mod_veiculo" required>
                <div class="invalid-feedback">Informe o modelo do veículo</div>
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label" for="ano_veiculo" name="ano_veiculo">Ano veículo: </label>
            <div class="input-group">
                <input class="form-control" type="number" name="ano_veiculo" id="ano_veiculo" required>
                <div class="invalid-feedback">Informe o ano do veículo</div>
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label" for="placa_veiculo" name="placa_veiculo">Placa veículo: </label>
            <input class="form-control" type="text" name="placa_veiculo" id="placa_veiculo">
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label class="form-label" for="cod_item" name="cod_item">Cod. peça: </label>
            <div class="input-group">
                <input class="form-control" type="number" name="cod_item" id="cod_item" required>
                <div class="invalid-feedback">Informe o código da peça</div>
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label" for="num_fabricante" name="num_fabricante">Número fabricante: </label>
            <div class="input-group">
                <input class="form-control" type="text" name="num_fabricante" id="num_fabricante" required>
                <div class="invalid-feedback">Informe o número da peça</div>
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label" for="fab_item" name="fab_item">Fabricante: </label>
            <div class="input-group">
                <input class="form-control" type="text" name="fab_item" id="fab_item" required>
                <div class="invalid-feedback">Informe a marca da peça</div>
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label" for="quant" name="quant">Quantidade: </label>
            <div class="input-group">
                <input class="form-control" type="number" name="quant" id="quant" required>
                <div class="invalid-feedback">Informe a quantidade</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <label class="form-label" for="km_aplicacao" name="km_aplicacao">KM aplicação: </label>
            <div class="input-group">
                <input class="form-control" type="number" name="km_aplicacao" id="km_aplicacao" required>
                <div class="invalid-feedback">Informe o km em que a peça foi aplicada</div>
            </div>
        </div>
        <div class="col-md-2">
            <label class="form-label" for="km_defeito" name="km_defeito">KM defeito: </label>
            <div class="input-group">
                <input class="form-control" type="number" name="km_defeito" id="km_defeito" required>
                <div class="invalid-feedback">Informe o KM em que o defeito foi apresentado</div>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <label class="form-label" for="defeito" name="defeito">Defeito: </label>
            <div class="input-group">
                <input class="form-control" type="text" name="defeito" id="defeito" required>
                <div class="invalid-feedback">Descreva o defeito apresentado</div>
            </div>
        </div>
    </div>
    <div class="d-grid gap-2">
        <button class="btn btn-outline-success" type="submit">Salvar</button>
    </div>
    </form>

</div>

<script>
    // Preenche o campo "data_abertura" com a data atual
    const hoje = new Date().toISOString().split('T')[0];
    document.getElementById('data_abertura').value = hoje;
</script>