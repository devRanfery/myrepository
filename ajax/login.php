<?php
if (isset($_POST['username']) && isset($_POST['pass'])) {
    $username = $_POST['username'];
    $passwrd = $_POST['pass'];
    require_once('../controllers/loginController.php');
    $instaLogin = new loginController();
    echo $instaLogin->Login($username, $passwrd);
}