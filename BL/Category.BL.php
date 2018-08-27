<?php
include_once '../DAO/Category.DAO.php';
include_once '../Model/Category.Model.php';

class CategoryBL
{
    private $msg = false;
    private $categoryDAO;
    
    public function __construct()
    {
        $this->categoryDAO = new CategoryDAO();
    }

    public function insertBL(Category $objCategory)
    {
        if ($this->categoryDAO->insert($objCategory)) {
            $this->msg = 'A categoria foi inserida com sucesso ';
        } else {
            $this->msg = 'Erro ao inserir categoria ';
        }
        
        $msg = $this->msg;
        include '../View/InsertCategory.View.php'; 
    }

    public function selectBL($where='')
    {
        $Category = $this->categoryDAO->select($where);
        
        foreach ($Category as $obj) {
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
                    . '<td>'.$obj->getId().'</td>'
                    . '<td>'.$obj->getName().'</td>'
                    . '<td width="15%"><center>'
                        . '<a href="../View/UpdateCategory.View.php?Id='.$obj->getId().'"><button data-toggle="tooltip" type="button" class="btn btn-success" title="Editar"><i class="fa fa-pencil-square-o"></i></button></a>'
                        . '<a href="../BL/CategoryController.BL.php?action='.$actionParam.'&Id='.$obj->getId().'"><button data-toggle="tooltip" type="button" class="btn btn-'.$btn.'" title="'.$title.'"><i class="fa fa-'.$fontAwesome.'"></i></button></a>'
                        . '<a href="../View/DeleteCategory.View.php?Id='.$obj->getId().'"><button data-toggle="tooltip" type="button" class="btn btn-danger" title="Excluir"><i class="fa fa-trash"></i></button></a>'
                    . '</center></td>'
                . '</tr>';
        }
    }
    
    public function selectUnique($Id)
    {
        $category = $this->categoryDAO->select('WHERE Id = '.$Id);
        return $category[0];
    }
    
    public function selectObj()
    {
        $category = $this->categoryDAO->select();
        return $category;
    }

    public function updateBL(Category $objCategory)
    {
        if ($this->categoryDAO->update($objCategory)) {
            $this->msg = 'A categoria foi editada com sucesso ';
        } else {
            $this->msg = 'Erro ao editar categoria ';
        }               
        
        $msg = $this->msg;
        $IdCategory = $objCategory->getId();
        include '../View/UpdateCategory.View.php'; 
    }

    public function deleteBL(Category $objCategory)
    {
        if ($this->categoryDAO->delete($objCategory)) {
            $this->msg = 'A categoria foi excluída com sucesso ';
        } else {
            $this->msg = 'Erro ao excluir categoria ';
        }

        $msg = $this->msg;
        
        include '../View/DeleteCategory.php'; 
    }

    public function disableBL(Category $objCategory)
    {
        if ($this->categoryDAO->disable($objCategory)) {
            $this->msg = 'A categoria foi desativada ';
        } else {
            $this->msg = 'Erro ao desativar categoria ';
        }               
        
        $msg = $this->msg;
        include '../View/SelectCategory.View.php'; 
    }

    public function enableBL(Category $objCategory)
    {
        if ($this->categoryDAO->Enable($objCategory)) {
            $this->msg = 'A categoria foi reativada ';
        } else {
            $this->msg = 'Erro ao reativar categoria ';
        }               
        
        $msg = $this->msg;
        include '../View/SelectCategory.View.php'; 
    }
}