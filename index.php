<?php 
    include("db/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Controle de Garantias</title>
</head>
<body>
    <header>
        <h1>Sistema de Controle de Garantias 1.0</h1>
        <nav>
            <a href="index.php?menuop=home">Home</a> |
            <a href="index.php?menuop=abrir_chamado">Abrir Chamado</a> |
            <a href="index.php?menuop=editar_chamado">Editar Chamado</a> |
            <a href="index.php?menuop=editar_dados_fiscais">Inserir Dados Fiscais</a> |
            <a href="index.php?menuop=relatorios">Relatórios</a>

        </nav>
    </header>
    <main>
    <hr>
        <?php
            $menuop = (isset($_GET["menuop"]))?$_GET["menuop"]:"home";
            switch($menuop){
                case 'home':
                    include ("paginas/home/home.php");
                    break;
                case 'abrir_chamado':
                    include ("paginas/registros/abrir_chamado.php");
                    break;
                case 'editar_chamado':
                    include("paginas/registros/editar_chamado.php");
                    break;
                case 'atualizar_chamado':
                    include("paginas/registros/atualizar_chamado.php");
                    break;
                case 'dados_fiscais':
                    include ("paginas/registros/dados_fiscais.php");
                    break;
                case 'editar_dados_fiscais':
                    include("paginas/registros/editar_dados_fiscais.php");
                    break;
                case 'inserir_dados_fiscais':
                    include("paginas/registros/inserir_dados_fiscais.php");
                    break;
                case 'relatorios':
                    include ("paginas/registros/relatorios.php");
                    break;
                case 'inserir_chamado':
                    include("paginas/registros/inserir_chamado.php");
                    break;
                case 'excluir_registro':
                    include("paginas/registros/excluir_registro.php");
                    break;
                
            }
        ?>
    </main>
</body>
</html>