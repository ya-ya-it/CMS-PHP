<?php
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