<?php

class User
{
    private $Id;
    private $First_Name;
    private $Last_Name;
    private $Email;
    private $Password;
    private $Gender;
    private $Birthdate;
    private $Admin;
    private $Status;
    private $Register_Date;
    private $Modified_Date;

    function getId() {
        return $this->Id;
    }

    function getFirst_Name() {
        return $this->First_Name;
    }

    function getLast_Name() {
        return $this->Last_Name;
    }

    function getEmail() {
        return $this->Email;
    }

    function getPassword() {
        return $this->Password;
    }

    function getGender() {
        return $this->Gender;
    }

    function getBirthdate() {
        return $this->Birthdate;
    }

    function getAdmin() {
        return $this->Admin;
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

    function setFirst_Name($First_Name) {
        $this->First_Name = $First_Name;
    }

    function setLast_Name($Last_Name) {
        $this->Last_Name = $Last_Name;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setPassword($Password) {
        $this->Password = $Password;
    }

    function setGender($Gender) {
        $this->Gender = $Gender;
    }

    function setBirthdate($Birthdate) {
        $this->Birthdate = $Birthdate;
    }

    function setAdmin($Admin) {
        $this->Admin = $Admin;
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
