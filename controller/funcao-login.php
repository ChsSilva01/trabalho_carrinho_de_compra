<?php
    session_start();

    include("../model/connect.php");
    $query = mysqli_query($conexao,"SELECT * FROM login_usuario WHERE email_usuario = '".$_POST['campo_email']."' AND senha_usuario = '".$_POST['campo_senha']."'");
    $exibe = mysqli_fetch_array($query);
    if(mysqli_num_rows($query)==1){
        $_SESSION['logado'] = true;
        
        header("location:../view/home.php");
    } else {
        header("location:../view");
    }

?>