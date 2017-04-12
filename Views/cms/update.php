<?php

/**
 * File name: register.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: CMS
 * https://comp1006-assignment2.herokuapp.com/
 *
 * This is a php view with the code to create a new page or to edit the existing one.
 */

include_once('Controllers/user.php');
CheckIfAuthenticated();
include_once('Config/database.php');
include_once('Controllers/pages.php');
$isAddition = filter_input(INPUT_POST, "isAddition");
$pageTitle = filter_input(INPUT_POST, "TitleTextField"); //$_POST["NameTextField"];
$bodyText = filter_input(INPUT_POST, "BodyTextTextField"); //$_POST["CostTextField"];

if ($isAddition == "1") {
    CreatePage($pageTitle, $bodyText);
} else {
    $pageID = filter_input(INPUT_POST, "IDTextField"); // $_POST["IDTextField"];
    UpdatePage($pageID, $pageTitle, $bodyText);
}
// redirect to index page
header('Location: index.php?pageId=list');
?>