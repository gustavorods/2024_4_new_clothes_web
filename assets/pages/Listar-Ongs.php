
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar ongs</title>
    <style>
        body {
            font-family: 'Century Gothic', sans-serif;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
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
    </style>
</head>
<body>
<center>
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
    <button><a href="../menu.html">Voltar</a></button>
</center>
</body>
</html>
