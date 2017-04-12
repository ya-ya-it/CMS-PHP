<?php

/**
 * File name: register.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: CMS
 * https://comp1006-assignment2.herokuapp.com/
 *
 * This is a php view with the register form.
 */

$messages = "";
include_once('Models/User.php');
if(isset($_POST["username"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    include_once("Controllers/user.php");
    $messages = Register($username, $password);
}
else {
    $messages = "";
}
$title = "Register";
?>

<!--Registration form  -->
<main class="container">
    <!-- Display flash messages  -->
    <?php if ($messages != "") : ?>
        <div class="alert alert-danger"><?php echo $messages ?></div>
    <?php endif ?>

    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <h1>User Registration</h1>
            <form method="post" action="index.php?pageId=register">
                <fieldset class="form-group">
                    <label for="username">Username: *</label>
                    <input name="username" type="text" class="form-control" required />
                </fieldset>
                <fieldset class="form-group">
                    <label for="password">Password: *</label>
                    <input name="password" type="password" class="form-control" required />
                </fieldset>
                <fieldset class="form-group">
                    <label for="displayName">Display Name: *</label>
                    <input name="displayName" type="text" class="form-control" required />
                </fieldset>
                <fieldset class="form-group text-right">
                    <input type="submit" class="btn btn-success" value="Submit"/>
                    <a href="index.php">
                        <input type="button" class="btn btn-warning" value="Cancel"/>
                    </a>
                </fieldset>
            </form>
        </div>
    </div>
</main>
<!-- End registration form -->