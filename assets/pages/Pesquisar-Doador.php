<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Doador</title>
    <style>
        /* Resetando margens e paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Definindo o fundo e fontes para o corpo */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Container centralizado */
        .container {
            width: 50%;
            margin: 50px auto;
            background: #1f1f1f;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
            color: #ffffff;
            margin-bottom: 30px;
        }

        /* Estilizando o campo do formulário */
        fieldset {
            border: 1px solid #444;
            padding: 20px;
            border-radius: 8px;
        }

        legend {
            font-weight: bold;
            font-size: 1.2em;
            color: #f4f4f4;
        }

        input[type="text"] {
            width: calc(100% - 22px);
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #555;
            border-radius: 8px;
            background-color: #333;
            color: #fff;
            font-size: 1em;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #ff9800;
        }

        /* Botões com efeito hover */
        .button-container {
            display: flex;
            justify-content: space-between;
        }

        button {
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            font-size: 1em;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:nth-of-type(1) {
            background-color: #4CAF50;
        }

        button:nth-of-type(1):hover {
            background-color: #45a049;
        }

        button:nth-of-type(2) {
            background-color: #f44336;
        }

        button:nth-of-type(2):hover {
            background-color: #e53935;
        }

        /* Resultados */
        #Resultado {
            text-align: center;
            color: #fff;
            margin-top: 30px;
            font-size: 1.2em;
        }

        /* Estilizando a tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #333;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #444;
        }

        th {
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #2c2c2c;
        }

        tr:hover {
            background-color: #444;
        }

        /* Estilizando o botão de voltar */
        button a {
            color: white;
            text-decoration: none;
        }

        button a:hover {
            text-decoration: underline;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Pesquisar Doador</h1>
        <form name="cliente" method="POST" action="">
            <fieldset>
                <legend>Insira o nome do Doador para pesquisar:</legend>
                <input type="text" id="txtnome_autor" placeholder="Nome do Doador" name="txtnome_Doador">
                <div class="button-container">
                    <button type="submit" name="btnConsultar" value="Consultar">Consultar</button>
                    <button type="reset" name="btnLimpar" value="Limpar">Limpar</button>
                </div>
            </fieldset>
        </form>

        <h2 id="Resultado">Resultado na tabela abaixo:</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    extract($_POST, EXTR_OVERWRITE);
                    include_once '../php/doador.php';
                    if (isset($btnConsultar)) {
                        $consul_Doador = new Doador();
                        $consul_Doador->setnome($txtnome_Doador . '%');
                        $pro_bd = $consul_Doador->consultar();
                    } else {
                        $pro_bd = [];
                    }

                    if (!empty($pro_bd)) {
                        foreach ($pro_bd as $pro_mostrar) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($pro_mostrar[0]) . '</td>';
                            echo '<td>' . htmlspecialchars($pro_mostrar[1]) . '</td>';
                            echo '<td>' . htmlspecialchars($pro_mostrar[2]) . '</td>';
                            echo '<td>' . htmlspecialchars($pro_mostrar[3]) . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="4">Nenhum Doador encontrado.</td></tr>';
                    }
                ?>
            </tbody>
        </table>
        
        <br>
        <button><a href="/2024_4_new_clothes_web/Pesquisar.html">Voltar</a></button><br>

    </div>
</body>
</html>
