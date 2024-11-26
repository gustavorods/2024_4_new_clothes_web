<?php
class conectar {
    private $host = "localhost"; // Endereço do servidor
    private $username = "root";  // Usuário do banco de dados
    private $password = "";      // Senha do banco de dados
    private $dbname = "bdnewclothes"; // Nome do banco de dados
    private $conn;

    // Método para estabelecer a conexão com o banco de dados
    public function connect() {
        $this->conn = null;

        try {
            // Criando a conexão com MySQL
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

            // Checando se houve algum erro na conexão
            if ($this->conn->connect_error) {
                die("Conexão falhou: " . $this->conn->connect_error);
            }

            echo "Conexão bem-sucedida!";
        } catch (Exception $e) {
            echo "Erro ao conectar: " . $e->getMessage();
        }

        return $this->conn;
    }

    // Método para fechar a conexão
    public function close() {
        if ($this->conn) {
            $this->conn->close();
            echo "Conexão fechada!";
        }
    }
}

$db = new conectar();
$connection = $db->connect();


// $db->close();
?>
