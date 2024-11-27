<?php
include 'conectar.php';
class Ong {
    // Atributos
    private $ID_ong;
    private $nome;
    private $email;
    private $CNPJ;
    private $endereco;
    private $telefone;
    private $senha;

    // Atributo para conexão com o banco
    private $conn;

  

    // Getters e Setters
    public function getIDOng() {
        return $this->ID_ong;
    }

    public function setIDOng($ID_ong) {
        $this->ID_ong = $ID_ong;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getCNPJ() {
        return $this->CNPJ;
    }

    public function setCNPJ($CNPJ) {
        $this->CNPJ = $CNPJ;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    // Método para criar uma nova ONG
    public function create() {
        $query = "INSERT INTO ong (nome, email, CNPJ, endereco, telefone, senha) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        // Bind os parâmetros
        $stmt->bind_param("ssssss", $this->nome, $this->email, $this->CNPJ, $this->endereco, $this->telefone, $this->senha);

        // Executar
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Método para ler todas as ONGs
    public function read() {
        $query = "SELECT ID_ong, nome, email, CNPJ, endereco, telefone FROM ong";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($this->ID_ong, $this->nome, $this->email, $this->CNPJ, $this->endereco, $this->telefone);

        return $stmt;
    }

    // Método para ler uma ONG específica
    public function readOne() {
        $query = "SELECT ID_ong, nome, email, CNPJ, endereco, telefone, senha FROM ong WHERE ID_ong = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("i", $this->ID_ong);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($this->ID_ong, $this->nome, $this->email, $this->CNPJ, $this->endereco, $this->telefone, $this->senha);
        $stmt->fetch();

        return $stmt;
    }

    // Método para atualizar uma ONG existente
    public function update() {
        $query = "UPDATE ong SET nome = ?, email = ?, CNPJ = ?, endereco = ?, telefone = ?, senha = ? WHERE ID_ong = ?";

        $stmt = $this->conn->prepare($query);

        // Bind os parâmetros
        $stmt->bind_param("ssssssi", $this->nome, $this->email, $this->CNPJ, $this->endereco, $this->telefone, $this->senha, $this->ID_ong);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Método para excluir uma ONG
    public function delete() {
        $query = "DELETE FROM ong WHERE ID_ong = ?";

        $stmt = $this->conn->prepare($query);

        // Bind o parâmetro
        $stmt->bind_param("i", $this->ID_ong);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
