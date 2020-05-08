<?php
require_once(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."global.php");

class NivelAcessoDAO{


    public function getAll(){

        $connection = Null; 
        $connection = Connection::getConnection();

        $sql ="SELECT * from tbNivelAcesso";

        $pstm = $connection->prepare($sql);
        $pstm->execute();
       
        return  $pstm->fetchAll();
       

    }

    public function getNivelAcesso($nivelAcesso){

        $conn = Connection::getConnection();
        
        $sql ="SELECT idNivel FROM tbNivelAcesso WHERE descricaoNivel LIKE ?";
        $pstm =  $conn->prepare($sql);
        $pstm->bindValue(1,$nivelAcesso);
        return $pstm->fetchAll();

    }

    public function getNivelAcessoById($id){

        $conn = Connection::getConnection();
        
        $sql ="SELECT descricaoNivel FROM tbnivelacesso WHERE idNivel
         = ?";

         $pstm = $conn->prepare($sql);
         $pstm->bindValue(1,$id);

         $pstm->execute();
         return $pstm->fetchAll();

    }

}

?>