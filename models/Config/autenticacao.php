<?php

require_once('conect.php');

class Autenticacao {
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
    
    public function autenticar($cpf, $senha) {
        // Consulta SQL para verificar se o usuário e senha existem no banco de dados
        $query = "SELECT * FROM usuario WHERE CPF = :cpf AND SENHA = :senha";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        
        // Verifica se a consulta retornou alguma linha
        if ($stmt->rowCount() > 0) {
            // Usuário autenticado com sucesso
            return true;
        } else {
            // Usuário ou senha incorretos
            return false;
        }
    }
    
    public function inserir($matricula, $email, $nome, $turno, $sobreNome, $tipoUsuario,$Cpf,$senha){
        $query = "INSERT INTO usuarios (matricula, email, nome,turno,sobrenome,tipousuario,cpf,senha) 
                  VALUES ($matricula, $email, $nome,$turno,$sobreNome,$tipoUsuario,$Cpf,$senha)";

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
    }
}

?>
