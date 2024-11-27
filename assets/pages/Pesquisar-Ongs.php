<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Estilizado</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 50%;
    margin: 50px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
}

fieldset {
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 8px;
}

legend {
    font-weight: bold;
    font-size: 1.2em;
    color: #555;
}

input[type="text"] {
    width: calc(100% - 22px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1em;
}

.button-container {
    display: flex;
    justify-content: space-between;
}

button {
    padding: 10px 20px;
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

#resultHeader {
    text-align: center;
    color: #333;
    margin-top: 20px;
}

    </style>
</head>
<body>
    <div class="container">
        <h1></h1>
        <form name = "cliente" method = "POST" action = "">
            <fieldset>
                <legend>Insira o nome da Ong para pesquisar:</legend>
                <input type="text" id="txtnome_autor" placeholder="Nome da Ong" name = "txtnome_ong">
                <div class="button-container">
                    <button type="submit" name = "btnConsultar" value = "Consultar">Clique para consultar Autores</button>
                    <button type="reset" name = "btnLimpar"   value = "Limpar">Limpar</button>
                </div>
            </fieldset>
        </form>
        <h2 id="Resultado:">Resultado na tabela abaixo: </h2>
        <br>
        
         <style>
             table {
                 width: 100%;
                 border-collapse: collapse;
                 margin-top: 20px;
             }

             thead {
                 background-color: #2f2f2f;
             }

             th, td {
                 padding: 12px;
                 text-align: left;
                 border-bottom: 1px solid #ddd;
             }

             th {
                 background-color: #2f2f2f;
                 color: white;
             }

             tr:nth-child(even) {
                 background-color: #f2f2f2;
             }

             tr:hover {
                 background-color: #ddd;
             }

             p {
                 font-size: 1.1em;
                 color: #ff0000;
             }
         </style>
        <?php 
            extract($_POST, EXTR_OVERWRITE);
            include_once '../php/ong.php';
            if (isset($btnConsultar)) {
                $consul_Ong = new Ong();
                $consul_Ong->setNome($txtnome_ong . '%');
                $pro_bd = $consul_Ong->consultar();
            } else {
                $pro_bd = [];
            }

            echo '<table>';
            echo '<thead>';
            echo '<tr><th>ID</th><th>Nome</th><th>Email</th><th>CNPJ</th><th>Endereco</th><th>Telefone</th></tr>';
            echo '</thead>';
            echo '<tbody>';

            if (!empty($pro_bd)) {
                foreach ($pro_bd as $pro_mostrar) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($pro_mostrar[0]) . '</td>';
                    echo '<td>' . htmlspecialchars($pro_mostrar[1]) . '</td>';
                    echo '<td>' . htmlspecialchars($pro_mostrar[2]) . '</td>';
                    echo '<td>' . htmlspecialchars($pro_mostrar[3]) . '</td>';
                    echo '<td>' . htmlspecialchars($pro_mostrar[4]) . '</td>';
                    echo '<td>' . htmlspecialchars($pro_mostrar[5]) . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="3">Nenhum Ong encontrado.</td></tr>';
            }

            echo '</tbody>';
            echo '</table>';
        ?><br>
            <button><a href="../menu.html">Voltar</a></button><br>
            
            
    </div>

</body>




</html>
