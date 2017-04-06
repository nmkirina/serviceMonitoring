<?php

include 'DataBase.php';

session_start();
session_unset();
$_SESSION['success'] = true;

$db = new DataBase();
if ($db->connect()) {
    $_SESSION['list'] = $db->getList();
    $_SESSION['lastResponse'] = $db->getLast();
} else {
    $_SESSION['success'] = false;
    $_SESSION['message'] = $db->exception;
}

include 'view.php';