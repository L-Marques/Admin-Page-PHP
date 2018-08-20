<?php

class Category
{
    private $Id;
    private $Name;
    private $Status;
    private $Register_Date;
    private $Modified_Date;

    function getId() {
        return $this->Id;
    }

    function getName() {
        return $this->Name;
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

    function setName($Name) {
        $this->Name = $Name;
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
