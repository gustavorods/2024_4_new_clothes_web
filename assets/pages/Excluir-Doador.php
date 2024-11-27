<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de autores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: space-between;
            padding: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .form-container, .list-container {
            background: #fff;
            padding: 15px;
            margin: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        .form-container {
            width: 400px;
        }

        .list-container {
            width: 70%;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        fieldset {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
        }

        legend {
            font-weight: bold;
            font-size: 1.2em;
            color: #555;
        }

        input[type="number"] {
            width: calc(100% - 22px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1em;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
        }

        button {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        button:nth-of-type(1) {
            background-color: #4CAF50; /* Verde */
        }

        button:nth-of-type(2) {
            background-color: #f44336; /* Vermelho */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow-x: auto;
        }

        th, td {
            padding: 12px;
            text-align: left;
            min-width: 120px;
        }

        th {
            background-color: #eee;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: black;
        }

        .back-button {
            display: block;
            margin: 20px auto;
            padding: 8px 16px;
            background-color: #eee;
            border: none;
            cursor: pointer;
            text-align: center;
        }

        .back-button a {
            color: black;
        }
    </style>
    <script>
        function validarFormulario() {
            const idAutor = document.getElementById('textid_autor').value;
            if (idAutor.trim() === '' || isNaN(idAutor)) {
                alert('Por favor, insira um ID válido (números apenas).');
                return false;
            }
            return true; // Permite o envio do formulário
        }
    </script>
</head>
<body>
    <div class="container">
        <!-- Formulário de Exclusão -->
        <div class="form-container">
            <h1>Excluir Autor</h1>
            <form name="" method="POST" action="" onsubmit="return validarFormulario()">
                <fieldset>
                    <legend>Insira o ID do Doador para deletá-lo:</legend>
                    <input type="number" id="textid_Doador" placeholder="ID do Doador" name="textid_Doador" required>
                    <div class="button-container">
                        <button type="submit" name="btnExcluir" value="Excluir">Excluir</button>
                        <button type="reset" name="btnLimpar" value="Limpar">Limpar</button>
                    </div>
                </fieldset>
            </form>
            <h2 id="resultHeader">Resultado na tabela abaixo: </h2>
            <br>
            <?php 
            extract($_POST, EXTR_OVERWRITE);
            if (isset($btnExcluir)) {
                include_once '../php/doador.php';
                $excl_Doador = new Doador();
                $excl_Doador->setIDDoador($textid_Doador);
                echo "<h3>" . $excl_Doador->exclusao() . "</h3>";
            }
            ?>
        </div>

        <!-- Lista de Autores -->
        <div class="list-container">
        <h1>Dados do Doadores</h1>
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
        $pro_bd=$p->listar();
        foreach($pro_bd as $pro_mostrar){
            ?>
            <tr>
                <td><?php echo $pro_mostrar[0]; ?></td>
                <td><?php echo $pro_mostrar[1]; ?></td>
                <td><?php echo $pro_mostrar[2]; ?></td>
                <td><?php echo $pro_mostrar[3]; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <button><a href="../menu.html">Voltar</a></button>
    </div>
</body>
</html>
