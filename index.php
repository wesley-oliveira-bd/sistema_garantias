<?php 
    include("db/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/estilo-padrao.css">
    <title>Sistema de Controle de Garantias</title>
</head>
<body>
    <header class="bg-dark">
        <div class="container">
            <h1>Sistema de Controle de Garantias 1.0</h1>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php?menuop=home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?menuop=abrir_chamado">Abrir Chamado</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?menuop=editar_chamado">Editar Chamado</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?menuop=editar_dados_fiscais">Inserir Dados Fiscais</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?menuop=relatorios">Relatórios</a></li>
                    </ul>
                </div>
                
                
                
                
                
            </nav>
        </div>
    </header>
    <main>
    
        <div class="container">
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
        </div>
    </main>
    <footer class="container-fluid bg-dark">
        <div class="text-center">Desenvolvido por Wesley de Oliveira</div>
    </footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

</body>
</html>