<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Cloths</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #A4573B;
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #A4573B;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            padding: 10px 20px;
            transition: background 0.3s;
        }

        nav a:hover {
            background-color: #8E3F2F;
            border-radius: 5px;
        }

        main {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #A4573B;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #A4573B;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #F5F5F5;
        }
    </style>
</head>
<body>
    <header>
        <h1>ONG New Cloths</h1>
    </header>
    <nav>
        <a href="#">Fazer Nova Doação</a>
        <a href="#">Excluir Doações</a>
        <a href="#">Atualizar Doações</a>
    </nav>
    <main>
        <h2>Suas Doações</h2>
        <table>
            <thead>
                <tr>
                    <th>ID doacao</th>
                    <th>Data</th>
                    <th>ID ong</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2024-11-25</td>
                    <td>5</td>
                </tr>
            </tbody>
        </table>
    </main>
</body>
</html>
