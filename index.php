<?php

include 'DataBase.php';

session_start();
session_unset();
$_SESSION['success'] = true;

//if(isset($_POST['date2'])){
if(count($_POST) > 0) {
    var_dump(isset($_POST['date2']));
    var_dump($_POST);
    var_dump($_POST['date2']);
    var_dump(strtotime($_POST['date2']));
    
    die;
}

$db = new DataBase();
if ($db->connect()) {
    $_SESSION['list'] = $db->getList();
    $_SESSION['lastResponse'] = $db->getLast();
} else {
    $_SESSION['success'] = false;
    $_SESSION['message'] = $db->exception;
}

include 'view.php';