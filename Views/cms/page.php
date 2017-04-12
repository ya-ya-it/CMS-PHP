<?php

/**
 * File name: page.php
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: CMS
 * https://comp1006-assignment2.herokuapp.com/
 *
 * This is a php view with the form to create a new page or to edit the existing one.
 */

include_once('Controllers/user.php');
CheckIfAuthenticated();
include_once('Controllers/pages.php');
$pageID = $_GET["pageID"]; // assigns the gameID from the URL
$pages = ReadPage();
if ($pageID == 0) {
    if (count($pages) < 5) {
        $page = null;
        $isAddition = 1;
    } else {
        header('Location: index.php?pageId=list');
    }
} else {
    $isAddition = 0;
    $page = GetPageById($pageID);
}
?>

<!-- Start From -->
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h1>Page Details</h1>
            <form action="index.php?pageId=update" method="post">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="IDTextField" name="IDTextField"
                           placeholder="Page ID" value="<?php echo $page['page_id']; ?>">
                </div>
                <div class="form-group">
                    <label for="TitleTextField">Title</label>
                    <input type="text" class="form-control" id="TitleTextField" name="TitleTextField"
                           placeholder="Title" required value="<?php echo $page['title']; ?>">
                </div>
                <div class="form-group">
                    <label for="BodyTextTextField">Body text</label>
                    <textarea class="form-control" id="BodyTextTextField" name="BodyTextTextField"
                              placeholder="Body Text" required><?php echo $page['body_text']; ?></textarea>
                </div>
                <input type="hidden" name="isAddition" value="<?php echo $isAddition; ?>">
                <button type="submit" id="SubmitButton" class="btn btn-primary">Submit</button>
                <a href="index.php?pageId=list">
                    <input type="button" class="btn btn-warning" value="Cancel"/>
                </a>

            </form>

        </div>
    </div>
</div>
<!-- End form -->