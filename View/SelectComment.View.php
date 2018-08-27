<?php
    include_once '../View/Header.View.php';
    include_once '../BL/Comment.BL.php';

    $obj = new CommentBL();
    
?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Comentários cadastrados</h2>
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
                  <th>Comentário</th>
                  <th>Usuário</th>
                  <th>Produto</th>
                  <th>Opções</th>
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