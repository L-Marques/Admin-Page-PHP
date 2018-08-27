<?php
include_once '../View/Header.View.php';
include_once '../BL/Image.BL.php';

$obj = new ImageBL();
$buscar = filter_input(INPUT_GET, 'buscar');

if (!isset($buscar)) {
    $buscar = false;
}
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
            <h2><a href="../View/SelecionarProdutoImagem.View.php"><button data-toggle="tooltip" type="button" class="btn btn-primary" title="Adicionar imagens"><i class="fa fa-plus-square"></i></button></a>Imagens cadastradas</h2>
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
                  <th>Imagem</th>
                  <th>Id</th>
                  <th>Nome</th>
                  <th>Tipo</th>
                  <th>Tamanho</th>
                  <th>Produto</th>
                  <th>Thumbnail</th>
                  <th><center>Opções</center></th>
                </tr>
              </thead>
              <tbody>
                <?php

                    if($buscar){
                        $obj -> selectBL('WHERE Product_Id = ' . $buscar);
                    } else {
                        $obj -> selectBL();
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
