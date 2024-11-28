<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar ONG</title>
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
    <form name="ongs" method="POST" action="">
        <h1>Cadastrar ONG</h1>
        
        <div class="form-group">
            <label for="Nome">Nome</label>
            <input type="text" class="form-control" id="Nome" placeholder="Informe o nome da ONG" name="txtNome" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Informe o email da ONG" name="txtEmail" required>
        </div>

        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" placeholder="Informe o CNPJ da ONG" name="txtCNPJ" required>
        </div>

        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" placeholder="Informe o endereço da ONG" name="txtEndereco" required>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" placeholder="Informe o telefone da ONG" name="txtTelefone" required>
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
        include_once '../php/ong.php';
        $ongg = new Ong();

        // Use isset para evitar problemas com variáveis não definidas
        $ongg->setNome(isset($_POST['txtNome']) ? $_POST['txtNome'] : '');
        $ongg->setEmail(isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '');
        $ongg->setCNPJ(isset($_POST['txtCNPJ']) ? $_POST['txtCNPJ'] : '');
        $ongg->setEndereco(isset($_POST['txtEndereco']) ? $_POST['txtEndereco'] : '');
        $ongg->setTelefone(isset($_POST['txtTelefone']) ? $_POST['txtTelefone'] : '');
        $ongg->setSenha(isset($_POST['txtSenha']) ? $_POST['txtSenha'] : '');

        echo "<div class='alert alert-info text-center mt-3'><strong>" . $ongg->salvar() . "</strong></div>";
    }
    ?>
</body>
</html>
