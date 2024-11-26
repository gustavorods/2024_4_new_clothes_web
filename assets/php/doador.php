<?php
//
include_once 'conectar.php';


class Doador{
    private $ID_doador;
    private $nome;
    private $email;
    private $CPF;
    private $senha;
    private $conn;


    public function getIDDoador()
    {
        return $this->ID_doador;
    }

    public function setIDDoador($ID_doador)
    {
        $this->ID_doador = $ID_doador;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setnome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getCPF()
    {
        return $this->CPF;
    }

    public function setCPF($CPF)
    {
        $this->CPF = $CPF;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }


    function listar()
    {
        try {
            $this->conn = new conectar();
            $sql = $this->conn->prepare("select * from doador order by ID_doador");
            $sql -> execute();
            return $sql->fetchAll();
            $this->conn = null;
        }
        catch (PDOException $exc) {
            echo "Erro ao excluir Produto: " . $exc -> getMessage();
        }
    }

    public function salvar()
    {
        try {
            $this->conn = new conectar();
            $sql = $this->conn->prepare("insert into livro values (null,?,?,?,?)");


            $nome = $this->getNome();
            @$sql -> bindParam(2, $nome, PDO::PARAM_STR);

            $email = $this->getEmail();
            @$sql -> bindParam(3, $email, PDO::PARAM_STR);

            $CPF = $this->getCPF();
            @$sql -> bindParam(4, $CPF, PDO::PARAM_STR);

            if ($sql->execute() == 1) {
                return "Ação realizada com sucesso!";
            }
            $this -> conn = null;
        }
        catch (PDOException $exc) {
            echo "Erro ao realizar ação: " . $exc -> getMessage();
        }
    }

    function exclusao(){
        try {
            $this->conn = new conectar();
            $sql = $this->conn->prepare("delete from doador WHERE ID_doador = ?");
            $ID_doador = $this->getIDDoador();
            @$sql -> bindParam(1, $ID_doador, PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("select * from doador where nome like ?");
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

    function alterar()
    {
        try
        {
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("Select * from doador where ID_doador = ?");
            @$sql-> bindParam(1, $this->getIDDoador(), PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("update livro set nome = ?, email = ?, cpf = ? where ID_doador = ?");
            @$sql-> bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getEmail(), PDO::PARAM_STR);
            @$sql-> bindParam(3, $this->getCPF(), PDO::PARAM_STR);

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

    function logar()
{
    try {
        $this-> conn = new conectar();
        $sql = $this->conn->prepare("SELECT * FROM doador WHERE email LIKE = ? AND senha = ?");
        @$sql-> bindParam(1,$this->getEmail(), PDO::PARAM_STR);
        @$sql-> bindParam(2,$this->getSenha(), PDO::PARAM_STR);
        $sql->execute();
        return $sql->fetchAll();
        $this->conn = null;
    }
    catch (PDOException $exc) {
        echo "Erro ao logar: " . $exc->getMessage();
    }
}

}



?>

