<?php
    include_once '../View/Header.View.php';

    if (!isset($msg)) {
        $msg = false;
    }
    if (!isset($Produto)) {
        $Produto = false;
    }

    $Id = filter_input(INPUT_GET, 'Id');

    if (!isset($Id)) {
        $Id = $Produto;
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
                <h2><a href="../View/SelectImage.View.php"><button data-toggle="tooltip" type="button" class="btn btn-primary" title="Visualizar imagens"><i class="fa fa-list"></i></button></a>Adicionar Imagem</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="formExemplo" data-toggle="validator" role="form" class="form-horizontal form-label-left" method="POST" 
                action="../BL/ImageController.BL.php?action=Insert" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="idProduto" class="control-label col-md-3 col-sm-3 col-xs-12">Id do produto <span>*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="idProduto" name="Product_Id" class="form-control col-md-7 col-xs-12" 
                                   readonly="readonly" <?php echo "value='$Id'";?> type="text"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Imagem_Principal" class="control-label col-md-3 col-sm-3 col-xs-12">Imagem principal do produto? <span>*</span></label>
                        <div class="checkbox col-md-6 col-sm-6 col-xs-12">
                            <p>Sim. <input type="radio" name="Thumbnail" class="flat"  id="genderM" value="1" />&nbsp;&nbsp;
                                Não. <input type="radio" name="Thumbnail" class="flat"  id="genderF" value="0" checked="" required />
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="dropContainer" style="border:3px solid #73879C;height:150px;">
                            <br><br>
                            <center><span><i class="fa fa-picture-o fa-4x"></i></span></center>
                            <center>Solte os arquivos aqui ou use o botão abaixo para selecionar os arquivos</center>
                            <br><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <input id="fileInput" name="file" class="form-control col-md-7 col-xs-12" type="file"
                               data-error="Insira um arquivo de imagem" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-sm-3 col-xs-12 col-md-offset-4">
                            <a href="../View/SelecionarProdutoImagem.View.php"><button class="btn btn-primary" type="button">Cancelar</button></a>
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
