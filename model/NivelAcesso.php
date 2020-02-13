


<?php

    class NivelAcesso{
        
        private $idNivelAcesso;
        private $descricaoNivelAcesso;


        /**
         * Get the value of idNivelAcesso
         */ 
        public function getIdNivelAcesso()
        {
                return $this->idNivelAcesso;
        }

        /**
         * Set the value of idNivelAcesso
         *
         * @return  self
         */ 
        public function setIdNivelAcesso($idNivelAcesso)
        {
                $this->idNivelAcesso = $idNivelAcesso;

        }

        /**
         * Get the value of descricaoNivelAcesso
         */ 
        public function getDescricaoNivelAcesso()
        {
                return $this->descricaoNivelAcesso;
        }

        /**
         * Set the value of descricaoNivelAcesso
         *
         * @return  self
         */ 
        public function setDescricaoNivelAcesso($descricaoNivelAcesso)
        {
                $this->descricaoNivelAcesso = $descricaoNivelAcesso;

        }
    }


?>