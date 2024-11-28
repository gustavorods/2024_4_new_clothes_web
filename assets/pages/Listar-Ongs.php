<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar ONGs</title>
    <style>
        /* Estilo geral */
        body {
            font-family: 'Century Gothic', sans-serif;
            background-color: #1e1e1e; /* Fundo escuro */
            color: #f5f5f5; /* Texto claro */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        /* Título */
        h1 {
            color: #f0a500; /* Amarelo ouro */
            margin-bottom: 20px;
        }

        /* Tabela */
        table {
            width: 1000px;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #2e2e2e; /* Fundo da tabela */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #3e3e3e; /* Fundo do cabeçalho */
            color: #f0a500; /* Texto do cabeçalho */
            font-size: 1.1rem;
        }

        tr:nth-child(even) {
            background-color: #2b2b2b; /* Linhas pares */
        }

        tr:hover {
            background-color: #444444; /* Realce ao passar o mouse */
        }

        td {
            color: #ffffff; /* Texto das células */
        }

        /* Botão */
        button {
            padding: 12px 24px;
            background-color: #f0a500; /* Amarelo ouro */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: #1e1e1e; /* Texto escuro */
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #d98e00; /* Amarelo mais escuro */
            transform: scale(1.05);
        }

        /* Link dentro do botão */
        button a {
            text-decoration: none;
            color: #1e1e1e; /* Mesmo tom do botão */
            font-weight: bold;
        }

        button a:hover {
            color: #000; /* Cor mais escura ao passar o mouse */
        }
    </style>
</head>
<body>
    <center>
        <h1>Dados das ONGs</h1>
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
                $pro_bd = $p->listar();
                foreach ($pro_bd as $pro_mostrar) {
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
        <button><a href="/2024_4_new_clothes_web/Listagem.html">Voltar</a></button><br>


    </center>
</body>
</html>
