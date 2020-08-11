<?php

    class PojoReceitas {

        private $id;
        private $classificacao;
        private $nome;
        private $ingredientes;
        private $preparo;

        public function getId() {
            return $this->id;
        }

        public function getClassificacao() {
            return $this->classificacao;
        }

        public function setClassificacao($classificacao) {
            $this->classificacao = $classificacao;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getIngredientes() {
            return $this->ingredientes;
        }

        public function setIngredientes($ingredientes) {
            $this->ingredientes = $ingredientes;
        }

        public function getPreparo() {
            return $this->preparo;            
        }

        public function setPreparo($preparo) {
            $this->preparo = $preparo;
        }
    }
?>