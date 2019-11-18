<?php
session_start();


if(isset ($_SESSION['idLogado']) == true){
    $id = $_SESSION['idLogado'];
    echo 'opa';
}else{

}
?>