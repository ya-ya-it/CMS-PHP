<?php
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
            <a class="navbar-brand" href="index.php">Todos</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php"><i class="fa fa-home fa-lg"></i>Home</a></li>

                <?php if (isset($_SESSION["is_logged_in"])) : ?>
                    <li class=<?php echo ($title == "Todos") ? "active" : "" ?>><a href=index.php?pageId=todos>ToDo List</a></li>
                    <li><a href=index.php?pageId=contact>Contact Us</a></li>
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