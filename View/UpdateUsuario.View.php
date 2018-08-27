<?php
include_once '../View/Header.View.php';
include_once '../BL/SelectUsuario.BL.php';

if(!isset($msg)){
    $msg = FALSE;
}

$Id = $_SESSION["Id"];

if(!isset($Id)){
    $Id = $IdUsuario;
}

$objSelect = new SelectUsuarioBL();
$objUsuario = $objSelect->selectUnico($Id);

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
                <h2>Editar perfil</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="formExemplo" data-toggle="validator" role="form" class="form-horizontal form-label-left" method="POST" action="../BL/Usuario.BL.php?action=Update">
                    <div class="form-group">
                        <label for="textNome" class="control-label col-md-3 col-sm-3 col-xs-12">Nome de Usuário <span>*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="textNome" name="Nome" class="form-control col-md-7 col-xs-12" placeholder="Digite seu Nome..." value="<?php echo $objUsuario->getNome();?>" type="text" required>
                            <input type="hidden" name="Id" value="<?php echo $objUsuario->getId();?>">
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span>*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="inputEmail" name="Email" class="form-control col-md-7 col-xs-12" placeholder="Digite seu E-mail" value="<?php echo $objUsuario->getEmail();?>" type="email"
                               data-error="Por favor, informe um e-mail correto." required>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="senha" class="control-label col-md-3 col-sm-3 col-xs-12">Senha <span>*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" class="form-control col-md-7 col-xs-12" id="senhaForm" placeholder="Digite sua Senha..."  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputConfirm" class="control-label col-md-3 col-sm-3 col-xs-12">Confirme a Senha <span>*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" name="Senha" class="form-control col-md-7 col-xs-12" id="inputConfirm" placeholder="Confirme sua Senha..."
                               data-match="#senhaForm" data-match-error="Atenção! As senhas não estão iguais." required>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gênero <span>*</span></label>
                        <div class="checkbox col-md-6 col-sm-6 col-xs-12">
                        <?php
                            $m = '';
                            $f = '';

                            if($objUsuario->getGenero() == 'm') {
                                $m = 'checked=""';
                            } else {
                                $f = 'checked=""';
                            }

                        ?>
                            <p>M. <input type="radio" name="Genero" class="flat"  id="genderM" value="m" <?php echo $m; ?> required />&nbsp;&nbsp;
                                F. <input type="radio" name="Genero" class="flat"  id="genderF" value="f" <?php echo $f; ?> />
                            </p>
                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dataNasc" class="control-label col-md-3 col-sm-3 col-xs-12">Data de Nascimento <span>*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="dataNasc" name="DtNasc" class="form-control col-md-7 col-xs-12" type="date" value="<?php echo $objUsuario->getDtNasc();?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Administrador <span>*</span></label>
                        <div class="checkbox col-md-6 col-sm-6 col-xs-12">
                            <p>Sim. <input type="radio" name="Administrador" class="flat"  id="genderM" value="1" checked=""  />&nbsp;&nbsp;
                                Não. <input type="radio" name="Administrador" class="flat"  id="genderF" value="0" required />
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

