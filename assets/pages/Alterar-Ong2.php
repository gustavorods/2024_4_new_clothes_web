<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Autores</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #2c3e50;
            color: #ecf0f1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        fieldset {
            border: none;
            padding: 30px;
            border-radius: 10px;
            background-color: #34495e;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            width: 400px;
            position: relative;
        }

        legend {
            font-weight: bold;
            color: #ecf0f1;
            font-size: 1.8em;
            padding-bottom: 10px;
            border-bottom: 2px solid #3498db;
            margin-bottom: 20px;
            text-align: center;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"] {
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #bdc3c7;
            border-radius: 5px;
            width: calc(100% - 24px);
            font-size: 16px;
            transition: border-color 0.3s;
            background-color: #2c3e50;
            color: #ecf0f1;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="date"]:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }

        input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
            transition: background-color 0.3s, transform 0.2s;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        b {
            display: block;
            margin-bottom: 5px;
            font-size: 1em;
            color: #ecf0f1;
        }

        .message {
            margin-top: 20px;
            font-size: 1.1em;
            color: #27ae60;
            text-align: center;
        }

        @media (max-width: 600px) {
            fieldset {
                width: 90%;
            }
        }

        .back-button {
            margin-top: 15px;
            text-decoration: none;
            display: block;
            text-align: center;
            color: #3498db;
            font-size: 1.2em;
        }

        .back-button:hover {
            color: #2980b9;
        }
    </style>
</head>
<body>
    <fieldset>
        <legend>Alterar Ongs Cadastradas</legend>

        <?php
            $ID_ong = $_POST["ong-id"];
            include_once '../php/ong.php';
            $p = new Ong();
            $p->setIDOng($ID_ong);
            $pro_bd = $p->alterar();
        ?>

        <form action="" method="post" name="cliente2">
            <?php foreach ($pro_bd as $pro_mostrar): ?>
                <input type="hidden" name="txtid" value='<?php echo $pro_mostrar[0]; ?>'>
                <b>ID:</b> <?php echo $pro_mostrar[0]; ?><br>
                
                <b>Nome:</b>
                <input type="text" name="txtnome" value='<?php echo $pro_mostrar[1]; ?>' required><br>
                
                <b>Email:</b>
                <input type="email" name="txtemail" value='<?php echo $pro_mostrar[2]; ?>' required><br>
                
                <b>CNPJ:</b>
                <input type="text" name="txtcnpj" value='<?php echo $pro_mostrar[3]; ?>' required><br>

                <b>Endereco:</b>
                <input type="text" name="txtendereco" value='<?php echo $pro_mostrar[4]; ?>' required><br>
                
                <b>Telefone:</b>
                <input type="text" name="txttelefone" value='<?php echo $pro_mostrar[5]; ?>' required><br>
                
                <b>Senha:</b>
                <input type="text" name="txtsenha" value='<?php echo $pro_mostrar[6]; ?>' required><br>

                <a href="/2024_4_new_clothes_web/Alteracao.html" class="back-button">Voltar ao Menu</a>
                
                <input type="submit" name="btn_alterar" value="Alterar">
            <?php endforeach; ?>
        </form>

        <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btn_alterar)) {
            $p->setIDOng($txtid);
            $p->setNome($txtnome);
            $p->setEmail($txtemail);
            $p->setCNPJ($txtcnpj);
            $p->setEndereco($txtendereco);
            $p->setTelefone($txttelefone);
            $p->setSenha($txtsenha);
            
            echo "<div class='message'>" . $p->alterar2() . "</div>";
            header("location:Alterar-Ong.php");
        }
        ?>
    </fieldset>
</body>
</html>
