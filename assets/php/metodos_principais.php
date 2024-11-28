<?php
include_once 'conectar.php';

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

    public function readOngs() {
        $query = "SELECT ID_ong, nome, email, CNPJ, endereco, telefone FROM ong";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function getOngIdByName($nomeOng) {
        // Definir a query para buscar o ID da ONG pelo nome
        $query = "SELECT ID_ong FROM ong WHERE nome = :nomeOng";
    
        // Preparar a query
        $stmt = $this->conn->prepare($query);
    
        // Vincular o parâmetro :nomeOng ao valor da variável $nomeOng
        $stmt->bindParam(':nomeOng', $nomeOng, PDO::PARAM_STR);
    
        // Executar a query
        $stmt->execute();
    
        // Verificar se algum resultado foi encontrado
        if ($stmt->rowCount() > 0) {
            // Retornar o ID da ONG
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['ID_ong'];
        } else {
            // Caso a ONG não seja encontrada, retornar null ou algum valor indicativo
            return null;
        }
    }

    public function criarDoacao($dataDoacao, $ID_doador, $ID_ong) {
        // Definir a query para inserir a doação
        $query = "INSERT INTO doacao (dataDoacao, ID_doador, ID_ong) VALUES (:dataDoacao, :ID_doador, :ID_ong)";
    
        // Preparar a query
        $stmt = $this->conn->prepare($query);
    
        // Vincular os parâmetros aos valores
        $stmt->bindParam(':dataDoacao', $dataDoacao, PDO::PARAM_STR);
        $stmt->bindParam(':ID_doador', $ID_doador, PDO::PARAM_INT);
        $stmt->bindParam(':ID_ong', $ID_ong, PDO::PARAM_INT);
    
        // Executar a query
        $stmt->execute();
    
        // Retornar o ID da doação (ou um outro valor, conforme necessário)
        if ($stmt->rowCount() > 0) {
            return true;  // Sucesso
        } else {
            return false; // Falha
        }
    }
    
    public function obterUltimaDoacao($ID_doador) {
        // Definir a query para selecionar o ID da doação mais recente
        $query = "SELECT ID_doacao FROM doacao WHERE ID_doador = :ID_doador ORDER BY dataDoacao DESC LIMIT 1";
        
        // Preparar a query
        $stmt = $this->conn->prepare($query);
        
        // Vincular o parâmetro ao valor
        $stmt->bindParam(':ID_doador', $ID_doador, PDO::PARAM_INT);
        
        // Executar a query
        $stmt->execute();
        
        // Verificar se algum resultado foi encontrado
        if ($stmt->rowCount() > 0) {
            // Retornar o ID da doação mais recente
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['ID_doacao'];
        } else {
            return null;  // Nenhuma doação encontrada para esse doador
        }
    }
    
    public function readTamanhos() {
        $query = "SELECT ID_tamanho, descricao FROM tamanho";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function getTamanhoIdByName($descricao) {
        // Definir a query para buscar o ID do tamanho pela descricao
        $query = "SELECT ID_tamanho FROM tamanho WHERE descricao = :descricao";
    
        // Preparar a query
        $stmt = $this->conn->prepare($query);
    
        // Vincular o parâmetro :descricao ao valor da variável $descricao
        $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
    
        // Executar a query
        $stmt->execute();
    
        // Verificar se algum resultado foi encontrado
        if ($stmt->rowCount() > 0) {
            // Retornar o ID da ONG
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['ID_tamanho'];
        } else {
            // Caso o tamanho não seja encontrada, retornar null ou algum valor indicativo
            return null;
        }
    }

    public function readCategoria() {
        $query = "SELECT cod_Categoria, nome FROM categoria";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function getCategoriaIdByName($nome) {
        // Definir a query para buscar o ID da categoria pelo nome
        $query = "SELECT cod_Categoria FROM categoria WHERE nome = :nome";
    
        // Preparar a query
        $stmt = $this->conn->prepare($query);
    
        // Vincular o parâmetro :nome ao valor da variável $nome
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    
        // Executar a query
        $stmt->execute();
    
        // Verificar se algum resultado foi encontrado
        if ($stmt->rowCount() > 0) {
            // Retornar o ID da ONG
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['cod_Categoria'];
        } else {
            // Caso a categoria não seja encontrada, retornar null ou algum valor indicativo
            return null;
        }
    }
    
    public function obterItemDaDoacao($ID_doacao) {
        $query = "SELECT ID_item, qtd, cod_categoria, ID_tamanho FROM itemdoacao WHERE ID_doacao = :ID_doacao";
        
        // Preparar a query
        $stmt = $this->conn->prepare($query);
        
        // Vincular o parâmetro ao valor
        $stmt->bindParam(':ID_doacao', $ID_doacao, PDO::PARAM_INT);
        
        // Executar a query
        $stmt->execute();
        
        // Verificar se algum resultado foi encontrado
        if ($stmt->rowCount() > 0) {
            // Retornar o ID da doação mais recente
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;  // Nenhuma doação encontrada para esse doador
        }
    }

    // Retorna o ID a partir do email e senha
    public function getIdByEmailAndPasswordONG($email, $senha) {
        $query = "SELECT ID_ong FROM ong WHERE email = :email AND senha = :senha";

        // Prepara a query
        $stmt = $this->conn->prepare($query);

        // Faz o bind dos parâmetros
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);

        // Executa a query
        $stmt->execute();

        // Recupera o ID se existir
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['ID_ong']; // Retorna o ID encontrado
        } else {
            return null; // Retorna null caso não encontre
        }
    }

    // Retorna todos os dados da ONG pelo ID
    public function getDataByIdONG($id) {
        $query = "SELECT ID_ong, nome, email, CNPJ, endereco, telefone, senha FROM ong WHERE ID_ong = :id";

        // Prepara a query
        $stmt = $this->conn->prepare($query);

        // Faz o bind do parâmetro
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Executa a query
        $stmt->execute();

        // Recupera os dados
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Retorna os dados como um array associativo
            return $result;
        } else {
            return null; // Retorna null caso o ID não exista
        }
    }

    public function obterDoacoesPorOng($ID_ong) {
        // Definir a query para selecionar todas as doações relacionadas à ONG
        $query = "SELECT * FROM doacao WHERE ID_ong = :ID_ong";
        
        // Preparar a query
        $stmt = $this->conn->prepare($query);
        
        // Vincular o parâmetro ao valor
        $stmt->bindParam(':ID_ong', $ID_ong, PDO::PARAM_INT);
        
        // Executar a query
        $stmt->execute();
        
        // Verificar se algum resultado foi encontrado
        if ($stmt->rowCount() > 0) {
            // Retornar todas as doações como um array
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return []; // Retornar um array vazio se nenhuma doação foi encontrada
        }
    }
    
    public function excluirDoacao($ID_doacao) {
        // Definir a query para excluir a doação
        $query = "DELETE FROM doacao WHERE ID_doacao = :ID_doacao";
    
        // Preparar a query
        $stmt = $this->conn->prepare($query);
    
        // Vincular o parâmetro ao valor
        $stmt->bindParam(':ID_doacao', $ID_doacao, PDO::PARAM_INT);
    
        // Tentar executar a query
        try {
            $stmt->execute();
    
            // Verificar se alguma linha foi afetada
            if ($stmt->rowCount() > 0) {
                return "Doação com ID $ID_doacao foi excluída com sucesso.";
            } else {
                return "Nenhuma doação encontrada com ID $ID_doacao.";
            }
        } catch (PDOException $e) {
            // Retornar mensagem de erro em caso de falha
            return "Erro ao excluir a doação: " . $e->getMessage();
        }
    }

    public function verificarDoacaoExistente($ID_doacao) {
        // Definir a query para verificar a doação
        $query = "SELECT 1 FROM doacao WHERE ID_doacao = :ID_doacao LIMIT 1";
    
        // Preparar a query
        $stmt = $this->conn->prepare($query);
    
        // Vincular o parâmetro ao valor
        $stmt->bindParam(':ID_doacao', $ID_doacao, PDO::PARAM_INT);
    
        // Tentar executar a query
        try {
            $stmt->execute();
    
            // Verificar se algum resultado foi retornado
            if ($stmt->rowCount() > 0) {
                return true;  // Doação existe
            } else {
                return false; // Doação não encontrada
            }
        } catch (PDOException $e) {
            // Em caso de erro, lançar exceção
            throw new Exception("Erro ao verificar a doação: " . $e->getMessage());
        }
    }
    
    public function alterarDataDoacao($ID_doacao, $dataDoacao) {
        // Definir a query para atualizar o campo dataDoacao
        $query = "UPDATE doacao SET dataDoacao = :dataDoacao WHERE ID_doacao = :ID_doacao";
    
        // Preparar a query
        $stmt = $this->conn->prepare($query);
    
        // Vincular os parâmetros ao valor
        $stmt->bindParam(':ID_doacao', $ID_doacao, PDO::PARAM_INT);
        $stmt->bindParam(':dataDoacao', $dataDoacao, PDO::PARAM_STR);
    
        // Tentar executar a query
        try {
            $stmt->execute();
    
            // Verificar se alguma linha foi afetada
            if ($stmt->rowCount() > 0) {
                return "Data da doação com ID $ID_doacao foi atualizada com sucesso.";
            } else {
                return "Nenhuma doação encontrada com ID $ID_doacao ou a data já está como a fornecida.";
            }
        } catch (PDOException $e) {
            // Retornar mensagem de erro em caso de falha
            return "Erro ao atualizar a data da doação: " . $e->getMessage();
        }
    }
    
}
?>
