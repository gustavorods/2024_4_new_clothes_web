<?php
include_once 'conectar.php';
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

    // Construtor para inicializar a conexão


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

    function alterar()
    {
        try
        {
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("Select * from ong where ID_ong = ?");
            @$sql-> bindParam(1, $this->getIDOng(), PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        }
        catch(PDOException $exc)
        {
            echo "Erro ao alterar. " . $exc->getMessage();
        }
    }

    function alterar2()
    {
        try
        {
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("update ong set nome = ?, email = ?, CNPJ = ?, Endereco = ?, Telefone = ?, senha = ? where ID_ong = ?");
            @$sql-> bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getEmail(), PDO::PARAM_STR);
            @$sql-> bindParam(3, $this->getCNPJ(), PDO::PARAM_STR);
            @$sql-> bindParam(4, $this->getEndereco(), PDO::PARAM_STR);
            @$sql-> bindParam(5, $this->getTelefone(), PDO::PARAM_STR);
            @$sql-> bindParam(6, $this->getSenha(), PDO::PARAM_STR);
            @$sql-> bindParam(7, $this->getIDOng(), PDO::PARAM_STR);

            if($sql->execute() == 3)
            {
                return "Ação alterado com sucesso!";
            }
            $this->conn = null;
        }
        catch(PDOException $exc)
        {
            echo "Erro ao executar Ação " . $exc->getMessage();
        }
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

    function listar()
    {
        try {
            $this->conn = new conectar();
            $sql = $this->conn->prepare("select * from ong order by ID_ong");
            $sql -> execute();
            return $sql->fetchAll();
            $this->conn = null;
        }
        catch (PDOException $exc) {
            echo "Erro ao a Produto: " . $exc -> getMessage();
        }
    }

    public function salvar()
    {
        try {
            $this->conn = new conectar();
            // Especifica as colunas que serão preenchidas
            $sql = $this->conn->prepare("INSERT INTO ong (nome, email, CNPJ, endereco, telefone, senha) VALUES (?, ?, ?, ?, ?, ?)");
    
            $sql->bindParam(1, $this->nome, PDO::PARAM_STR);
            $sql->bindParam(2, $this->email, PDO::PARAM_STR);
            $sql->bindParam(3, $this->CNPJ, PDO::PARAM_STR);
            $sql->bindParam(4, $this->endereco, PDO::PARAM_STR);
            $sql->bindParam(5, $this->telefone, PDO::PARAM_STR);
            $sql->bindParam(6, $this->senha, PDO::PARAM_STR);
    
            if ($sql->execute()) {
                return "Ong cadastrado com sucesso!";
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            // Mensagem mais clara para depuração
            return "Erro ao cadastrar Ong: " . $exc->getMessage();
        }
    }

    function exclusao(){
        try {
            $this->conn = new conectar();
            $sql = $this->conn->prepare("delete from ong WHERE ID_ong = ?");
            $ID_ong = $this->getIDOng();
            @$sql -> bindParam(1, $ID_ong, PDO::PARAM_STR);
            if($sql->execute() == 1){
                return "Ação excluida com sucesso!";
            }
            else{
                return "Erro ao excluir Ação: ";
            }
            $this -> conn = null;
        }
        catch (PDOException $exc) {
            echo "Erro ao excluir Ação: " . $exc -> getMessage();
        }
    }

    function consultar()
    {
        try {
            $this->conn = new conectar();
            $sql = $this->conn->prepare("select * from ong where nome like ?");
            $nome = $this->getNome();
            @$sql -> bindParam(1, $nome, PDO::PARAM_STR);
            $sql -> execute();
            return $sql->fetchAll();
            $this->conn = null;

        }
        catch (PDOException $exc) {
            echo "Erro ao consultar Ação: " . $exc -> getMessage();
        }
    }


}
?>
