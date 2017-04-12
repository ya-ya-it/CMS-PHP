<?php

/**
 * File name: template.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: CMS
 * https://comp1006-assignment2.herokuapp.com/
 *
 * This is a php view with the template of the new page that user created.
 */

require_once('Controllers/pages.php');
if (!empty($_GET['pageID'])) {
    $pageID = $_GET["pageID"];
    $page = GetPageById($pageID);
    $title = $page['title'];
    $bodyText = $page['body_text'];
}
?>

<div class="jumbotron text-center">
    <h1><?php echo $title ?></h1>
    <p><?php echo $bodyText ?></p>
</div>