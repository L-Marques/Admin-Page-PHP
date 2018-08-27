<?php
include_once '../DAO/Comment.DAO.php';
include_once '../Model/Comment.Model.php';

class CommentBL
{
    private $msg = false;
    private $commentDAO;
    
    public function __construct()
    {
        $this->commentDAO = new CommentDAO();
    }

    public function insertBL(Comment $objComment)
    {
        if ($this->commentDAO->insert($objComment)) {
            $this->msg = 'O comentário foi inserido com sucesso ';
        } else {
            $this->msg = 'Erro ao inserir comentário ';
        }
        
        $msg = $this->msg;
        include '../View/InsertComment.View.php'; 
    }

    public function selectBL($where='')
    {
        $Comment = $this->commentDAO->select($where);
        
        foreach ($Comment as $obj) {
            print '<tr>'
                    . '<td>'.$obj->getId().'</td>'
                    . '<td>'.$obj->getText().'</td>'
                    . '<td>'.$obj->getProduct_Id().'</td>'
                    . '<td>'.$obj->getUser_Id().'</td>'
                    . '<td>'
                    . '<a href="../View/DeleteComment.php?Id='.$obj->getId().'"><button data-toggle="tooltip" type="button" class="btn btn-danger" title="Excluir"><i class="fa fa-trash"></i></button></a></td>'
                . '</tr>';
        }
    }
    
    public function selectUnique($Id)
    {
        $comentario = $this->commentDAO->select('WHERE Id = '.$Id);
        return $comentario[0];
    }
    
    public function selectObj()
    {
        $comentario = $this->commentDAO->select();
        return $comentario;
    }

    public function updateBL(Comment $objComment)
    {
        if ($this->commentDAO->update($objComment)) {
            $this->msg = 'O comentário foi editado com sucesso ';
        } else {
            $this->msg = 'Erro ao editar comentario ';
        }               
        
        $msg = $this->msg;
        $IdComment = $objComment->getId();
        include '../View/UpdateComment.View.php'; 
    }

    public function deleteBL(Comment $objComment)
    {
        if ($this->commentDAO->delete($objComment)) {
            $this->msg = 'O comentário foi excluído com sucesso ';
        } else {
            $this->msg = 'Erro ao excluir comentário ';
        }

        $msg = $this->msg;
        
        include '../View/DeleteComment.View.php'; 
    }

    public function disableBL(Comment $objComment)
    {
        if ($this->commentDAO->disable($objComment)) {
            $this->msg = 'O comentário foi desativado ';
        } else {
            $this->msg = 'Erro ao desativar comentário ';
        }               
        
        $msg = $this->msg;
        include '../View/SelectComment.View.php'; 
    }

    public function enableBL(Comment $objComment)
    {
        if ($this->commentDAO->Enable($objComment)) {
            $this->msg = 'O comentário foi reativado ';
        } else {
            $this->msg = 'Erro ao reativar comentário ';
        }               
        
        $msg = $this->msg;
        include '../View/SelectComment.View.php'; 
    }
}