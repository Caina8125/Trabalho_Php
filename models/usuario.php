<?php
    require_once '/Config/query.php';

    class Usuario {
        private $id;
        private $nome;
        private $email;
        private $cpf;
        private $ativo;

        public function __construct($nome, $cpf,$email) {
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->email = $email;
            $this->ativo = 1;
       }

        public function cadastrar(){

        }

        public function setUsuario($nome, $cpf, $email){
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->email = $email;

            $atualizarUsuario = new Query();
            $atualizarUsuario->editar($nome,$cpf,$email);
        }

        public function excluirUsuario($cpf){
            $excluirUsuario = new Query();
            $excluirUsuario->excluir($cpf);
        }



        
}
