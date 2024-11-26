<?php
include 'conectar.php';
class Doacao {
    // Atributos
    private $ID_doacao;
    private $dataDoacao;
    private $ID_doador;
    private $ID_ong;

    // Atributo para conexão com o banco
    private $conn;

    // Construtor para inicializar a conexão
    public function __construct($db) {
        $this->conn = $db;
    }

    // Getters e Setters
    public function getIDDoacao() {
        return $this->ID_doacao;
    }

    public function setIDDoacao($ID_doacao) {
        $this->ID_doacao = $ID_doacao;
    }

    public function getDataDoacao() {
        return $this->dataDoacao;
    }

    public function setDataDoacao($dataDoacao) {
        $this->dataDoacao = $dataDoacao;
    }

    public function getIDDoador() {
        return $this->ID_doador;
    }

    public function setIDDoador($ID_doador) {
        $this->ID_doador = $ID_doador;
    }

    public function getIDOng() {
        return $this->ID_ong;
    }

    public function setIDOng($ID_ong) {
        $this->ID_ong = $ID_ong;
    }

    // Método para criar uma nova doação
    public function create() {
        $query = "INSERT INTO doacao (dataDoacao, ID_doador, ID_ong) VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        // Bind os parâmetros
        $stmt->bind_param("sii", $this->dataDoacao, $this->ID_doador, $this->ID_ong);

        // Executar
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Método para ler todas as doações
    public function read() {
        $query = "SELECT ID_doacao, dataDoacao, ID_doador, ID_ong FROM doacao";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($this->ID_doacao, $this->dataDoacao, $this->ID_doador, $this->ID_ong);

        return $stmt;
    }

    // Método para atualizar uma doação existente
    public function update() {
        $query = "UPDATE doacao SET dataDoacao = ?, ID_doador = ?, ID_ong = ? WHERE ID_doacao = ?";

        $stmt = $this->conn->prepare($query);

        // Bind os parâmetros
        $stmt->bind_param("siii", $this->dataDoacao, $this->ID_doador, $this->ID_ong, $this->ID_doacao);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Método para excluir uma doação
    public function delete() {
        $query = "DELETE FROM doacao WHERE ID_doacao = ?";

        $stmt = $this->conn->prepare($query);

        // Bind o parâmetro
        $stmt->bind_param("i", $this->ID_doacao);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Método para ler uma doação específica
    public function readOne() {
        $query = "SELECT ID_doacao, dataDoacao, ID_doador, ID_ong FROM doacao WHERE ID_doacao = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("i", $this->ID_doacao);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($this->ID_doacao, $this->dataDoacao, $this->ID_doador, $this->ID_ong);
        $stmt->fetch();

        return $stmt;
    }
}
?>
