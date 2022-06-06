<?php
    require("connect.php");

    $quant_roupa = $_POST["c_quant_roupa"];  
    $tam_roupa = $_POST["c_tam_roupa"]; 
    $cor_roupa = $_POST["c_cor_roupa"];
    $desc_roupa = $_POST["c_desc_roupa"];


    $pesquisar_nome = "SELECT * FROM `produto` WHERE tam_roupa = '$tam_roupa'";

    $resultado_nome = mysqli_query($conexao, $pesquisar_nome);

    $numero_retorno = mysqli_num_rows($resultado_nome);
       
    if($numero_retorno == 0)
    {
        $sql_cadastrar = "INSERT INTO `produto`(`quant_roupa`,`tam_roupa`,`cor_roupa`,`desc_roupa`) VALUES ('$quant_roupa','$tam_roupa','$cor_roupa','$desc_roupa')";
        mysqli_query($conexao, $sql_cadastrar);        
        ?>
            <script>
                alert("Roupa cadastrada!");
                window.location.replace("index.html");
            </script>
        <?php
    }else{
        ?>
            <script>
                alert("Roupa já cadastrada...");
                javascript:history.back();
            </script>
        <?php
    }     
?>