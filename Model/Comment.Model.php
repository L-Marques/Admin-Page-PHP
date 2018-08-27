<?php

class Comment
{
    private $Id;
    private $Text;
    private $Product_Id;
    private $User_Id;
    private $Status;
    private $Register_Date;
    private $Modified_Date;
    
    function getId() {
        return $this->Id;
    }

    function getText() {
        return $this->Text;
    }

    function getProduct_Id() {
        return $this->Product_Id;
    }

    function getUser_Id() {
        return $this->User_Id;
    }

    function getStatus() {
        return $this->Status;
    }

    function getRegister_Date() {
        return $this->Register_Date;
    }

    function getModified_Date() {
        return $this->Modified_Date;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setText($Text) {
        $this->Text = $Text;
    }

    function setProduct_Id($Product_Id) {
        $this->Product_Id = $Product_Id;
    }

    function setUser_Id($User_Id) {
        $this->User_Id = $User_Id;
    }

    function setStatus($Status) {
        $this->Status = $Status;
    }

    function setRegister_Date($Register_Date) {
        $this->Register_Date = $Register_Date;
    }

    function setModified_Date($Modified_Date) {
        $this->Modified_Date = $Modified_Date;
    }
}
