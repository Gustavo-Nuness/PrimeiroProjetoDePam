


<?php


class Connection
{

    public static function getConnection()
    {
        try {
            $host = "mysql:host=localhost:3306;dbname=bdprojetopam";
            $user = "root";
            $password = "";

            $conexao = new PDO($host, $user, $password);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexao->exec("SET CHARACTER SET utf8");
            return $conexao;
            
        } catch (Exception $ex) { 

            echo($ex->getMessage());
        }

    }
}

?>