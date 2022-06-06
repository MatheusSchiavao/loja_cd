<?php   
    //Importando o banco
    require("connect.php");

    //Obtendo o ID da categoria do formulário
    $id = $_POST['check_roupa'];
    
    //Verificando se existe a categoria
    $sql_pesquisa_roupa = "SELECT * FROM `produto`";

    //Executando a pesquisa de categorias
    $resultado_pesquisa = mysqli_query($conexao,$sql_pesquisa_roupa);

    //Obtendo o numero de linhas retornadas na pesquisa
    $numero_resultado = mysqli_num_rows($resultado_pesquisa);

    if($numero_resultado == 0)
    {
        ?>
            <!-- Aqui tem Javascript!-->
            <script>
                alert("Não existe a roupa selecionada");
                javascript:history.back();
            </script>
        <?php
    }
    else
    {
        //Categoria encontrada! Criando a SQL de exclusao da categoria
        $sql_excluir_roupa = "DELETE FROM `produto` WHERE id = $id";

        //Executando a SQL
        mysqli_query($conexao, $sql_excluir_roupa);
        ?>
            <!-- Aqui tem Javascript!-->
            <script>
                alert("Roupa excluida!");
                window.location.replace("form_exc_roupa.php");
            </script>
        <?php
    }
?>