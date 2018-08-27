<?php
include_once '../DAO/Image.DAO.php';
include_once '../Model/Image.Model.php';

class ImageBL
{
    private $msg = false;
    private $imageDAO;
    
    public function __construct()
    {
        $this->imageDAO = new ImageDAO();
    }

    public function insertBL(Image $objImage)
    {
        if ($this->imageDAO->insert($objImage)) {
            $this->msg = 'A imagem foi inserida com sucesso ';
        } else {
            $this->msg = 'Erro ao inserir imagem ';
        }
        
        $msg = $this->msg;
        $Product = $objImage->getProduct_Id();
        
        include '../View/InsertImage.View.php'; 
    }

    public function selectBL($where='')
    {
        $Image = $this->imageDAO->select($where);

        foreach ($Image as $obj) {
            $htmlClass = $obj->getStatus() ? '' : 'class="danger"';

            if ($obj->getStatus()) {
                $actionParam = 'Disable';
                $btn = 'danger';
                $title = 'Desativar';
                $fontAwesome = 'times';
            } else {
                $actionParam = 'Enable';
                $btn = 'primary';
                $title = 'Reativar';
                $fontAwesome = 'plus';
            }    

            print '<tr '. $htmlClass .' title="Data de registro: '.$obj->getRegister_Date().'&#013;Data de modificação: '.$obj->getModified_Date().' ">'
                    . '<td><center><a href="'.$obj->getFile_Path().'" target="blank"><img src="'.$obj->getFile_Path().'" width="100"></a></center></td>'
                    . '<td>'.$obj->getId().'</td>'
                    . '<td>'.$obj->getFile_Name().'</td>'
                    . '<td>'.$obj->getFile_Type().'</td>'
                    . '<td>'.round(($obj->getFile_Size() / 1024), 2).' KB</td>'
                    . '<td>'.$obj->getProduct_Id().'</td>'
                    . '<td>'.$obj->getThumbnail().'</td>'
                    . '<td><center>'
                    . '<a href="../View/UpdateImage.View.php?Id='.$obj->getId().'"><button data-toggle="tooltip" type="button" class="btn btn-success" title="Editar"><i class="fa fa-pencil-square-o"></i></button></a>'
                    . '<a href="../BL/ImageController.BL.php?action='.$actionParam.'&Id='.$obj->getId().'">'
                        . '<button data-toggle="tooltip" type="button" class="btn btn-'.$btn.'" title="'.$title.'">'
                        . '<i class="fa fa-'.$fontAwesome.'"></i></button></a>'
                    . '<a href="../View/DeleteImage.View.php?Id='.$obj->getId().'"><button data-toggle="tooltip" type="button" class="btn btn-danger" title="Excluir"><i class="fa fa-trash"></i></button></a>'
                    .'</center></td>'
                . '</tr>';
        }
    }
    
    public function selectUnique($Id)
    {
        $imagem = $this->imageDAO->select('WHERE Id = '.$Id);
        
        return $imagem[0];
    }
    
    public function selectObj()
    {
        $imagem = $this->imageDAO->select();
        return $imagem;
    }

    public function updateBL(Image $objImage)
    {
        if ($this->imageDAO->update($objImage)) {
            $this->msg = 'A imagem foi editada com sucesso ';
        } else {
            $this->msg = 'Erro ao editar imagem ';
        }               
        
        $msg = $this->msg;
        $IdImage = $objImage->getId();
        include '../View/UpdateImage.View.php'; 
    }

    public function deleteBL(Image $objImage)
    {
        if ($this->imageDAO->delete($objImage)) {
            $this->msg = 'A imagem foi excluída com sucesso ';
        } else {
            $this->msg = 'Erro ao excluir imagem ';
        }

        $msg = $this->msg;
        include '../View/SelectImage.View.php'; 
    }

    public function disableBL(Image $objImage)
    {
        if ($this->imageDAO->disable($objImage)) {
            $this->msg = 'A imagem foi desativada ';
        } else {
            $this->msg = 'Erro ao desativar imagem ';
        }               
        
        $msg = $this->msg;
        include '../View/SelectImage.View.php'; 
    }

    public function enableBL(Image $objImage)
    {
        if ($this->imageDAO->Enable($objImage)) {
            $this->msg = 'A imagem foi reativada ';
        } else {
            $this->msg = 'Erro ao reativar imagem ';
        }               
        
        $msg = $this->msg;
        include '../View/SelectImage.View.php'; 
    }
}
