<?php
    if(isset($_SESSION['usuarioLogado'])){
        echo '<li>Usuário: '.$_SESSION['usuarioLogado'].'</li>';
        echo '<li><a href="index.php?link=2">Área Restrita</a></li>';
    }else{
        echo '<li><a href="index.php?link=4">Login</a></li>';
    }
?>