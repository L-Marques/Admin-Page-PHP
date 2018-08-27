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
                <h2><a href="../View/SelectCategory.View.php"><button data-toggle="tooltip" type="button" class="btn btn-primary" title="Visualizar categorias cadastradas"><i class="fa fa-list"></i></button></a>Adicionar Categoria</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="../BL/CategoryController.BL.php?action=Insert">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome da categoria <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nome" name="Name" required="required" class="form-control col-md-7 col-xs-12">
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