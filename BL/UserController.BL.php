<?php
$action = filter_input(INPUT_GET, 'action');

if (!isset($action)) {
    header('location:../View/Home.View.php');
} else {
    include_once '../BL/User.BL.php';
    include_once '../Model/User.Model.php';
    
    $User = new User();
    $UserBL = new UserBL();

    $User->setId(strip_tags(filter_input(INPUT_POST, 'Id')));
    $User->setFirst_Name(strip_tags(filter_input(INPUT_POST, 'First_Name')));
    $User->setLast_Name(strip_tags(filter_input(INPUT_POST, 'Last_Name')));
    $User->setEmail(strip_tags(filter_input(INPUT_POST, 'Email')));
    $password = strip_tags(filter_input(INPUT_POST, 'Password'));
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $User->setPassword($hash);
    $User->setGender(strip_tags(filter_input(INPUT_POST, 'Gender')));
    $User->setBirthdate(strip_tags(filter_input(INPUT_POST, 'Birthdate')));
    $User->setAdmin(strip_tags(filter_input(INPUT_POST, 'Admin')));

    switch ($action) {
        case 'Insert':
            $UserBL->insertBL($User);
            break;
        case 'Update':
            $UserBL->updateBL($User);
            break;
        case 'Delete':
            $UserBL->deleteBL($User);
            break;
        case 'Disable':
            $User->setId(strip_tags(filter_input(INPUT_GET, 'Id')));
            $UserBL->disableBL($User);
            break;
        case 'Enable':
            $User->setId(strip_tags(filter_input(INPUT_GET, 'Id')));
            $UserBL->enableBL($User);
            break;
        /* case 'Recovery';
            $UserBL->recoveryBL($User);
            break; */
        default:
            header('location:../View/Home.View.php');
            break;
    }
}
