<?php
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