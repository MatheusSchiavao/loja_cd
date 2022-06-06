<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MG Roupas</title>
</head>
<body>
    <h2>Excluir roupa</h2>

    <form action="exc_roupa.php" method="post">
        <table border="1">
            <tr>
                <td>ID da roupa</td>
                <td>Roupa</td>
                <td>Selecionar</td>
            </tr>
            <?php
                //Conexão com o banco
                require("connect.php");

                //Gerando a SQL de PESQUISA das categorias existentes no BD
				$pesquisar_roupa = "SELECT * FROM `produto`";

                //Executando a SQL e armazenando o resultado em uma variavel
				$resultado_roupa = mysqli_query($conexao, $pesquisar_roupa);

                //Obtendo o numero de linhas retornadas na pesquisa
				$numero_resultado = mysqli_num_rows($resultado_roupa);

                if($numero_resultado == 0)
                {
                    ?>
                        <!-- Aqui tem Javascript!-->
                        <script>
                            alert("Não existe roupas cadastradas!");
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
                                <td>$vetor_roupa[2]</td>
                                <td><input type='radio' name='check_roupa' value=$vetor_roupa[0]></td>
                            </tr>
                            ";
                    }
                }                
            ?>            
        </table>
        <br><input type="submit" value="Excluir">
    </form>
</body>
</html>