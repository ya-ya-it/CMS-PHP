<?php
if(!isset($_GET["pageId"])) {
    $title = "Todos";
    $templateString = 'Views/content/landing.html';
}
else {
    switch($_GET["pageId"]) {
        case "login":
            $title = "Login";
            $templateString = 'Views/auth/login.php';
            break;
        case "logout":
            include_once("Controllers/user.php");
            Logout();
            $title = "Todos";
            $templateString = 'Views/content/landing.html';
            break;
        case "register":
            $title = "Register";
            $templateString = 'Views/auth/register.php';
            break;
        default:
            $title = "404";
            $templateString = "Views/errors/404.php";
            break;
    }
}
?>

<?php include_once('Views/partials/header.php'); ?>

<?php include_once ('Views/partials/navbar.php'); ?>

<?php require($templateString); ?> <!-- Content -->

<?php include_once ('Views/partials/footer.php');