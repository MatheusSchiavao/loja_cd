<?php
    require("connect.php");

    $id = $_POST['check_roupa'];
    $desc_roupa = $_POST['c_desc_roupa'];           
    
    $sql_pesquisa_roupa = "SELECT * FROM `produto`";

    $resultado_pesquisa = mysqli_query($conexao,$sql_pesquisa_roupa);

    $numero_resultado = mysqli_num_rows($resultado_pesquisa);

    if($numero_resultado == 0)
    {
        ?>
            <script>
                alert("Roupa não existente");
                javascript:history.back();
            </script>
        <?php
    }
    else
    {
        $sql_alterar_roupa = "UPDATE `produto` SET `desc_roupa` = '$desc_roupa' WHERE id = $id";

        mysqli_query($conexao, $sql_alterar_roupa);
        ?>
            <script>
                alert("A descrição foi alterada");
                window.location.replace("form_alt_roupa.php");
            </script>
        <?php
    }
?>