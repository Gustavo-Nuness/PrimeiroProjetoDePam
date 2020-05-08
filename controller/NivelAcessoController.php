

<?php
    require_once(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."global.php");

    class NivelAcessoController{ 

        public static function  getAll(){
            $lista = new NivelAcessoDAO();
            return $lista->getAll();
        }

        public static function getNivelAcesso($nivelAcesso){
            $nivelAcessoDAO = new NivelAcessoDAO();
            return $nivelAcessoDAO->getNivelAcesso($nivelAcesso);

        }

        public static function getNivelAcessoById($id){
            
            $nivelAcessoDAO = new NivelAcessoDAO();
            return $nivelAcessoDAO->getNivelAcessoById($id);
        }
    } 

?>