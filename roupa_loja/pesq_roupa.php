<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MG Roupas</title>
</head>
<body>
    <h1>Pesquisar roupas</h1>	

    <table border="1">
            <tr>
                <td>ID</td>
                <td>Quantidade de roupa</td>
                <td>Tamanho da roupa</td>
                <td>Cor da roupa</td>
                <td>Descrição da roupa</td>
            </tr>
            <?php

                $desc_roupa = $_POST["c_desc_roupa"];

                //Conexão com o banco
                require("connect.php");

                //Gerando a SQL de PESQUISA das categorias existentes no BD
				$pesquisar_roupa = "SELECT * FROM `produto` WHERE `desc_roupa` = '$desc_roupa'";

                //Executando a SQL e armazenando o resultado em uma variavel
				$resultado_roupa = mysqli_query($conexao, $pesquisar_roupa);

                //Obtendo o numero de linhas retornadas na pesquisa
				$numero_resultado = mysqli_num_rows($resultado_roupa);

                if($numero_resultado == 0)
                {
                    ?>
                        <!-- Aqui tem Javascript!-->
                        <script>
                            alert("Não existe roupas cadastradas");
                            window.location.replace("index.html");
                        </script>
                    <?php
                }
                else
                {
                    //Existe categorias cadastradas!
                    for($i = 0  ; $i < $numero_resultado; $i++)
                    {
                        //Gerando um vetor com as categorias
					    $vetor_roupa = mysqli_fetch_array($resultado_roupa);
                        echo"
                            <tr>
                                <td>$vetor_roupa[0]</td>
                                <td>$vetor_roupa[1]</td>
                                <td>$vetor_roupa[2]</td>
                                <td>$vetor_roupa[3]</td>
                                <td>$vetor_roupa[4]</td>
                            </tr>
                            ";
                    }
                }
            ?>
    </table>
</body>
</html>