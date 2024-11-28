<?php
session_start();

include_once '../php/metodos_principais.php';
$metodos_principais = new metodos_principais();

$all_ongs = $metodos_principais->readOngs();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['iniciar_doacao'])) {
        $data = $_POST['data_doacao'];
        $ong_name = $_POST['ong'];
        $ong_cod = $metodos_principais->getOngIdByName($ong_name);

        $metodos_principais->criarDoacao($data, $_SESSION['dados_user']['ID_doador'], $ong_cod);

        header("Location:./doacao2.php");  
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Doação</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            color: #A4573B;
        }

        label {
            font-size: 16px;
            color: #333;
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #A4573B;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            padding: 12px;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #8a4a2a;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Formulário de Doação</h2>
        <form action="#" method="POST">
            <label for="data-doacao">Data da Doação</label>
            <input type="date" id="data-doacao" name="data_doacao" required>

            <label for="ong">Selecione a ONG</label>
            <select id="ong" name="ong" required>
                <?php
                foreach ($all_ongs as $ong) {
                    ?>
                    <option value="<?php echo $ong['nome']; ?>"><?php echo $ong['nome']; ?></option>
                    <?php
                }
                ?>
            </select>

            <input type="submit" value="Iniciar Doação" name="iniciar_doacao">
        </form>
    </div>

</body>
</html>
