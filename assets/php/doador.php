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

    //Verificar o ID do doador pelo email e senha
    public function getIdByEmailSenha($email, $senha) {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("SELECT ID_doador FROM doador WHERE email = ? AND senha = ?");
            $sql->bindParam(1, $email, PDO::PARAM_STR);
            $sql->bindParam(2, $senha, PDO::PARAM_STR);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);

            $this->conn = null;
            return $result ? $result['ID_doador'] : null; // Retorna o ID ou null se não encontrado
        } catch (PDOException $exc) {
            echo "Erro ao verificar ID: " . $exc->getMessage();
            return null;
        }
    }

    //Retornar todos os dados do doador com base no ID
    public function getDadosById($id) {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("SELECT * FROM doador WHERE ID_doador = ?");
            $sql->bindParam(1, $id, PDO::PARAM_INT);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);

            $this->conn = null;
            return $result ? $result : []; // Retorna os dados ou um array vazio
        } catch (PDOException $exc) {
            echo "Erro ao buscar dados: " . $exc->getMessage();
            return [];
        }
    }
    
    // Função para buscar doações pelo ID do doador
    public function getDoacoesByDoador($ID_doador) {
        try {
            $this->conn = new Conectar(); // Estabelece conexão com o banco de dados
            $sql = $this->conn->prepare("SELECT ID_doacao, dataDoacao, ID_doador, ID_ong FROM doacao WHERE ID_doador = ?");
            $sql->bindParam(1, $ID_doador, PDO::PARAM_INT); // Vincula o parâmetro à query
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC); // Obtém todos os resultados em formato associativo

            $this->conn = null; // Fecha a conexão
            return $result; // Retorna os resultados
        } catch (PDOException $exc) {
            echo "Erro ao buscar doações: " . $exc->getMessage();
            return []; // Retorna um array vazio em caso de erro
        }
    }

    // Função para buscar doações pelo ID do doador
    public function criarNovaDoacao($ID_doacao, $dataDoacao, $ID_doador, $ID_ong) {
        try {
            $this->conn = new Conectar(); // Estabelece conexão com o banco de dados
            $sql = $this->conn->prepare("INSERT INTO doacao (ID_doacao, dataDoacao, ID_doador, ID_ong) 
            VALUES (?, ?, ?, ?)");
    
            // Substitui os valores dos parâmetros
            $sql->bindValue(1, $ID_doacao);
            $sql->bindValue(2, $dataDoacao);
            $sql->bindValue(3, $ID_doador);
            $sql->bindValue(4, $ID_ong);
    
            $sql->execute(); // Executa a query
    
            $this->conn = null; // Fecha a conexão
            return "Sucesso"; // Retorna mensagem de sucesso
        } catch (PDOException $exc) {
            echo "Erro ao criar doação: " . $exc->getMessage();
            return []; // Retorna um array vazio em caso de erro
        }
    }
    
    // Função para buscar doações pelo ID do doador
    public function criarItemDoacao($qtd, $ID_doacao, $cod_categoria, $ID_tamanho) {
        try {
            $this->conn = new Conectar(); // Estabelece conexão com o banco de dados
            $sql = $this->conn->prepare("INSERT INTO itemdoacao (qtd, ID_doacao, cod_categoria, ID_tamanho) 
            VALUES (?, ?, ?, ?)");
    
            // Substitui os valores dos parâmetros
            $sql->bindValue(1, $qtd);
            $sql->bindValue(2, $ID_doacao);
            $sql->bindValue(3, $cod_categoria);
            $sql->bindValue(4, $ID_tamanho);
    
            $sql->execute(); // Executa a query
    
            $this->conn = null; // Fecha a conexão
            return "Sucesso"; // Retorna mensagem de sucesso
        } catch (PDOException $exc) {
            echo "Erro ao criar doação: " . $exc->getMessage();
            return []; // Retorna um array vazio em caso de erro
        }
    }
}
?>

