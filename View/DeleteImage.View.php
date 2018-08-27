<?php
    include_once '../View/Header.View.php';
    include_once '../BL/SelectImagem.BL.php';

    $Imagem = new SelectImagemBL();
    
    $Id = filter_input(INPUT_GET, 'Id');
    
    if(!isset($Id)){
        $Id = $IdCategoria;
    }
?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Você tem certeza que deseja excluir essa imagem?</h2>
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
                  <th>Imagem Principal</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $obj = $Imagem -> selectUnico($Id);
                    
                    print '<tr>'
                            . '<td><center><a href="'.$obj->getDiretorio().'" target="blank"><img src="'.$obj->getDiretorio().'" width="100"></a></center></td>'
                            . '<td>'.$obj->getId().'</td>'
                            . '<td>'.$obj->getArquivo_Nome().'</td>'
                            . '<td>'.$obj->getArquivo_Tipo().'</td>'
                            . '<td>'.round(($obj->getArquivo_Tamanho() / 1024), 2).' KB</td>'
                            . '<td>'.$obj->getProduto_Id().'</td>'
                            . '<td>'.$obj->getImagem_Principal().'</td>'
                            . '</tr>';
                    
                ?>
              </tbody>
            </table>
            <br>
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="../BL/Imagem.BL.php?action=Delete">
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" name="Id" value="<?php echo $obj->getId();?>">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-3 col-xs-12 col-md-offset-3">
                            <a href="../View/SelectImagem.View.php"><button class="btn btn-primary" type="button">Cancelar</button></a>
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
  </div>
</div>

<?php
    include_once '../View/Footer.View.php';