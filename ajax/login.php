<?php
if (isset($_POST['username']) && isset($_POST['pass'])) {
    $username = $_POST['username'];
    $passwrd = $_POST['pass'];
    require_once('../controllers/loginController.php');
    $insLogin = new loginController();
    echo $insLogin->Login($username, $passwrd);
}