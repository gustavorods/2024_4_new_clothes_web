<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração e Listagem de Autores</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
        }

        .container, .table-card {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            transition: all 0.3s ease;
        }

        .table-card {
            width: 600px;
        }

        .container:hover, .table-card:hover {
            transform: translateY(-5px);
        }

        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
            font-size: 2em;
            font-weight: bold;
        }

        label {
            font-weight: 500;
            color: #495057;
            display: block;
            margin-bottom: 8px;
        }

        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #80bdff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        button {
            background-color: #007bff;
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
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .btn-clear {
            background-color: #dc3545;
        }

        .btn-clear:hover {
            background-color: #c82333;
        }

        .btn-back {
            background-color: #28a745;
        }

        .btn-back:hover {
            background-color: #218838;
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
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: black;
        }

        .back-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #eee;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Alteração de Doadores</h1>
        <form action="./Alterar-Doador2.php" method="POST" name="cliente">
            <label for="doador-id">Informe o ID do Doador:</label>
            <input type="number" id="doador-id" name="doador-id" placeholder="Digite o ID do Doador" required>

            <div class="buttons">
                <button type="submit">Enviar</button>
                <button type="reset" class="btn-clear">Limpar</button>
                <a href="../Menu-opcoes-alterar.html"><button type="button" class="btn-back">Voltar</button></a>
            </div>
        </form>
    </div>

    <div class="table-card">
        <h1>Dados do Doador</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Senha</th>
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
                            <td>{$pro_mostrar[4]}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
        <button class="back-button"><a href="../menu.html">Voltar</a></button>
    </div>
</body>
</html>
