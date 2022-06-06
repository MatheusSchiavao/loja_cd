<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MG Roupas</title>
</head>
<body>
    <h2>Alterar roupa</h2>

    <form action="alt_roupa.php" method="post">
        <table border="1">
            <tr>
                <td>ID</td>
                <td>Quantidade de roupa</td>
                <td>Tamanho da roupa</td>
                <td>Cor da roupa</td>
                <td>Descrição da roupa</td>
                <td>Escolher</td>
            </tr>
            <?php
                require("connect.php");

				$pesquisar_roupa = "SELECT * FROM `produto`";

				$resultado_roupa = mysqli_query($conexao, $pesquisar_roupa);

				$numero_resultado = mysqli_num_rows($resultado_roupa);

                if($numero_resultado == 0)
                {
                    ?>
                        <script>
                            alert("Não existe roupas cadastradas");
                            window.location.replace("index.html");
                        </script>
                    <?php
                }
                else
                {
                    for($i = 0  ; $i < $numero_resultado; $i++)
                    {
					    $vetor_roupa = mysqli_fetch_array($resultado_roupa);
                        echo"
                            <tr>
                                <td>$vetor_roupa[0]</td>
                                <td>$vetor_roupa[1]</td>
                                <td>$vetor_roupa[2]</td>
                                <td>$vetor_roupa[3]</td>
                                <td>$vetor_roupa[4]</td>
                                <td><input type='radio' name='check_roupa' value=$vetor_roupa[0]></td>
                            </tr>
                            ";
                    }
                }                
            ?>            
        </table>
        Escreva a nova descrição da roupa escolhida:
        <br><input type="text" placeholder="Descrição" name="c_desc_roupa" size=50 maxlength=50><br>
        <br><input type="submit" value="Alterar">
    </form>
</body>
</html>