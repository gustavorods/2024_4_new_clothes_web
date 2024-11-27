<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Autor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Century Gothic', sans-serif;
        }

        a {
            text-decoration: none;
            color: black;
        }
        button {
            padding: 10px 20px;
            background-color: #eee;
            border: none;
            cursor: pointer;
        }
        .form-group{
            width: 400px;
        }
    </style>
</head>
<body>
<center>
    <form name = "autores" method = "POST" action = "">

   

        <div class="form-group">
            <label for="exampleInputPassword1">Nome</label>
            <p><input type="text" class="form-control" id="Nome" placeholder="Informe o nome do autor" name = "txtNome" size = "10"></p>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <p><input type="text" class="form-control" id="email" placeholder="Informe a sobrenome do autor" name = "txtEmail" size = "10"></p>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">CPF</label>
            <p><input type="text" class="form-control" id="cpf" placeholder="Informe o Email do autor" name = "txtCPF" size = "10"></p>
        </div>

        <div class="form-group">
    <label for="senha">Senha</label>
    <p><input type="password" class="form-control" id="senha" placeholder="Informe a senha" name="txtSenha" size="10"></p>
</div>




        <button type="submit" class="btn btn-primary" name = "btnenviar">Cadastrar</button>
    </form><br>
    <button><a href="../menu.html">Voltar</a></button>
</center>
<?php
if (isset($_POST['btnenviar'])) {
    include_once '../php/doador.php';
    $doadorr = new Doador();

    // Use isset para evitar problemas com variáveis não definidas
    $doadorr->setNome(isset($_POST['txtNome']) ? $_POST['txtNome'] : '');
    $doadorr->setEmail(isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '');
    $doadorr->setCPF(isset($_POST['txtCPF']) ? $_POST['txtCPF'] : '');
    $doadorr->setSenha(isset($_POST['txtSenha']) ? $_POST['txtSenha'] : '');

    echo "<h3><br><br>" . $doadorr->salvar() . "</h3>";
}
?>

</body>

</html>
