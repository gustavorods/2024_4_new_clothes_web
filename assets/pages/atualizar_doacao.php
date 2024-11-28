<?php
session_start();

// Importar e instanciar as classes necessárias
include_once '../php/metodos_principais.php';
$metodos_principais = new metodos_principais();

$mensagem = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if (isset($_POST['alterar'])) {
        $cod_doacao = $_POST['idDoacao'];
        $data_desejada = $_POST['dataDesejada'];

        $result = $metodos_principais->verificarDoacaoExistente($cod_doacao);

        if($result == true) {
            $metodos_principais->alterarDataDoacao($cod_doacao, $data_desejada);
            header("Location:./home_doador.php"); 
            exit(); 
        } else {
            $mensagem = 'Esse id não existe!';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Data da Doação</title>
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #F5F5F5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            background-color: #A4573B;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 90%;
            max-width: 400px;
        }

        h1 {
            color: #FFF;
            margin-bottom: 20px;
            font-size: 24px;
        }

        label {
            color: #FFF;
            font-size: 16px;
            display: block;
            margin-bottom: 10px;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 2px solid #FFF;
            border-radius: 5px;
            background-color: #FFF;
            font-size: 14px;
            outline: none;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .btn {
            display: inline-block;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn.alterar {
            background-color: #5CB85C;
            color: #FFF;
        }

        .btn.alterar:hover {
            background-color: #4CAE4C;
        }

        .btn.voltar {
            background-color: #5BC0DE;
            color: #FFF;
            text-decoration: none;
        }

        .btn.voltar:hover {
            background-color: #31B0D5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Alterar Data da Doação</h1>
        <form action="" method="POST">
            <label for="idDoacao">ID da Doação:</label>
            <input type="text" id="idDoacao" name="idDoacao" required placeholder="Digite o ID da doação">

            <label for="dataDesejada">Data Desejada:</label>
            <input type="date" id="dataDesejada" name="dataDesejada" required>

            <div class="buttons">
                <button type="submit" class="btn alterar" name="alterar">Alterar Data</button>
                <a href="/../2024_4_new_clothes_web/assets/pages/home_doador.php" class="btn voltar">Voltar para Home</a>
            </div>
        </form>
    </div>

    <!-- Mensagem de retorno -->
    <?php if (!empty($mensagem)) { ?>
        <script>alert('<?php echo htmlspecialchars($mensagem); ?>');</script>
    <?php } ?>
</body>
</html>
