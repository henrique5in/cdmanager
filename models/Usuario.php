<?php
    class Usuario{
        private $id_user;
        private $username;
        private $password;
        private $nome;

        public function getId(){
            return $this->id_user;
        }
        public function getUsername(){
            return $this->username;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getNome(){
            return $this->nome;
        }

        public function setId($i){
            $this->id_user = $i;
        }

        public function setUsername($u){
            $this->username = $u;
        }
        public function setPassword($p){
            $this->password = $p;
        }
        public function setNome($n){
            $this->nome = ucwords(trim($n));
        }
    }

    interface UsuarioDAO{
        public function add(Usuario $usuario);
        public function findById($id);
        public function findAll();
        public function delete($id);
        public function update(Usuario $usuario);
    }
?>