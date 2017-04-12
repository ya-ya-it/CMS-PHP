<?php

/**
 * File name: delete.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: CMS
 * https://comp1006-assignment2.herokuapp.com/
 *
 * This is a php view for deleting item from the database.
 */

include_once('Controllers/user.php');
CheckIfAuthenticated();
include_once('Controllers/pages.php');
$pageID = $_GET["pageID"];
if($pageID != false) {
    DeletePage($pageID);
}
// redirect to index page
header('Location: index.php?pageId=list');
?>