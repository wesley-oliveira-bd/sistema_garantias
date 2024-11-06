<h3>Página Principal</h3>

<form class="d-print-none" method="POST" action="">
    <div class="row">
        
        <div class="col-md-4">
            <label class="form-label" for="selecao_1">Digite:</label>
            <div class="input-group">
                <select class="form-control" name="selecao_1" id="selecao_1">
                    <option value="">Selecione...</option>
                    <option value="id">ID</option>
                    <option value="nome_cliente">Cliente</option>
                    <option value="fornecedor">Fornecedor</option>
                </select>
                <input class="form-control" type="text" name="selection_text" id="selection_text">
            </div>
        </div>
        
        
        <div class="col-md-2">
            <label class="form-label" for="selecao_2">Status:</label>
            <select class="form-control" name="selecao_2" id="selecao_2">
                <option value="todos">Tudo</option>
                <option value="aberto">Aberto</option>
                <option value="procedente">Procedente</option>
                <option value="improcedente">Improcedente</option>
            </select>
        </div>

        <div class="col-md-2 align-self-end">
            <button class="btn btn-outline-success" type="submit" name="filtrar">Filtrar</button>
        </div>
        <div class="col-md-2 align-self-end"><button class="btn btn-outline-primary" onclick="imprimirConsulta()">Imprimir Consulta</button></div>
    </div>
</form>

<div class="tabela">
    <table class="table table-dark table-striped table-sm table-bordered">
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
                <th class="d-print-none">Laudo</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $quantidade = 15;
            $pagina = (isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1);
            $inicio = ($quantidade * $pagina) - $quantidade;

            $selecao_1 = isset($_POST["selecao_1"]) ? $_POST["selecao_1"] : "id";
            $selection_text = isset($_POST["selection_text"]) ? $_POST["selection_text"] : "";
            $selecao_2 = isset($_POST["selecao_2"]) ? $_POST["selecao_2"] : "todos";

            // Monta a query básica
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
                valor_venda,
                laudo
                FROM registros
                WHERE 1=1";

            // Filtro baseado na seleção de `selecao_1` e valor de `selection_text`
            if (!empty($selection_text)) {
                if ($selecao_1 == "id") {
                    $sql .= " AND id = '" . intval($selection_text) . "'";
                } else {
                    $sql .= " AND $selecao_1 LIKE '%" . mysqli_real_escape_string($conexao, $selection_text) . "%'";
                }
            }

            // Filtro baseado na seleção de `selecao_2`
            if ($selecao_2 != "todos") {
                $sql .= " AND status = '" . mysqli_real_escape_string($conexao, $selecao_2) . "'";
            }

            $sql .= " LIMIT $inicio, $quantidade";

            $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta" . mysqli_error($conexao));
            while ($dados = mysqli_fetch_assoc($rs)) {
        ?>
            <tr>
                <td><?=$dados["id"] ?></td>
                <td class="text-nowrap"><?=$dados["nome_cliente"] ?></td>
                <td><?=$dados["cod_item"] ?></td>
                <td><?=$dados["num_fabricante"] ?></td>
                <td><?=$dados["quant"] ?></td>
                <td><?=$dados["fornecedor"] ?></td>
                <td><?=$dados["nf_garantia"] ?></td>
                <td><?=$dados["data_saida"] ?></td>
                <td><?=$dados["status"] ?></td>
                <td><?=$dados["nf_retorno"] ?></td>
                <td>R$ <?=number_format($dados['valor_venda'], 2, ',', '.') ?></td>
                <td class="text-center d-print-none">
                
                <?php 
                    if ($dados["laudo"] == "" || !file_exists('./paginas/registros/laudos/'.$dados["laudo"])) {
                    $laudo = "sem_laudo.jpg";
                    } else {
                        $laudo = $dados["laudo"];
                    }
                ?>
                
                <a class="btn btn-outline-warning btn-sm" href="./paginas/registros/laudos/<?=$laudo?>"><i class="bi bi-file-earmark-pdf"></i></a>
            </td>
            </tr>

        <?php } ?>

        </tbody>
    </table>
</div>

<script>
    function imprimirConsulta() {
        window.print();
    }
</script>