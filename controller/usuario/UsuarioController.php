<?php
    require_once(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."global.php");
    class UsuarioController
    {

        public function cadastrar($usuario)
        {
            $userDao = new UsuarioDAO();
            $userDao->cadastrar($usuario);
        }

        public function consultar($usuario){

            $userDao = new UsuarioDAO();
            return $userDao->consultar($usuario);
        }

        public function getAll(){
            $userDao = new UsuarioDAO();
            return $userDao->getAll();

        }

        public function getIdByEmail($email){

            $userDao = new UsuarioDAO();
            $result = $userDao->getIdByEmail($email);

            foreach($result as $r){

                return $r['idUsuario'];
            }

            return -1;

        }

        public function isValidEmail($email){

            $userDao = new UsuarioDAO();
            return $userDao->isValidEmail($email);
        }

        
        public function isValidEmailForEdit($usuario){

            $userDao = new UsuarioDAO();
            return $userDao->isValidEmailForEdit($usuario);
        }


        public function editar($usuario){

            $userDao= new UsuarioDAO();
            return $userDao->editar($usuario);
        }

        public function consultarById($id) {

            $userDao = new UsuarioDAO();
            return $userDao->consultarById($id);
        }
    }
?>

