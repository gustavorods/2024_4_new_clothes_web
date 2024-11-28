<?php
session_start();

include_once '../php/metodos_principais.php';
$metodos_principais = new metodos_principais();

$id_doacao_recente = $metodos_principais->obterUltimaDoacao($_SESSION['dados_user']['ID_doador']);
$itensDoacao = $metodos_principais->obterItemDaDoacao($id_doacao_recente);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Doação</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #A4573B;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #A4573B;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #A4573B;
            color: white;
        }
        .btn-container {
            margin-top: 20px;
            text-align: center;
        }
        button {
            background-color: #A4573B;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin: 10px;
            border-radius: 5px;
        }
        button:hover {
            background-color: #8C4A2E;
        }
        a{
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Doação de Itens</h1>
        
        <!-- Tabela de Itens -->
        <table>
            <thead>
                <tr>
                    <th>ID_item</th>
                    <th>Quantidade</th>
                    <th>Cod_categoria</th>
                    <th>ID_tamanho</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if($itensDoacao == null) {
                    // n aparece nada
                } else {
                    foreach ($itensDoacao as $item) {
                        ?>
                        <tr>
                            <td><?php echo $item["ID_item"] ?></td>
                            <td><?php echo $item["qtd"] ?></td>
                            <td><?php echo $item["cod_categoria"] ?></td>
                            <td><?php echo $item["ID_tamanho"] ?></td>
                        </tr>
                        <?php
                    }
                }
            ?>
            </tbody>
        </table>

        <!-- Botões -->
        <div class="btn-container">
            <button><a href="./adicionar_novo_item_doacao.php">Adicionar Novo Item</a></button>
            <button><a href="/../2024_4_new_clothes_web/assets/pages/home_doador.php">Finalizar Doação</a></button>
        </div>
    </div>
</body>
</html>
