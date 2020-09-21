<?php
    class Cd{
        private $id_cd;
        private $nome;
        private $artista;
        private $ano_lancamento;
        private $genero;
        private $duracao;

        public function getId(){
            return $this->id_cd;
        }
        public function setId($i){
            $this->id_cd = $i;
        }

        public function getNome(){
            return $this->nome;
        }
        public function setNome($n){
            $this->nome = $n;
        }

        public function getArtista(){
            return $this->artista;
        }
        public function setArtista($art){
            $this->artista = $art;
        }

        public function getAnoLancamento(){
            return $this->ano_lancamento;
        }
        public function setAnoLancamento($a){
            $this->ano_lancamento = $a;
        }

        public function getGenero(){
            return $this->genero;
        }
        public function setGenero($g){
            $this->genero = $g;
        }

        public function getDuracao(){
            return $this->duracao;
        }
        public function setDuracao($d){
            $this->duracao = $d;
        }
    }

    interface CdDao{
        public function add(Cd $cd);
        public function findById($id);
        public function findAll();
        public function delete($id);
        public function update(Cd $cd);
    }
?>