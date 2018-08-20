<?php

class Product 
{
    private $Id;
    private $Name;
    private $Description;
    private $Price;
    private $Currency;
    private $Category_Id;
    private $Category_Name;
    private $Status;
    private $Register_Date;
    private $Modified_Date;

    function getId() {
        return $this->Id;
    }

    function getName() {
        return $this->Name;
    }

    function getDescription() {
        return $this->Description;
    }

    function getPrice() {
        return $this->Price;
    }

    function getCurrency() {
        return $this->Currency;
    }

    function getCategory_Id() {
        return $this->Category_Id;
    }

    function getCategory_Name() {
        return $this->Category_Name;
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

    function setDescription($Description) {
        $this->Description = $Description;
    }

    function setPrice($Price) {
        $this->Price = $Price;
    }

    function setCurrency($Currency) {
        $this->Currency = $Currency;
    }

    function setCategory_Id($Category_Id) {
        $this->Category_Id = $Category_Id;
    }

    function setCategory_Name($Category_Name) {
        $this->Category_Name = $Category_Name;
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
