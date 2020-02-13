<?php
require_once(__DIR__."..".DIRECTORY_SEPARATOR."global.php");

class NivelAcessoDAO{


    public function getAll(){

        $connection = Null; 
        $connection->Connection::getConnection();

        $sql ="SELECT * from tbNivelAcesso";

        $pstm = $connection->prepare($sql);
        $pstm->execute();
        return  $pstm->fetchAll();


    }

}

?>