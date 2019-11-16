<?php
	ob_start();
	session_start();
	require_once("controller/usuario.controller.php");
	if(isset($_GET['exit'])){
		unset($_SESSION['usuarioLogado']);
		unset($_SESSION['emailLogado']);
		unset($_SESSION['idLogado']);
		header('location:index.php');
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <nav>
            <div class="nav-wrapper black">
            <a href="index.php" class="brand-logo">Logo</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
            <?php
				if(isset($_SESSION['usuarioLogado'])){
					echo '<li>Usuário: '.$_SESSION['usuarioLogado'].'</li>';
					echo '<li><a href="index.php?link=2">Área Restrita</a></li>';
					echo '<li><a href="?sair.php">Sair</a></li>';
				
				}else{
          echo '<li><a class="btn white black-text" href="index.php?link=4">Entrar</a></li>';
          echo '<li><a  href="index.php?link=4">Cadastre-se</a></li>';
        }
			  ?>
            </ul>
            </div>
        </nav>
        <ul class="sidenav" id="mobile-demo">
            <?php
                if(isset($_SESSION['usuarioLogado'])){
                    echo '<li>Usuário: '.$_SESSION['usuarioLogado'].'</li>';
                    echo '<li><a href="index.php?link=2">Área Restrita</a></li>';
                    echo '<li><a href="?sair.php">Sair</a></li>';
                }else{
                    echo '<li><a href="index.php?link=4">Login</a></li>';
                }
            ?>
        </ul>
        <div class="container">
		<?php
			$page= @$_GET['page'];
			$pag['content'] = 'conteudo.php';
			$pag['area'] = 'area_restrita.php';
			$pag['cadastro'] = 'form_cad_usuario.php';
			$pag['login'] = 'form_login.php';
    
      if(!empty($page) && file_exists($pag[$page])){
				
					include $pag[$page];
      
			}else{
				trim (include "conteudo.php");
      
    }
		
        ?>
         </div>
        <footer class="page-footer black">
          <div class="footer-copyright">
            <div class="container">
                Desenvolvido por Maxwell Fernandes © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">Mais Links</a>
            </div>
          </div>
        </footer>  
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>
    //init sidenav bar
        $(document).ready(function(){
            M.AutoInit();
        });
    </script>
   </body>
</html>
