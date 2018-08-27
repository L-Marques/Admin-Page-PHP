<?php
session_start();

$login = $_SESSION["Login"];
$adm = $_SESSION["Administrador"];

if ($login) {
    if (!$adm) {
      session_destroy();
      header("location:../View/Login.View.php");
    }
} else {
    session_destroy();
    header("location:../View/Login.View.php");
}

$nome = explode(" ", $_SESSION["Nome"]);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Painel de Controle | Administrador</title>

    <link href="../View/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../View/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../View/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="../View/css/bundle.min.css" rel="stylesheet">
    <!-- icone -->
    <link rel="icon" href="../View/images/icon.ico" type="image/x-icon" />
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title">
                <a href="../View/Home.View.php" class="site_title"><span>&nbsp; Painel de controle</span></a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../View/images/img.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <?php
                  $genero = $_SESSION["Genero"];
                  if ($genero == "f") {
                      echo "<span>Bem vinda ,</span>";
                  } else {
                      echo "<span>Bem vindo ,</span>";
                  }
                ?>
                <h2><?php 
                $n1 = $nome[0];
                if (!isset($nome[1])) {
                    $n2 = '';
                } else {
                    $n2 = $nome[1];
                }
                
                echo $n1." ".$n2; 
                
                ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Geral</h3>
                <ul class="nav side-menu">
                  <li><a href="../View/Home.View.php"><i class="fa fa-home"></i> Página inicial </a>
                  </li>
                  <li><a><i class="fa fa-laptop"></i> Produtos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../View/SelectProduct.View.php">Visualizar produtos</a></li>
                      <li><a href="../View/InsertProduct.View.php">Adicionar produtos</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-reorder"></i> Categorias <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../View/SelectCategory.View.php">Visualizar categorias</a></li>
                      <li><a href="../View/InsertCategory.View.php">Adicionar categorias</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Usuários <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../View/SelectUser.View.php">Visualizar usuários</a></li>
                      <li><a href="../View/InsertUser.View.php">Adicionar usuários</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-image"></i> Imagens <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../View/SelectImage.View.php">Visualizar imagens</a></li>
                      <li><a href="../View/SelecionarProdutoImagem.View.php">Adicionar imagens</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-comment-o"></i> Comentários <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../View/SelectComment.View.php">Visualizar comentários</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Configuração">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Tela Cheia" onclick="toggleFullScreen()">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Perfil" href="../View/PerfilUsuario.View.php">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="../View/Login.View.php?logout=true">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../View/images/img.png" alt=""><?php echo $nome[0]; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="../View/PerfilUsuario.View.php"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Configurações</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ajuda</a></li>
                    <li><a href="../View/Login.View.php"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="../View/images/img.png" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo $nome[0]." ".$nome[1]; ?></span>
                          <span class="time">3 min atrás</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="../View/images/img.png" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo $nome[0]." ".$nome[1]; ?></span>
                          <span class="time">3 min atrás</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="../View/images/img.png" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo $nome[0]." ".$nome[1]; ?></span>
                          <span class="time">3 min atrás</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="../View/images/img.png" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo $nome[0]." ".$nome[1]; ?></span>
                          <span class="time">5 min atrás</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>Ver todas as notificações</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        
        <div class="right_col" role="main">