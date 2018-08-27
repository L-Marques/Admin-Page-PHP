<?php
$action = filter_input(INPUT_GET, 'action');

if (!isset($action)) {
    header('location:../View/Home.View.php');
} else {
    include_once '../BL/Comment.BL.php';
    include_once '../Model/Comment.Model.php';
    
    $objComment = new Comment();
    $commentBL = new CommentBL();

    $objComment->setId(strip_tags(filter_input(INPUT_POST, 'Id')));
    $objComment->setText(strip_tags(filter_input(INPUT_POST, 'Text')));
    $objComment->setProduct_Id(strip_tags(filter_input(INPUT_POST, 'Product_Id')));
    $objComment->setUser_Id(strip_tags(filter_input(INPUT_POST, 'User_Id')));

    switch ($action) {
        case 'Insert':
            $commentBL->insertBL($objComment);
            break;
        case 'Update':
            $commentBL->updateBL($objComment);
            break;
        case 'Delete':
            $commentBL->deleteBL($objComment);
            break;
        case 'Disable':
            $objComment->setId(strip_tags(filter_input(INPUT_GET, 'Id')));
            $commentBL->disableBL($objComment);
            break;
        case 'Enable':
            $objComment->setId(strip_tags(filter_input(INPUT_GET, 'Id')));
            $commentBL->enableBL($objComment);
            break;
        default:
            header('location:../View/Home.View.php');
            break;
    }

}
