<?php
    include_once '../View/Header.View.php';
    if(!isset($msg)){
        $msg = FALSE;
    }
?>
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

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><a href="../View/SelectUser.View.php"><button data-toggle="tooltip" type="button" class="btn btn-primary" title="Visualizar usuários cadastrados"><i class="fa fa-list"></i></button></a>Adicionar Usuário</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="formExemplo" data-toggle="validator" role="form" class="form-horizontal form-label-left" method="POST" action="../BL/UserController.BL.php?action=Insert">
                    <div class="form-group">
                        <label for="textNome" class="control-label col-md-3 col-sm-3 col-xs-12">Nome <span>*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="textNome" name="First_Name" class="form-control col-md-7 col-xs-12" placeholder="Digite seu Nome..." type="text" required>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="textSobrenome" class="control-label col-md-3 col-sm-3 col-xs-12">Sobrenome <span>*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="textSobrenome" name="Last_Name" class="form-control col-md-7 col-xs-12" placeholder="Digite seu sobrenome..." type="text" required>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span>*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="inputEmail" name="Email" class="form-control col-md-7 col-xs-12" placeholder="Digite seu E-mail" type="email"
                               data-error="Por favor, informe um e-mail correto." required>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="senha" class="control-label col-md-3 col-sm-3 col-xs-12">Senha <span>*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" class="form-control col-md-7 col-xs-12" id="senhaForm" placeholder="Digite sua Senha..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputConfirm" class="control-label col-md-3 col-sm-3 col-xs-12">Confirme a Senha <span>*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" name="Password" class="form-control col-md-7 col-xs-12" id="inputConfirm" placeholder="Confirme sua Senha..."
                               data-match="#senhaForm" data-match-error="Atenção! As senhas não estão iguais." required>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gênero <span>*</span></label>
                        <div class="checkbox col-md-6 col-sm-6 col-xs-12">
                            <p>M. <input type="radio" name="Gender" class="flat"  id="genderM" value="m" required />&nbsp;&nbsp;
                                F. <input type="radio" name="Gender" class="flat"  id="genderF" value="f" />
                            </p>
                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dataNasc" class="control-label col-md-3 col-sm-3 col-xs-12">Data de Nascimento <span>*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="dataNasc" name="Birthdate" class="form-control col-md-7 col-xs-12" type="date" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Administrador <span>*</span></label>
                        <div class="checkbox col-md-6 col-sm-6 col-xs-12">
                            <p>Sim. <input type="radio" name="Admin" class="flat"  id="genderM" value="1" />&nbsp;&nbsp;
                                Não. <input type="radio" name="Admin" class="flat"  id="genderF" value="0" checked="" required />
                            </p>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-3 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="reset">Reiniciar</button>
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
            
<?php
    include_once '../View/Footer.View.php';
