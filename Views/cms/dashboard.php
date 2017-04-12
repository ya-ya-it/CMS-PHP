<?php
include_once('Controllers/new_page.php');
CheckIfAuthenticated();
?>

<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h1>Dashboard</h1>

            <ul>
                <li><a href="index.php?pageId=list">View List Of Pages</li>
                <li><a href="index.php?pageId=page&pageID=0">Add New Page</li>
            </ul>


        </div>
    </div>
</div>