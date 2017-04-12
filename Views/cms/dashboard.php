<?php

/**
 * File name: dashboard.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: CMS
 * https://comp1006-assignment2.herokuapp.com/
 *
 * This is a php view for dashboard. It contains a
 * link to a list of pages and to create a new page.
 */

include_once('Controllers/user.php');
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