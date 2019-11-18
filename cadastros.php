<?php
if(isset ($_SESSION['idLogado']) == true){
	  $id = $_SESSION['idLogado'];
      $acao = 'recuperar';
      require('controller/usuario.controller.php');
      

?>
<div class="row">
    <div class="col s12 m8 l8 offset-m2 offset-l2">
        <div class="card-panel">
            <h4 class="center-align ">Cadastros<a href="?page=cadastrar"><i class="material-icons black-text small right" >add_circle</i></a></h4><hr/>
                <div class="row">
                
                    <div class="col l8 black white-text">Nome</div>
                    <div class="col l2 black  white-text">Alterar</div>
                    <div class="col l2 black white-text">Excluir</div>
                    <?php 
                    foreach($usuario as $indice => $usuario){ 
                     if($usuario->id == $id){
                    echo '<div class="col l8 ">'.$usuario->nome.'</div>';
                    echo '<div class="col l2"><a href="index.php?page=cadastrar&metodo=alterar&id='.$usuario->id.';"><i class="material-icons red-text accent-4" >create</i></a></div>';
                    echo '<div class="col l2"><a href="index.php?page=cadastrar&metodo=excluirid&id='.$usuario->id.';"><i class="material-icons cyan-text accent-3" >delete_forever</i></a></div>';
                  
                    }else{
                     ?>
                    <div class="col l8 "><?= $usuario->nome;?></div>
                    <div class="col l2 "><a href="index.php?page=cadastrar&metodo=alterar&id=<?= $usuario->id;?>"><i class="material-icons" >create</i></a></div>
                    <div class="col l2 "><a href="index.php?page=cadastrar&metodo=excluir&id=<?= $usuario->id;?>"><i class="material-icons" >delete_forever</i></a></div>
                    <?php } 
                    }
                }else{
                    echo 'Sem permissão para acessar essa página. Redirecionando para a página de login...';
                    echo '<meta http-equiv="refresh" content="3;url=index.php?page=login">';
                }    
                   

                     ?>
                </div>
        </div>
    </div>
</div>