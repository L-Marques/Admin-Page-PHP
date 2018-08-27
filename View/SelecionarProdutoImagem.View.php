<?php
include_once '../View/Header.View.php';
include_once '../BL/Product.BL.php';

$obj = new ProductBL();
$Product = $obj -> selectObj();

if (!isset($msg)) {
    $msg = false;
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
            <h2>Selecionar produto para adicionar imagem</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nome</th>
                  <th>Descrição</th>
                  <th><center>Opções</center></th>
                </tr>
              </thead>
              <tbody>
                <?php

                foreach ($Product as $obj) {
                    print '<tr>'
                            . '<td>'.$obj->getId().'</td>'
                            . '<td>'.$obj->getName().'</td>'
                            . '<td>'.$obj->getDescription().'</td>'
                            . '<td width="12%"><a href="../View/selectImage.view.php?buscar='.$obj->getId().'">'
                            . '<center><button data-toggle="tooltip" type="button" class="btn btn-primary" title="Visualizar Imagens"><i class="fa fa-eye"></i></button>'
                            . '</a>'
                            . '<a href="../View/InsertImage.View.php?Id='.$obj->getId().'">'
                            . '<button data-toggle="tooltip" type="button" class="btn btn-success" title="Adicionar Imagem"><i class="fa fa-plus"></i></button></a>'
                            . '</td>'
                        . '</tr>';
                }
                            
                ?>
              </tbody>
            </table>
        </div>
    </div>
  </div>
</div>
<?php
    include_once '../View/Footer.View.php';

