<?php

class Image
{
    private $Id;
    private $File_Name;
    private $File_Type;
    private $File_Size;
    private $File_Path;
    private $Product_Id;
    private $Thumbnail;
    private $Status;
    private $Register_Date;
    private $Modified_Date;

    function getId() {
        return $this->Id;
    }

    function getFile_Name() {
        return $this->File_Name;
    }

    function getFile_Type() {
        return $this->File_Type;
    }

    function getFile_Size() {
        return $this->File_Size;
    }

    function getFile_Path() {
        return $this->File_Path;
    }

    function getProduct_Id() {
        return $this->Product_Id;
    }

    function getThumbnail() {
        return $this->Thumbnail;
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

    function setFile_Name($File_Name) {
        $this->File_Name = $File_Name;
    }

    function setFile_Type($File_Type) {
        $this->File_Type = $File_Type;
    }

    function setFile_Size($File_Size) {
        $this->File_Size = $File_Size;
    }

    function setFile_Path($File_Path) {
        $this->File_Path = $File_Path;
    }

    function setProduct_Id($Product_Id) {
        $this->Product_Id = $Product_Id;
    }

    function setThumbnail($Thumbnail) {
        $this->Thumbnail = $Thumbnail;
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
