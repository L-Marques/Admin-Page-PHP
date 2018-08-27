<?php

include_once '../View/Header.View.php';

?>


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
	        <div class="x_title">
	            <h2><?php print $_SESSION["Nome"]; ?> - Administrador</h2>
	            <div class="clearfix"></div>
	        </div>
	        <div class="x_content">
	        	<div class="row">
	        		<div class="col-md-6 col-sm-6 col-xs-6">
	        			<br><br><br>
        				<?php
        				print '<p> Id de usuário: '.$_SESSION["Id"].'<p>'.
        				'<p> Nome: '.$_SESSION["Nome"].'</p>'.
        				'<p> Email: '.$_SESSION["Email"].'</p>'.
        				'<p> Gênero: '.$_SESSION["Genero"].'</p>'.
        				'<p> Data de Nascimento: '.$_SESSION["DtNasc"].'</p>'.
        				'<br><br><buttom type="buttom" class="btn-info btn-lg btn-block"><a data-toggle="tooltip" href="../View/UpdateUsuario.View.php" data-placement="top" ><center>
                        <span class="fa fa-pencil-square-o"></span>Editar</center></a></buttom>';


        				?>
	        		</div>
	        		<div class="col-md-6 col-sm-6 col-xs-6">
	        			<br><br><br>
	        			<img src="../View/images/img.png" width="200">
	        		</div>
	        	</div>
	        </div>
        </div>
    </div>
</div>


<?php

include_once '../View/Footer.View.php';