<?php
$action = filter_input(INPUT_GET, 'action');

if (!isset($action)) {
    header('location:../View/Home.View.php');
} else {
    include_once '../BL/Image.BL.php';
    include_once '../Model/Image.Model.php';
    
    $Product = strip_tags(filter_input(INPUT_POST, 'Product_Id'));

    $objImage = new Image();
    $imageBL = new ImageBL();

    $objImage->setId(strip_tags(filter_input(INPUT_POST, 'Id')));
    $objImage->setProduct_Id($Product);
    $objImage->setThumbnail(strip_tags(filter_input(INPUT_POST, 'Thumbnail')));

    switch ($action) {
        case 'Insert':
            if (isset($_FILES['file'][ 'name']) && $_FILES['file']['error'] == 0) {
                $file_tmp = $_FILES['file']['tmp_name'];
                $nome = $_FILES['file']['name'];
    
                $extensao = pathinfo($nome, PATHINFO_EXTENSION);
                $extensao = strtolower($extensao);
    
                if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
                    $novoNome = uniqid (time()) . '.' . $extensao;
                    $destino = '../View/images/'.$novoNome;
    
                    if (move_uploaded_file($file_tmp, $destino)) {
                        $objImage->setFile_Name(strip_tags($_FILES['file']['name']));
                        $objImage->setFile_Type(strip_tags($_FILES['file']['type']));
                        $objImage->setFile_Size(strip_tags($_FILES['file']['size']));
                        $objImage->setFile_Path($destino);
                    } else {
                        $msg = 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
                        include_once '../View/InsertImage.View.php';
                    }
                } else {
                    $msg = 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
                    include_once '../View/InsertImage.View.php';
                }
            } else {
                $msg = 'Você não enviou nenhum arquivo!';
                include_once '../View/InsertImage.View.php';
            }
            $imageBL->insertBL($objImage);
            break;
        case 'Update':
            $imageBL->updateBL($objImage);
            break;
        case 'Delete':
            $imageBL->deleteBL($objImage);
            break;
        case 'Disable':
            $objImage->setId(strip_tags(filter_input(INPUT_GET, 'Id')));
            $imageBL->disableBL($objImage);
            break;
        case 'Enable':
            $objImage->setId(strip_tags(filter_input(INPUT_GET, 'Id')));
            $imageBL->enableBL($objImage);
            break;
        default:
            header('location:../View/Home.View.php');
            break;
    }
    
}
