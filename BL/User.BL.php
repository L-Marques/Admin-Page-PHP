<?php
include_once '../DAO/User.DAO.php';
include_once '../Model/User.Model.php';

class UserBL
{
    private $msg = false;
    private $userDAO;
    private $objUser;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
        //$this->objUser = new User();
    }

    public function insertBL(User $User)
    {
        if ($this->validateEmail($User)) {
            if ($this->userDAO->insert($User)) {
                $this->msg = 'O usuário foi cadastrado com sucesso ';
            } else {
                $this->msg = 'Erro ao cadastrar usuário ';
            }               
        }
        $msg = $this->msg;
        include '../View/InsertUser.View.php'; 
    }

    public function selectBL($where='')
    {
        $User = $this->userDAO->select($where);
        
        foreach ($User as $obj) {

            $adm = $obj->getAdmin() ? 'Sim' : 'Não';

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
                    . '<td><center>'.$obj->getId().'</center></td>'
                    . '<td>'.$obj->getFirst_Name().' '.$obj->getLast_Name().'</td>'
                    . '<td>'.$obj->getEmail().'</td>'
                    . '<td>'.$obj->getBirthdate().'</td>'
                    . '<td>'.$obj->getGender().'</td>'
                    . '<td>'.$adm.'</td>'
                    . '<td><center>'
                        //. '<a href="../View/UpdateUser.View.php?Id='.$obj->getId().'"><button data-toggle="tooltip" type="button" class="btn btn-success" title="Editar"><i class="fa fa-pencil-square-o"></i></button></a>'
                        . '<a href="../BL/UserController.BL.php?action='.$actionParam.'&Id='.$obj->getId().'">'
                        . '<button data-toggle="tooltip" type="button" class="btn btn-'.$btn.'" title="'.$title.'">'
                        . '<i class="fa fa-'.$fontAwesome.'"></i></button></a>'
                        . '<a href="../View/DeleteUser.View.php?Id='.$obj->getId().'"><button data-toggle="tooltip" type="button" class="btn btn-danger" title="Excluir"><i class="fa fa-trash"></i></button></a>'
                    . '</center></td>'
                . '</tr>';
        }
    }
    
    public function selectUnique($Id)
    {
        $user = $this->userDAO->select('WHERE Id = '.$Id);    
        return $user[0];
    }
    
    public function selectObj()
    {
        $user = $this->userDAO->select();
        return $user;
    }

    public function updateBL(User $User)
    {
        if ($this->userDAO->update($User)) {
            $this->msg = 'O usuário foi editado com sucesso ';
        } else {
            $this->msg = 'Erro ao editar dados do usuário ';
        }               
        
        $msg = $this->msg;
        $IdUser = $User->getId();
        include '../View/UpdateUser.View.php'; 
    }

    public function deleteBL(User $User)
    {
        if ($this->userDAO->delete($User)) {
            $this->msg = 'O usuário foi excluído com sucesso ';
        } else {
            $this->msg = 'Erro ao excluir usuário ';
        }

        $msg = $this->msg;        
        include '../View/DeleteUser.View.php'; 
    }

    public function disableBL(User $User)
    {
        if ($this->userDAO->disable($User)) {
            $this->msg = 'O usuário foi desativado ';
        } else {
            $this->msg = 'Erro ao desativar usuário ';
        }               
        
        $msg = $this->msg;
        include '../View/SelectUser.View.php'; 
    }

    public function enableBL(User $User)
    {
        if ($this->userDAO->Enable($User)) {
            $this->msg = 'O usuário foi reativado ';
        } else {
            $this->msg = 'Erro ao reativar usuário ';
        }               
        
        $msg = $this->msg;
        include '../View/SelectUser.View.php'; 
    }

    public function Login(User $User)
    {
        if ($this->validateEmailLogin($User)) {
        	if ($this->validatePassword($User)) {
        		return true;
        	} else {
        		$this->msg = 'A senha digitada está incorreta!';
        		return false;
        	}
        } else {
        	$this->msg = 'Nenhum usuário Foi cadastrado com essa conta de email!';
        	return false;
        }
	}

    private function validateEmail(User $User)
    {
        $EmailReturn = $this->userDAO->select('WHERE Email = "'.$User->getEmail().'"');

        if (count($EmailReturn) > 0) {
            $this->msg = 'O email inserido já está sendo utilizado ';
            return false;
        } else {
            return true;
        }
    }

    public function validateEmailLogin(User $User)
    {
        $EmailReturn = $this->userDAO->select('WHERE Email = "'.$User->getEmail().'"');
        
        if($EmailReturn) {
        	$this -> objUser = $EmailReturn[0];
            return true;
        } else {
            return false;
        }
	}

    public function validatePassword(User $User)
    {
		$pass = $User->getPassword();
		$hash = $this->objUser->getPassword();

		if (password_verify($pass,$hash)) {
			return true;
		} else {
			return false;
		}
    }
    
    public function getObjUser()
    {
		return $this->objUser;
	}

    public function getMsg()
    {
		return $this->msg;
	}
}
