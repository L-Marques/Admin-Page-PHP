<?php
include_once '../View/Header.View.php';
include_once '../BL/Category.BL.php';

if (!isset($msg)) {
    $msg = false;
}

$Id = filter_input(INPUT_GET, 'Id');

if(!isset($Id)){
    $Id = $IdCategory;
}

$objSelect = new CategoryBL();
$objCategory = $objSelect->selectUnique($Id);
 
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
                <h2>Editar Categoria</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="../BL/CategoryController.BL.php?action=Update">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Nome">Nome da categoria <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="Nome" name="Name" value="<?php echo $objCategory->getName(); ?>" required="required" class="form-control col-md-7 col-xs-12">
                            <input type="hidden" name="Id" value="<?php echo $objCategory->getId();?>">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-3 col-xs-12 col-md-offset-3">
                            <a href="../View/SelectCategory.View.php"><button class="btn btn-primary" type="button">Cancelar</button></a>
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

