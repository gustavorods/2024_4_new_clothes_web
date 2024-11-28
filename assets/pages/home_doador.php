<?php
session_start();

// Importar e instanciar as classes necessárias
include_once '../php/doador.php';
$doador = new Doador();

// Pegando todas as doações 
$doacoes = $doador->getDoacoesByDoador($_SESSION['dados_user']['ID_doador']);

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
        <h1>Doador New Clothes</h1>
    </header>
    <nav>
        <a href="/../2024_4_new_clothes_web/assets/pages/doacao1.php">Fazer Nova Doação</a>
        <a href="/../2024_4_new_clothes_web/assets/pages/home_doador.php">Home</a>
        <a href="/../2024_4_new_clothes_web/assets/pages/excluir_doacao.php">Excluir Doações</a>
        <a href="/../2024_4_new_clothes_web/assets/pages/atualizar_doacao.php">Atualizar Doações</a>
        <a href="/../2024_4_new_clothes_web/index.php">Sair</a>
        <a href="/../2024_4_new_clothes_web/Team.html">Desenvolvedores</a>
        <a href="/../2024_4_new_clothes_web/Fale Concosco.html">Fale conosco</a>
    </nav>
    <main>
        <h2>Suas Doações</h2>
        <table>
            <thead>
                <tr>
                    <th>ID doacao</th>
                    <th>Data da Doação</th>
                    <th>ID ong</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($doacoes as $doacao) {
                    ?>
                    <tr>
                        <td><?php echo $doacao["ID_doacao"] ?></td>
                        <td><?php echo $doacao["dataDoacao"] ?></td>
                        <td><?php echo $doacao["ID_ong"] ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
