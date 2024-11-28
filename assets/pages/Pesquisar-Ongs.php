<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Ongs</title>
    <style>
        /* Estilos gerais */
        body {
            font-family: Arial, sans-serif;
            background-color: #121212; /* Fundo escuro */
            margin: 0;
            padding: 0;
            color: #E0E0E0; /* Cor do texto */
        }

        .container {
            width: 60%;
            margin: 50px auto;
            background: #1f1f1f; /* Fundo do container */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5); /* Sombra mais intensa */
        }

        h1 {
            text-align: center;
            color: #ffffff; /* Cor do título */
        }

        fieldset {
            border: 1px solid #444444; /* Cor da borda */
            padding: 20px;
            border-radius: 8px;
            background-color: #282828; /* Fundo do fieldset */
        }

        legend {
            font-weight: bold;
            font-size: 1.3em;
            color: #f4f4f4; /* Cor da legenda */
        }

        input[type="text"] {
            width: calc(100% - 22px);
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #555555; /* Borda do input */
            border-radius: 4px;
            background-color: #333333; /* Fundo do input */
            color: #fff; /* Cor do texto no input */
        }

        .button-container {
            display: flex;
            justify-content: space-between;
        }

        button {
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            font-size: 1.1em;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.85;
        }

        button:nth-of-type(1) {
            background-color: #4CAF50; /* Verde */
        }

        button:nth-of-type(2) {
            background-color: #f44336; /* Vermelho */
        }

        #resultHeader {
            text-align: center;
            color: #fff;
            margin-top: 20px;
        }

        /* Estilos da tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #333333;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #444444; /* Borda da tabela */
        }

        th {
            background-color: #444444;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #2f2f2f; /* Linha par */
        }

        tr:nth-child(odd) {
            background-color: #363636; /* Linha ímpar */
        }

        tr:hover {
            background-color: #555555; /* Efeito hover */
        }

        /* Estilo do link */
        a {
            text-decoration: none;
            color: #ffffff; /* Cor verde para o link */
        }

        a:hover {
            color: #2e7d32; /* Cor mais escura no hover */
        }

    </style>
</head>
<body>
    <div class="container">
        <h1></h1>
        <form name="cliente" method="POST" action="">
            <fieldset>
                <legend>Insira o nome da Ong para pesquisar:</legend>
                <input type="text" id="txtnome_autor" placeholder="Nome da Ong" name="txtnome_ong">
                <div class="button-container">
                    <button type="submit" name="btnConsultar" value="Consultar">Clique para consultar🔎</button>
                    <button type="reset" name="btnLimpar" value="Limpar">Limpar</button>
                </div>
            </fieldset>
        </form>
        <h2 id="Resultado:">Resultado na tabela abaixo:</h2>
        <br>
        
        <?php 
            extract($_POST, EXTR_OVERWRITE);
            include_once '../php/ong.php';
            if (isset($btnConsultar)) {
                $consul_Ong = new Ong();
                $consul_Ong->setNome($txtnome_ong . '%');
                $pro_bd = $consul_Ong->consultar();
            } else {
                $pro_bd = [];
            }

            echo '<table>';
            echo '<thead>';
            echo '<tr><th>ID</th><th>Nome</th><th>Email</th><th>CNPJ</th><th>Endereco</th><th>Telefone</th></tr>';
            echo '</thead>';
            echo '<tbody>';

            if (!empty($pro_bd)) {
                foreach ($pro_bd as $pro_mostrar) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($pro_mostrar[0]) . '</td>';
                    echo '<td>' . htmlspecialchars($pro_mostrar[1]) . '</td>';
                    echo '<td>' . htmlspecialchars($pro_mostrar[2]) . '</td>';
                    echo '<td>' . htmlspecialchars($pro_mostrar[3]) . '</td>';
                    echo '<td>' . htmlspecialchars($pro_mostrar[4]) . '</td>';
                    echo '<td>' . htmlspecialchars($pro_mostrar[5]) . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="6">Nenhuma Ong encontrada.</td></tr>';
            }

            echo '</tbody>';
            echo '</table>';
        ?><br>
       <button><a href="/2024_4_new_clothes_web/Pesquisar.html">Voltar</a></button><br>

    </div>
</body>
</html>
