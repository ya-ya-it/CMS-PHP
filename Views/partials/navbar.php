<?php

/**
 * File name: navbar.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: CMS
 * https://comp1006-assignment2.herokuapp.com/
 *
 * This is a php partial with the navbar part.
 */

session_start();
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">CMS</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

                <?php
                include_once("Controllers/pages.php");
                $pages = ReadPage();
                foreach($pages as $page) : ?>
                    <li><a href=index.php?pageId=template&pageID=<?php echo $page['page_id'] ?>><?php echo $page['title'] ?></a></li>
                <?php endforeach; ?>

                <li class=<?php echo ($title == "CMS") ? "active" : "" ?>><a href="index.php"><i class="fa fa-home fa-lg"></i>Home</a></li>
                <li class=<?php echo ($title == "Contact") ? "active" : "" ?>><a href=index.php?pageId=contact><i class="fa fa-phone fa-lg"></i> Contact Us</a></li>

                <?php if (isset($_SESSION["is_logged_in"])) : ?>
                    <li><a href=index.php?pageId=dashboard><i class="fa fa-tachometer fa-lg"></i>Dashboard</a></li>
                    <li><a href=index.php?pageId=logout><i class="fa fa-sign-out fa-lg"></i>Log out</a></li>
                <?php else: ?>
                    <li class=<?php echo ($title == "Login") ? "active" : "" ?>><a href="index.php?pageId=login"><i
                                    class="fa fa-sign-in fa-lg"></i> Login</a></li>
                    <li class=<?php echo ($title == "Register") ? "active" : "" ?>><a href="index.php?pageId=register">Register</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>