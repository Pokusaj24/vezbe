<?php
require_once 'DAO.php';
session_start();
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if ($action === 'doPost') {
        $ime = isset($_POST['ime']) ? test_input($_POST['ime']) : '';
        $prosek = isset($_POST['prosek']) ? test_input($_POST['prosek']) : 0;
        if (!empty($ime) && !empty($prosek)) {
            $dao = new DAO();
            $dao->insertStudent($ime, $prosek);
            $studenti = $dao->getLast10();
            $_SESSION['studenti'] = $studenti;
            header('Location: prikaz.php'); // Redirect to avoid resubmission
            exit();
        } else {
            $msg = "Popunite sva polja.";
            include 'index.php';
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === "GET") {
    if ($action === 'logout') {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
