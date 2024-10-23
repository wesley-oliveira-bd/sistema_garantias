<?php
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

    $sql = "INSERT INTO registros (data_abertura, cod_cliente, nome_cliente, num_os, data_os, oficina, valor_venda, fab_veiculo, mod_veiculo, ano_veiculo, placa_veiculo, cod_item, num_fabricante, fab_item, quant, km_aplicacao, km_defeito, defeito) 
    VALUES (
        '{$data_abertura}',
        '{$cod_cliente}',
        '{$nome_cliente}',
        '{$num_os}',
        '{$data_os}',
        '{$oficina}',
        '{$valor_venda}',
        '{$fab_veiculo}',
        '{$mod_veiculo}',
        '{$ano_veiculo}',
        '{$placa_veiculo}',
        '{$cod_item}',
        '{$num_fabricante}',
        '{$fab_item}',
        '{$quant}',
        '{$km_aplicacao}',
        '{$km_defeito}',
        '{$defeito}'
    )";

    if (mysqli_query($conexao, $sql)) {
        // Obtendo o ID do registro recém-criado
        $id_inserido = mysqli_insert_id($conexao);
        echo "O registro foi efetuado com sucesso! O ID do chamado é: " . $id_inserido;
    } else {
        echo "Erro ao realizar a consulta: " . mysqli_error($conexao);
    }
?>