<?php

if(!isset($msg)){
    $msg = FALSE;
}

?>


<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Icon -->
        <link rel="icon" href="../View/images/icon.ico" type="image/x-icon" />

        <title>Recuperar senha</title>

        <!-- Bootstrap -->
        <link href="../View/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="../View/css/loginForm.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="row">
                        <div class="col-xs-12" id="titulo">
                            <span>E-SHOPPER - PAINEL DE CONTROLE</span>
                        </div>
                        <br><hr><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="#" class="active" id="login-form-link">Recuperar Senha</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login-form" action="login.View.php?action=recovery" method="post" role="form" style="display: block;">
                                        <div class="form-group">
                                            <input type="email" name="Email" id="username" tabindex="1" class="form-control" placeholder="Email" value="" required="" onfocus="" title="Digite seu email">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <br>
                                                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Entrar">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <?php if ($msg) : ?>
                                <div class="alert alert-info">
                                    <button  class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
                                    <strong>Info!</strong> <?php echo $msg ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script  src="../View/js/loginForm.js"></script>
    </body>
</html>