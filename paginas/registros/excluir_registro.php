<header>
    <h3>Excluir Registro</h3>
</header>

<?php
    $id = mysqli_real_escape_string($conexao,$_GET["id"]);
    $sql = "DELETE FROM registros WHERE id = '{$id}'";
    mysqli_query($conexao, $sql) or die ("Erro ao excluir o registro." . mysqli_error($conexao));

    echo "Registro excluido com sucesso.";
?>