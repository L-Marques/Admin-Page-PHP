<?php
    include_once '../View/Header.View.php';
    include_once '../BL/Product.BL.php';

    $obj = new ProductBL();

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
            <h2><a href="../View/InsertProduct.View.php"><button data-toggle="tooltip" type="button" class="btn btn-primary" title="Adicionar produto"><i class="fa fa-plus-square"></i></button></a>Produtos cadastrados</h2>
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
                  <th>Preço</th>
                  <th>Descrição</th>
                  <th>Categoria</th>
                  <th><center>Opções</center></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $obj -> selectBL(); 
                ?>
              </tbody>
            </table>
        </div>
    </div>
  </div>
</div>

<?php
    include_once '../View/Footer.View.php';