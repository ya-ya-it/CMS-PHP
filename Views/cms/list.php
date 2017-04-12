<?php
include_once('Controllers/user.php');
CheckIfAuthenticated();
require_once('Controllers/pages.php');
$pages = ReadPage();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Pages List</h1>

            <?php if(count($pages) < 5) : ?>
            <a class="btn btn-primary" href="index.php?pageId=page&pageID=0">
                <i class="fa fa-plus"></i> Add New Page</a>

            <?php endif ?>
            <br>
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th>Title</th>
                    <th>Body Text</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach($pages as $page) : ?>
                    <tr>
                        <td><?php echo $page['title'] ?></td>
                        <td><?php echo $page['body_text'] ?></td>

                        <td><a class="btn btn-primary" href="index.php?pageId=page&pageID=<?php echo $page['page_id'] ?>">
                                <i class="fa fa-pencil-square-o"></i> Edit</a></td>

                        <td><a class="btn btn-danger" href="index.php?pageId=delete&pageID=<?php echo $page['page_id'] ?>">
                                <i class="fa fa-trash-o"></i> Delete</a></td>

                        <td><a class="btn btn-warning" href="index.php?pageId=template&pageID=<?php echo $page['page_id'] ?>">View</a></td>
                    </tr>
                <?php endforeach; ?>

            </table>

        </div>
    </div>
</div>