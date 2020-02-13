<?php


   class Usuario {

        private $idUsuario;
        private $nomeUsuario;
        private $emailUsuario;
        private $senhaUsuario;
        private $nivelAcessoUsuario;
        


        /**
         * Get the value of idUsuario
         */ 
        public function getIdUsuario()
        {
                return $this->idUsuario;
        }

        /**
         * Set the value of idUsuario
         *
         * @return  self
         */ 
        public function setIdUsuario($idUsuario)
        {
                $this->idUsuario = $idUsuario;

        }

        /**
         * Get the value of nomeUsuario
         */ 
        public function getNomeUsuario()
        {
                return $this->nomeUsuario;
        }

        /**
         * Set the value of nomeUsuario
         *
         * @return  self
         */ 
        public function setNomeUsuario($nomeUsuario)
        {
                $this->nomeUsuario = $nomeUsuario;

        }

        /**
         * Get the value of emailUsuario
         */ 
        public function getEmailUsuario()
        {
                return $this->emailUsuario;
        }

        /**
         * Set the value of emailUsuario
         *
         * @return  self
         */ 
        public function setEmailUsuario($emailUsuario)
        {
                $this->emailUsuario = $emailUsuario;
        }

        /**
         * Get the value of senhaUsuario
         */ 
        public function getSenhaUsuario()
        {
                return $this->senhaUsuario;
        }

        /**
         * Set the value of senhaUsuario
         *
         * @return  self
         */ 
        public function setSenhaUsuario($senhaUsuario)
        {
                $this->senhaUsuario = $senhaUsuario;
        }

        /**
         * Get the value of nivelAcessoUsuario
         */ 
        public function getNivelAcessoUsuario()
        {
                return $this->nivelAcessoUsuario;
        }

        /**
         * Set the value of nivelAcessoUsuario
         *
         * @return  self
         */ 
        public function setNivelAcessoUsuario($nivelAcessoUsuario)
        {
                $this->nivelAcessoUsuario = $nivelAcessoUsuario;

        }
    }
