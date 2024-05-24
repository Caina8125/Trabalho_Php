<?php
    require_once('conect.php');

    class Query {
        private $conexao;
        
        public function __construct() {
            $conexao = new ConexaoPDO();
            $pdo = $conexao->conectar();

            if ($pdo) {
                echo "Conexão bem-sucedida!";
                // Agora você pode usar $pdo para executar consultas SQL
                // Por exemplo: $pdo->query("SELECT * FROM tabela");
            } else {
                // Trate o caso de falha de conexão aqui, se necessário
            }
        }
        
        public function editar($nome,$cpf,$email) {
            $query = "UPDATE USUARIO SET NOME = $nome, CPF = $cpf, EMAIL = $email,
                        WHERE CPF = :cpf AND ID = :id";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
        
        public function inserir($nome,$Cpf, $email){
            $query = "INSERT INTO usuarios ( NOME,CPF,EMAIL) 
                    VALUES ($nome,$Cpf,$email)";

            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
        }

        public function excluir($cpf){
            $query = "UPDATE USUARIO SET ATIVO = 0
                        WHERE CPF = :cpf AND ID = :id";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
    } 

?>