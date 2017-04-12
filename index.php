<?php

/**
 * File name: index.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: CMS
 * https://comp1006-assignment2.herokuapp.com/
 *
 * This is a php file with the routing.
 */

if(!isset($_GET["pageId"])) {
    $title = "CMS";
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
            $title = "Home";
            $templateString = 'Views/content/landing.html';
            break;
        case "register":
            $title = "Register";
            $templateString = 'Views/auth/register.php';
            break;
        case "contact":
            $title = "Contact";
            $templateString = 'Views/content/contact_us.php';
            break;
        case "list":
            $title = "Pages";
            $templateString = 'Views/cms/list.php';
            break;
        case "details";
            if($_GET["pageID"]==0) {
                $title = "Add Page";
            }
            else {
                $title = "Edit Page";
            }
            $templateString = 'Views/cms/page.php';
            break;
        case "page":
            $title = "Update Page";
            $templateString = 'Views/cms/page.php';
            break;
        case "update":
            $title = "Update Page";
            $templateString = 'Views/cms/update.php';
            break;
        case "delete":
            $title = "Delete Page";
            $templateString = 'Views/cms/delete.php';
            break;
        case "template":
            $title = "Page";
            $templateString = 'Views/cms/template.php';
            break;
        case "dashboard":
            $title = "Dashboard";
            $templateString = 'Views/cms/dashboard.php';
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