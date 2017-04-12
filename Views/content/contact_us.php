<?php
/**
 * File name: contact_us.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: CMS
 * https://comp1006-assignment2.herokuapp.com/
 *
 * This is a php page with the form that allow user to send email to the admin
 * using SendGrid.
 */

$messages = "";

if (isset($_POST["name"])) {
    $name = $_POST["name"];
    $emailAddress = $_POST["email"];
    $contactNum = $_POST["contactNum"];
    $details = $_POST["details"];

    include_once("Controllers/message.php");

    //show successful/unsuccessful message
    if (ProcessEmail($name, $emailAddress, $contactNum, $details) == 202) {
        $messages = "Message has been sent";
    } else {
        $messages = "Problem sending message";
    }
}
?>

<!-- CONTACT FORM -->
<main class="container">
    <!-- message if error -->
    <?php if ($messages != "") : ?>
        <div class="alert alert-danger"><?php echo $messages ?></div>
    <?php endif ?>
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <h1>Contact Us</h1>
            <form method="post" action="index.php?pageId=contact">
                <fieldset class="form-group">
                    <label for="FullNameTextBox">Full Name:</label>
                    <input type="text" class="form-control" id="FullNameTextBox" name="name"
                           placeholder="Enter Full Name" required>
                </fieldset>
                <fieldset class="form-group">
                    <label for="EmailTextBox">Email:</label>
                    <input type="email" class="form-control" id="EmailTextBox" name="email"
                           placeholder="Enter Your Email" required>
                </fieldset>
                <fieldset class="form-group">
                    <label for="ContactNumberTextBox">Contact Number:</label>
                    <input type="tel" class="form-control" id="ContactNumberTextBox" name="contactNum"
                           placeholder="Enter Your Contact Number" required>
                </fieldset>
                <fieldset class="form-group">
                    <label for="DetailsTextArea">Details:</label>
                    <textarea class="form-control" rows="5" id="DetailsTextArea" name="details"
                              placeholder="Enter Your Message" required></textarea>
                </fieldset>
                <fieldset class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="index.php">
                        <input type="button" class="btn btn-warning" value="Cancel"/>
                    </a>
                </fieldset>
            </form>
        </div>
    </div>
</main>
<!-- END CONTACT FORM -->