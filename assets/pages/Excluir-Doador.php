<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Doadores</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212; /* Fundo escuro */
            color: #e0e0e0; /* Texto claro */
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .form-container, .list-container {
            background: #1e1e1e; /* Fundo escuro para os containers */
            padding: 20px;
            margin: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            box-sizing: border-box;
        }

        .form-container {
            flex: 1;
            max-width: 400px;
        }

        .list-container {
            flex: 2;
            margin-left: 20px;
        }

        h1, h2 {
            text-align: center;
            color: #f5a623; /* Cor de destaque (laranja) */
        }

        fieldset {
            border: 1px solid #333; /* Cor de borda mais escura */
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        legend {
            font-weight: bold;
            font-size: 1.1em;
            color: #f5a623; /* Cor de destaque */
        }

        input[type="number"] {
            width: 80%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #555; /* Borda mais escura */
            border-radius: 4px;
            background-color: #333; /* Fundo escuro nos inputs */
            color: #e0e0e0; /* Texto claro no input */
            font-size: 1em;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.9;
        }

        button:nth-of-type(1) {
            background-color: #28a745; /* Verde */
        }

        button:nth-of-type(2) {
            background-color: #dc3545; /* Vermelho */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #444; /* Borda escura para a tabela */
        }

        th {
            background-color: #333; /* Fundo escuro para os cabeçalhos */
            color: #f5a623; /* Cor de destaque no cabeçalho */
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #444; /* Cor alternada das linhas */
        }

        a {
            text-decoration: none;
            color: #fff; /* Texto claro no link */
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #555; /* Cor de fundo do botão de voltar */
            border: none;
            border-radius: 4px;
            color: #fff;
            text-align: center;
            text-decoration: none;
            font-size: 1em;
        }

        .back-button:hover {
            background-color: #666; /* Cor de fundo do botão de voltar ao passar o cursor */
        }
    </style>
    <script>
        function validarFormulario() {
            const idDoador = document.getElementById('textid_Doador').value;
            if (idDoador.trim() === '' || isNaN(idDoador)) {
                alert('Por favor, insira um ID válido (números apenas).');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <!-- Formulário de Exclusão -->
        <div class="form-container">
            <h1>Excluir Doador</h1>
            <form method="POST" onsubmit="return validarFormulario()">
                <fieldset>
                    <legend>Insira o ID do Doador:</legend>
                    <input type="number" id="textid_Doador" placeholder="ID do Doador" name="textid_Doador" required>
                    <div class="button-container">
                        <button type="submit" name="btnExcluir">Excluir</button>
                        <button type="reset">Limpar</button>
                    </div>
                </fieldset>
            </form>
            <?php 
            if (isset($_POST['btnExcluir'])) {
                include_once '../php/doador.php';
                $excl_Doador = new Doador();
                $excl_Doador->setIDDoador($_POST['textid_Doador']);
                echo "<div style='text-align:center; margin-top:20px;'><strong>" . $excl_Doador->exclusao() . "</strong></div>";
            }
            ?>
        </div>

        <!-- Lista de Doadores -->
        <div class="list-container">
            <h1>Lista de Doadores</h1>
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
                    include_once '../php/doador.php';
                    $p = new Doador();
                    $pro_bd = $p->listar();
                    foreach ($pro_bd as $pro_mostrar) {
                        echo "<tr>
                            <td>{$pro_mostrar[0]}</td>
                            <td>{$pro_mostrar[1]}</td>
                            <td>{$pro_mostrar[2]}</td>
                            <td>{$pro_mostrar[3]}</td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button><a href="/2024_4_new_clothes_web/Exclusao.html">Voltar</a></button><br>
        </div>
    </div>
</body>
</html>
