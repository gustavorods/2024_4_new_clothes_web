<?php
session_start();

// importando as classes necessarias 
include_once './assets/php/metodos_principais.php';
include_once './assets/php/doador.php';
include_once './assets/php/ong.php';

// Instanciando 
$metodos_principais = new metodos_principais();

$mensagem = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if (isset($_POST['Entrar'])) {
        // Pegando dados 
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Chamando método esperando retorno (vai me retornar a tabela do usuario)
        $result = $metodos_principais->verificarTabela($email, $senha);

        switch ($result) {
            case 'doador':
                // Pegando todos os dados do doador e armazenando em um variav. de sessão 
                $doador = new Doador();
                $id = $doador->getIdByEmailSenha($email, $senha);
                $_SESSION['dados_user'] = $doador->getDadosById($id);
                
                // Redirecionamento
                header("Location:./assets/pages/home_doador.php"); 
                exit(); 
                break;
        
            case 'ong':
                // Pegando todos os dados do ong e armazenando em um variav. de sessão 
                $id = $metodos_principais->getIdByEmailAndPasswordONG($email, $senha);
                $_SESSION['dados_user'] = $metodos_principais->getDataByIdONG($id);
                
                // Redirecionamento
                header("Location:./assets/pages/home_ong.php"); 
                exit();
                break; 
                
            case 'administrador':
                header("Location:./Home-Administrador.html"); 
                exit();
                break; 

            default:
                $mensagem = 'senha ou email inválido, tente novamente';
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
</head>
<style>
    /* Reset de margens e paddings */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    background-color: #A4573B; /* Cor fornecida */
    padding: 30px;
    border-radius: 10px;
    width: 100%;
    max-width: 400px;
    text-align: center;
    color: #fff;
}

h2 {
    margin-bottom: 20px;
    font-size: 24px;
}

.input-group {
    margin-bottom: 20px;
    text-align: left;
}

label {
    display: block;
    font-size: 14px;
    margin-bottom: 5px;
}

input {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-top: 5px;
}

button {
    width: 100%;
    padding: 12px;
    background-color: #7E3B2A; /* Cor mais escura do tom A4573B */
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #5D2A1C; /* Tom mais escuro ao passar o mouse */
}
</style>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="#" method="POST">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit" name="Entrar">Entrar</button>
        </form>
    </div>

     <!-- Mensagem de retorno -->
     <?php if (!empty($mensagem)) { ?>
        <script>alert('<?php echo htmlspecialchars($mensagem); ?>');</script>
    <?php } ?>
</body>
</html>
