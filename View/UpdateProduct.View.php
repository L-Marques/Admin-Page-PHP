<?php
include_once '../View/Header.View.php';
include_once '../BL/Product.BL.php';

if(!isset($msg)){
    $msg = FALSE;
}

$Id = filter_input(INPUT_GET, 'Id');

if(!isset($Id)){
    $Id = $IdProduct;
}

$objSelect = new ProductBL();
$objProduct = $objSelect->selectUnique($Id);

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
                <h2>Adicionar Produto</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="formExemplo" data-toggle="validator" role="form" class="form-horizontal form-label-left" method="POST" action="../BL/ProductController.Bl.php?action=Update">
                    <div class="form-group">
                        <label for="nome" class="control-label col-md-3 col-sm-3 col-xs-12">Nome do produto <span>*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="textNome" name="Name" class="form-control col-md-7 col-xs-12" placeholder="Digite o nome do produto..." value="<?php echo $objProduct->getName();?>" type="text" required>
                            <input type="hidden" name="Id" value="<?php echo $objProduct->getId();?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descricao" class="control-label col-md-3 col-sm-3 col-xs-12">Descrição <span>*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="inputEmail" name="Description" class="form-control col-md-7 col-xs-12"  value="<?php echo $objProduct->getDescription();?>" type="text"
                               data-error="Por favor, informe a descrição do produto" required>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="Preco" class="control-label col-md-3 col-sm-3 col-xs-12">Preço <span>*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" class="form-control col-md-7 col-xs-12" name="Price" value="<?php echo $objProduct->getPrice();?>" pattern="[0-9]+([\.,][0-9]+)?" step="0.01"
                                   placeholder="Digite o preço..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="heard" class="control-label col-md-3 col-sm-3 col-xs-12">Categoria *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="heard" name="Category_Id" class="form-control col-md-7 col-xs-12" required>
                                <option value="">Escolha..</option>
                                <?php
                                    include_once '../BL/Category.BL.php';
                                    $SelectCategory = new CategoryBL();
                                    $return = $SelectCategory ->selectObj();
                                    $category = $objProduct->getCategory_Name();
                                    foreach ($return as $obj) {
                                        if ($obj->getStatus()) {
                                            if ($obj->getName() === $category) {
                                                echo '<option value='.$obj->getId().' selected>'.$obj->getName().'</option>';
                                            } else {
                                                echo '<option value='.$obj->getId().'>'.$obj->getName().'</option>';
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-3 col-xs-12 col-md-offset-3">
                            <a href="../View/SelectProduct.View.php"><button class="btn btn-primary" type="button">Cancelar</button></a>
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

