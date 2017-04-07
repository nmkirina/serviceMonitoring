<?php
include '../Model/DataBase.php'; 
$db = new DataBase();

if ($db->connect()) {
    if(isset($_POST['date1']) && isset($_POST['date2'])){
        $_SESSION['list'] = $db->getList($_POST['date1'], $_POST['date2']);
        include '../View/list.php';
    } elseif (isset($_POST['id'])) {
        $item = $db->getItem($_POST['id']);
        $_SESSION['item'] = $item[0];
        include '../View/item.php';
    }
} else {
    $_SESSION['success'] = false;
    $_SESSION['message'] = $db->exception;
    include '../View/errorMessage.php';
}
