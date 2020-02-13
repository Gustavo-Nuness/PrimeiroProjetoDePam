<?php
    session_start();
    
    $_SESSION['login'] = $_POST['loginTxt'];
    
    $_SESSION['senha'] = $_POST['senhaTxt'];

    if($_SESSION['login'] == 'admin' && $_SESSION['senha'] == '1234'){
        $_SESSION['logado'] = true;
        header("location: ../usuario.php");
    }else{
        header("location: ../index.php");
        $_SESSION['logado'] = false;

    }
    
?>