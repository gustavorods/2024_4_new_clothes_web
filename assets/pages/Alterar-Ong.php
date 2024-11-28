<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração e Listagem de Autores</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
        }

        .container, .table-card {
            background-color: #1f1f1f;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            width: 400px;
            transition: all 0.3s ease;
        }

        .table-card {
            width: 800px;
        }

        .container:hover, .table-card:hover {
            transform: translateY(-5px);
        }

        h1 {
            text-align: center;
            color: #3498db;
            margin-bottom: 20px;
            font-size: 2em;
            font-weight: bold;
        }

        label {
            font-weight: 500;
            color: #ecf0f1;
            display: block;
            margin-bottom: 8px;
        }

        input[type="number"],
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #444;
            border-radius: 8px;
            font-size: 16px;
            background-color: #2c3e50;
            color: #ecf0f1;
            transition: border-color 0.3s;
        }

        input[type="number"]:focus,
        input[type="text"]:focus {
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
            outline: none;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
            flex: 1;
            margin: 0 5px;
        }

        button:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        .btn-clear {
            background-color: #e74c3c;
        }

        .btn-clear:hover {
            background-color: #c0392b;
        }

        .btn-back {
            background-color: #2ecc71;
        }

        .btn-back:hover {
            background-color: #27ae60;
        }

        .table-card {
            padding: 20px;
            border-radius: 15px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #2c3e50;
        }

        tr:nth-child(odd) {
            background-color: #34495e;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        .back-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #333;
            border: none;
            color: #ecf0f1;
            cursor: pointer;
            text-align: center;
            border-radius: 5px;
        }

        .back-button:hover {
            background-color: #2c3e50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Alteração das Ongs</h1>
        <form action="./Alterar-Ong2.php" method="POST" name="cliente">
            <label for="doador-id">Informe o ID da Ong:</label>
            <input type="number" id="ong-id" name="ong-id" placeholder="Digite o ID da ONG" required>

            <div class="buttons">
                <button type="submit">Enviar</button>
                <button type="reset" class="btn-clear">Limpar</button>
                <a href="/2024_4_new_clothes_web/Alteracao.html"><button type="button" class="btn-back">Voltar</button></a>
            </div>
        </form>
    </div>

    <div class="table-card">
        <h1>Dados da Ong</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CNPJ</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Senha</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once '../php/ong.php';
                $p = new Ong();
                $pro_bd = $p->listar();
                foreach ($pro_bd as $pro_mostrar) {
                    echo "<tr>
                            <td>{$pro_mostrar[0]}</td>
                            <td>{$pro_mostrar[1]}</td>
                            <td>{$pro_mostrar[2]}</td>
                            <td>{$pro_mostrar[3]}</td>
                            <td>{$pro_mostrar[4]}</td>
                            <td>{$pro_mostrar[5]}</td>
                            <td>{$pro_mostrar[6]}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table><br>
        <a href="/2024_4_new_clothes_web/Alteracao.html"><button type="button" class="btn-back">Voltar</button></a>
    </div>
</body>
</html>
