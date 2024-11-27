<?php
include 'conectar.php';

class metodos_principais {
    // Atributo para conexão com o banco
    private $conn;

    // Construtor para inicializar a conexão
    public function __construct() {
        $this->conn = conectar::getInstance();
    }

    // Método para verificar a qual tabela o email e senha pertencem
    public function verificarTabela($email, $senha) {
        // Consultas SQL para verificar o email e senha nas diferentes tabelas
        $query_admin = "SELECT * FROM administrador WHERE email = :email AND senha = :senha";
        $query_doador = "SELECT * FROM doador WHERE email = :email AND senha = :senha";
        $query_ong = "SELECT * FROM ong WHERE email = :email AND senha = :senha";

        // Verificar na tabela administrador
        $stmt = $this->conn->prepare($query_admin);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return 'administrador'; // Encontrou na tabela administrador
        }

        // Verificar na tabela doador
        $stmt = $this->conn->prepare($query_doador);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return 'doador'; // Encontrou na tabela doador
        }

        // Verificar na tabela ong
        $stmt = $this->conn->prepare($query_ong);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return 'ong'; // Encontrou na tabela ong
        }

        // Caso não encontre o usuário
        return 'não encontrado';
    }
}
?>
