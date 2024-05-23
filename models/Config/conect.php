<?php
class ConexaoPDO {
    private $hostname;
    private $username;
    private $password;
    private $database;

    public function __construct($hostname = 'localhost:3306', $username = 'root', $password = '', $database = 'Cadastro') {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function conectar() {
        try {
            $pdo = new PDO("mysql:host=$this->hostname;dbname=$this->database", $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(PDOException $e) {
            // Em vez de apenas imprimir, você pode lançar uma exceção aqui
            echo "Erro na conexão: " . $e->getMessage();
            return null;
        }
    }
}


    $conexao = new ConexaoPDO();
    $pdo = $conexao->conectar();

    if ($pdo) {
        echo "Conexão bem-sucedida!";
        
        
    } else {
        ;
    }

?>
