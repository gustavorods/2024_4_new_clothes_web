<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Doadores</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        /* Tema Dark */
        body {
            font-family: 'Century Gothic', sans-serif;
            background-color: #121212; /* Fundo escuro */
            color: #ffffff; /* Texto claro */
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background: #1e1e1e; /* Fundo do formulário */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.6);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            text-align: center;
            color: #4CAF50; /* Verde vibrante */
        }

        .form-control {
            background-color: #2c2c2c; /* Fundo dos campos */
            color: #ffffff; /* Texto dos campos */
            border: 1px solid #444444;
        }

        .form-control::placeholder {
            color: #bbbbbb; /* Cor dos placeholders */
        }

        .form-control:focus {
            background-color: #333333;
            color: #ffffff;
            border-color: #4CAF50; /* Destaque ao focar */
            box-shadow: none;
        }

        .btn-primary {
            background-color: #4CAF50; /* Botão verde */
            border: none;
        }

        .btn-primary:hover {
            background-color: #45a049; /* Verde mais claro ao passar o mouse */
        }

        .btn-secondary {
            background-color: #444444; /* Botão secundário escuro */
            color: #ffffff;
        }

        .btn-secondary:hover {
            background-color: #555555;
        }

        button a {
            text-decoration: none;
            color: inherit;
        }

        button:hover a {
            color: inherit;
        }
    </style>
</head>
<body>
    <form name="autores" method="POST" action="">
        <h1>Cadastrar Doador</h1>
        
        <div class="form-group">
            <label for="Nome">Nome</label>
            <input type="text" class="form-control" id="Nome" placeholder="Informe o nome do Doador" name="txtNome" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Informe o email do Doador" name="txtEmail" required>
        </div>

        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="number" class="form-control" id="cpf" placeholder="Informe o CPF do Doador" name="txtCPF" required>
        </div>

        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" placeholder="Informe a senha" name="txtSenha" required>
        </div>

        <button type="submit" class="btn btn-primary" name="btnenviar">Cadastrar</button>
        
        <button class="btn btn-secondary"><a href="/2024_4_new_clothes_web/Cadastro.html">Voltar</a></button>
    </form>

    <?php
    if (isset($_POST['btnenviar'])) {
        include_once '../php/doador.php';
        $doadorr = new Doador();

        // Use isset para evitar problemas com variáveis não definidas
        $doadorr->setNome(isset($_POST['txtNome']) ? $_POST['txtNome'] : '');
        $doadorr->setEmail(isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '');
        $doadorr->setCPF(isset($_POST['txtCPF']) ? $_POST['txtCPF'] : '');
        $doadorr->setSenha(isset($_POST['txtSenha']) ? $_POST['txtSenha'] : '');

        echo "<div class='alert alert-info text-center mt-3'><strong>" . $doadorr->salvar() . "</strong></div>";
    }
    ?>
</body>
</html>
