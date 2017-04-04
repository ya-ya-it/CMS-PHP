<?php
if(!isset($_GET["pageId"])) {
    $title = "Home";
    $templateString = 'Views/content/landing.html';
}
else {
    switch($_GET["pageId"]) {

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