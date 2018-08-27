<?php
include_once '../DAO/Product.DAO.php';
include_once '../Model/Product.Model.php';

class ProductBL
{
    private $msg = false;
    private $productDAO;
    
    public function __construct()
    {
        $this->productDAO = new ProductDAO();
    }

    public function insertBL(Product $objProduct)
    {
        if ($this->productDAO->insert($objProduct)) {
            $this->msg = 'O produto foi inserido com sucesso ';
        }else {
            $this->msg = 'Erro ao inserir produto ';
        }
        
        $msg = $this->msg;
        
        include '../View/InsertProduct.View.php'; 
    }

    public function selectBL($where='')
    {
        $Product = $this->productDAO->select($where);
        
        foreach ($Product as $obj) {

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
                    . '<td>R$ '.$obj->getPrice().'</td>'
                    . '<td style = "width: 40%">'.$obj->getDescription().'</td>'
                    . '<td>'.$obj->getCategory_Name().'</td>'
                    . '<td width="15%"><center>'
                        . '<a href="../View/UpdateProduct.View.php?Id='.$obj->getId().'"><button data-toggle="tooltip" type="button" class="btn btn-success" title="Editar"><i class="fa fa-pencil-square-o"></i></button></a>'
                        . '<a href="../BL/ProductController.BL.php?action='.$actionParam.'&Id='.$obj->getId().'"><button data-toggle="tooltip" type="button" class="btn btn-'.$btn.'" title="'.$title.'"><i class="fa fa-'.$fontAwesome.'"></i></button></a>'
                        . '<a href="../View/DeleteProduct.View.php?Id='.$obj->getId().'"><button data-toggle="tooltip" type="button" class="btn btn-danger" title="Excluir"><i class="fa fa-trash"></i></button></a>'
                    . '</center></td>'
                . '</tr>';
        }
    }
    
    public function selectUnique($Id)
    {
        $product = $this->productDAO->select('WHERE Id = '.$Id);
        
        return $product[0];
    }
    
    public function selectObj()
    {
        $product = $this->productDAO->select();
        return $product;
    }

    public function updateBL(Product $objProduct)
    {
        if ($this->productDAO->update($objProduct)) {
            $this->msg = 'O produto foi editado com sucesso ';
        } else {
            $this->msg = 'Erro ao editar produto ';
        }               
        
        $msg = $this->msg;
        $IdProduct = $objProduct->getId();
        include '../View/UpdateProduct.View.php'; 
    }

    public function deleteBL(Product $objProduct)
    {
        if ($this->productDAO->delete($objProduct)) {
            $this->msg = 'O produto foi excluído com sucesso ';
        } else {
            $this->msg = 'Erro ao excluir produto ';
        }

        $msg = $this->msg;
        
        include '../View/DeleteProduct.View.php'; 
    }

    public function disableBL(Product $objProduct)
    {
        if ($this->productDAO->disable($objProduct)) {
            $this->msg = 'O produto foi desativado ';
        } else {
            $this->msg = 'Erro ao desativar produto ';
        }               
        
        $msg = $this->msg;
        include '../View/SelectProduct.View.php'; 
    }

    public function enableBL(Product $objProduct)
    {
        if ($this->productDAO->enable($objProduct)) {
            $this->msg = 'O produto foi reativado ';
        } else {
            $this->msg = 'Erro ao reativar produto ';
        }               
        
        $msg = $this->msg;
        include '../View/SelectProduct.View.php'; 
    }
}
