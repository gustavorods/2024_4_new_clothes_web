<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Ongs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212; /* Fundo escuro */
            color: #e0e0e0; /* Texto claro */
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
            background: #1e1e1e; /* Fundo escuro */
            padding: 15px;
            margin: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
        }

        .form-container {
            width: 400px;
        }

        .list-container {
            width: 90%;
        }

        h1 {
            text-align: center;
            color: #f5f5f5; /* Título claro */
        }

        h2, h3 {
            color: #f5f5f5; /* Títulos das seções em claro */
        }

        fieldset {
            border: 1px solid #444; /* Borda mais escura */
            padding: 15px;
            border-radius: 8px;
            color: #f5f5f5;
        }

        legend {
            font-weight: bold;
            font-size: 1.2em;
            color: #f5f5f5;
        }

        input[type="number"] {
            width: calc(100% - 22px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #666; /* Borda mais clara */
            border-radius: 4px;
            font-size: 1em;
            background-color: #333; /* Fundo do campo de input escuro */
            color: #f5f5f5; /* Texto claro */
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
            color: #e0e0e0; /* Texto claro */
        }

        th, td {
            padding: 12px;
            text-align: left;
            min-width: 120px;
        }

        th {
            background-color: #333; /* Fundo escuro para cabeçalhos */
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #444; /* Fundo de linha alternado */
        }

        a {
            text-decoration: none;
            color: #fff; /* Links em branco */
        }

        .back-button {
            display: block;
            margin: 20px auto;
            padding: 8px 16px;
            background-color: #333; /* Fundo escuro */
            border: none;
            cursor: pointer;
            text-align: center;
        }

        .back-button a {
            color: white;
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
                    <legend>Insira o ID da Ong para deletá-la:</legend>
                    <input type="number" id="textid_Ong" placeholder="ID da Ong" name="textid_Ong" required>
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
                include_once '../php/ong.php';
                $excl_Ong = new Ong();
                $excl_Ong->setIDOng($textid_Ong);
                echo "<h3>" . $excl_Ong->exclusao() . "</h3>";
            }
            ?>
        </div>

        <!-- Lista de Autores -->
        <div class="list-container">
        <h1>Dados das Ongs</h1>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>CNPJ</th>
            <th>Endereço</th>
            <th>Telefone</th>
        </tr>
        </thead>
        <tbody>
        <?php
      include_once '../php/ong.php';
        $p = new Ong();
        $pro_bd=$p->listar();
        foreach($pro_bd as $pro_mostrar){
            ?>
            <tr>
                <td><?php echo $pro_mostrar[0]; ?></td>
                <td><?php echo $pro_mostrar[1]; ?></td>
                <td><?php echo $pro_mostrar[2]; ?></td>
                <td><?php echo $pro_mostrar[3]; ?></td>
                <td><?php echo $pro_mostrar[4]; ?></td>
                <td><?php echo $pro_mostrar[5]; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <button><a href="/2024_4_new_clothes_web/Exclusao.html">Voltar</a></button><br>
    </div>
</body>
</html>
