<?php
$action = filter_input(INPUT_GET, 'action');

if (!isset($action)) {
    header('location:../View/Home.View.php');
} else {
    include_once '../BL/Product.BL.php';
    include_once '../Model/Product.Model.php';
    
    $objProduct = new Product();
    $productBL = new ProductBL();

    $objProduct->setId(strip_tags(filter_input(INPUT_POST, 'Id')));
    $objProduct->setName(strip_tags(filter_input(INPUT_POST, 'Name')));
    $objProduct->setPrice(strip_tags(filter_input(INPUT_POST, 'Price')));
    $objProduct->setCurrency(strip_tags(filter_input(INPUT_POST, 'Currency')));
    $objProduct->setDescription(strip_tags(filter_input(INPUT_POST, 'Description')));
    $objProduct->setCategory_Id(strip_tags(filter_input(INPUT_POST, 'Category_Id')));

    
    switch ($action) {
        case 'Insert':
            $productBL->insertBL($objProduct);
            break;
        case 'Update':
            $productBL->updateBL($objProduct);
            break;
        case 'Delete':
            $productBL->deleteBL($objProduct);
            break;
        case 'Disable':
            $objProduct->setId(strip_tags(filter_input(INPUT_GET, 'Id')));
            $productBL->disableBL($objProduct);
            break;
        case 'Enable':
            $objProduct->setId(strip_tags(filter_input(INPUT_GET, 'Id')));
            $productBL->enableBL($objProduct);
            break;
        default:
            header('location:../View/Home.View.php');
            break;
    }
}
