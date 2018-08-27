<?php
$action = filter_input(INPUT_GET, 'action');

if (!isset($action)) {
    header('location:../View/Home.View.php');
} else {
    include_once '../BL/Category.BL.php';
    include_once '../Model/Category.Model.php';
    
    $objCategory = new Category();
    $categoryBL = new CategoryBL();

    $objCategory->setId(strip_tags(filter_input(INPUT_POST, 'Id')));
    $objCategory->setName(strip_tags(filter_input(INPUT_POST, 'Name')));

    switch ($action) {
        case 'Insert':
            $categoryBL->insertBL($objCategory);
            break;
        case 'Update':
            $categoryBL->updateBL($objCategory);
            break;
        case 'Delete':
            $categoryBL->deleteBL($objCategory);
            break;
        case 'Disable':
            $objCategory->setId(strip_tags(filter_input(INPUT_GET, 'Id')));
            $categoryBL->disableBL($objCategory);
            break;
        case 'Enable':
            $objCategory->setId(strip_tags(filter_input(INPUT_GET, 'Id')));
            $categoryBL->enableBL($objCategory);
            break;
        default:
            header('location:../View/Home.View.php');
            break;
    }
}
