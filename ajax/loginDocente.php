<?php
if (isset($_POST['no_Docente']) && isset($_POST['passwrd'])) {
    $numDocente = $_POST['no_Docente'];
    $passwrd = $_POST['passwrd'];
    require_once('../controllers/loginController.php');
    $insLogin = new loginController();
    echo $insLogin->LoginDocente($numDocente, $passwrd);
    echo $numDocente;
    echo $passwrd;
}