<?php
session_start();

include_once '../php/doador.php';
$Doador = new Doador();

include_once '../php/metodos_principais.php';
$metodos_principais = new metodos_principais();

$all_tamanhos = $metodos_principais->readTamanhos(); 
$all_categorias = $metodos_principais->readCategoria(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['adicionar'])) {
        $categoria_name = $_POST['categoria'];
        $categoria_code = $metodos_principais->getCategoriaIdByName($categoria_name);

        $tamanho_name = $_POST['tamanho'];
        $tamanho_code = $metodos_principais->getTamanhoIdByName($tamanho_name);

        $quantidade = $_POST['quantidade'];


        $id_doacao_recente = $metodos_principais->obterUltimaDoacao($_SESSION['dados_user']['ID_doador']);
        $Doador->criarItemDoacao($quantidade, $id_doacao_recente, $categoria_code, $tamanho_code);

        header("Location:./doacao2.php");  
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Seleção</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #fff; /* Cor de fundo do formulário */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #quantidade {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #A4573B;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #8e3f2f;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Escolha as opções</h2>
    <form action="" method="post">
        <label for="quantidade">Quantidade</label>
        <input type="number" name="quantidade" id="quantidade">

        <label for="categoria">Categoria</label>
        <select name="categoria" id="categoria">
        <?php
        foreach ($all_categorias as $categoria) {
            ?>
            <option value="<?php echo $categoria['nome']; ?>"><?php echo $categoria['nome']; ?></option>
            <?php
        }
        ?>
        </select>

        <label for="tamanho">Tamanho</label>
        <select name="tamanho" id="tamanho">
        <?php
        foreach ($all_tamanhos as $tamanho) {
            ?>
            <option value="<?php echo $tamanho['descricao']; ?>"><?php echo $tamanho['descricao']; ?></option>
            <?php
        }
        ?>
        </select>

        <button type="submit" name="adicionar">Adicionar</button>
    </form>
</div>

</body>
</html>
