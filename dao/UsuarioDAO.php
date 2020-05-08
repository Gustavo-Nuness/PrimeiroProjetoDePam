

<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

class UsuarioDAO
{

    public function cadastrar($usuario)
    {

        $conn = Connection::getConnection();
        $sql = "INSERT INTO tbUsuario(nomeUsuario,emailUsuario,senhaUsuario,
            idNivel) values(?,?,?,?)";
        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $usuario->getNomeUsuario());
        $pstm->bindValue(2, $usuario->getEmailUsuario());
        $pstm->bindValue(3, $usuario->getSenhaUsuario());
        $pstm->bindValue(4, $usuario->getNivelAcessoUsuario()->getIdNivelAcesso());

        $pstm->execute();
    }


    public function consultar($usuario)
    {

        $conn = Connection::getConnection();

        $sql = "SELECT idUsuario, nomeUsuario, emailUsuario, senhaUsuario,
            descricaoNivel FROM tbusuario
            INNER JOIN tbnivelacesso
            ON tbusuario.idNivel = tbnivelacesso.idNivel
            WHERE nomeUsuario LIKE ?";

        $pstm = $conn->prepare($sql);
        $pstm->bindValue(1, $usuario->getNomeUsuario() . "%");
        $pstm->execute();
        return  $pstm->fetchAll();
    }

    public function consultarById($id)
    {


        $conn = Connection::getConnection();

        $sql = "SELECT idUsuario, nomeUsuario, emailUsuario, senhaUsuario,
            descricaoNivel, tbusuario.idNivel FROM tbusuario
            INNER JOIN tbnivelacesso
            ON tbusuario.idNivel = tbnivelacesso.idNivel
            WHERE idUsuario = ?";

        $pstm = $conn->prepare($sql);
        $pstm->bindValue(1, $id);
        $pstm->execute();
        return  $pstm->fetchAll();
    }

    public function getAll()
    {

        $conn = Connection::getConnection();

        $sql = "SELECT idUsuario, nomeUsuario, emailUsuario, senhaUsuario,
            descricaoNivel FROM tbusuario
            INNER JOIN tbnivelacesso
            ON tbusuario.idNivel = tbnivelacesso.idNivel
            ";

        $pstm = $conn->prepare($sql);
        $pstm->execute();

        return  $pstm->fetchAll();
    }

    public function getIdByEmail($email)
    {

        $conn =  Connection::getConnection();

        $sql = "SELECT idUsuario FROM tbUsuario WHERE emailUsuario = ?";

        $pstm = $conn->prepare($sql);
        $pstm->bindValue(1, $email);

        $pstm->execute();
        return $pstm->fetchAll();
    }

    public function isValidEmail($email)
    {

        $conn = Connection::getConnection();

        $sql = "SELECT emailUsuario FROM tbusuario WHERE emailUsuario = ?";

        $pstm = $conn->prepare($sql);
        $pstm->bindValue(1, $email);

        $pstm->execute();

        if ($pstm->rowCount() == 0) {

            return True;
        } else {

            return False;
        }
    }

    public function editar($usuario)
    {

        $conn = Connection::getConnection();
        $sql = "UPDATE tbusuario SET nomeUsuario = ?, emailUsuario = ?,
        senhaUsuario = ?, idNivel = ? WHERE idUsuario = ?";

        $conn = $conn->prepare($sql);

        $conn->bindValue(1, $usuario->getNomeUsuario());
        $conn->bindValue(2, $usuario->getEmailUsuario());
        $conn->bindValue(3, $usuario->getSenhaUsuario());
        $conn->bindValue(4, $usuario->getNivelAcessoUsuario()->getIdNivelAcesso());
        $conn->bindValue(5, $usuario->getIdUsuario());


        ($conn->execute()) ? True : False;
    }


    public function isValidEmailForEdit($usuario){
        $conn = Connection::getConnection();

        $sql = "SELECT emailUsuario, idUsuario FROM tbusuario 
                WHERE (emailUsuario = ? AND idUsuario = ? ) OR (emailUsuario = ?)";

        $pstm = $conn->prepare($sql);

        $pstm->bindValue(1, $usuario->getEmailUsuario());
        $pstm->bindValue(2, $usuario->getIdUsuario());
        $pstm->bindValue(3, $usuario->getEmailUsuario());

        $pstm->execute();

        if ($pstm->rowCount() === 0) {

            return true;

        } else {

            $result = $pstm->fetchAll();
            $idRetornado = 0;


            if ( count($result) > 0)  {

                foreach ($result as  $r) {

                    $idRetornado = $r['idUsuario'];
    
                }
    
                if ( (int) $idRetornado === (int) $usuario->getIdUsuario() ){
    
                    return true;
                }
                else {
    
                    return false;
                }
    
            }
            else {

                return true;
            }

                     
        }
    }
}

?>

