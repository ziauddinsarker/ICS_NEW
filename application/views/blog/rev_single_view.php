<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <caption>List Data</caption>
        <thead>
        <tr>
            <th width="80px">ID</th>
            <th>Title</th>
            <th>Description</th>
            <th width="80px">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($posts == NULL) {
            ?>
            <div class="alert alert-info" role="alert">Data Not Found</div>
            <?php
        } else {
        foreach ($posts as $row) {
        ?>
        <tr>
            <td><?php echo $row->just_id; ?></td>
            <td><?php echo $row->just_post_title; ?></td>
            <td><?php echo $row->just_post_description; ?></td>
            <td>
                <a href="<?php echo site_url('just_post/edit/' . $row->just_id); ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit</a>
                <a href="<?php echo site_url('just_post/delete/' . $row->just_id); ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete</a>
                <a href="<?php echo site_url('just_post/single_post/' . $row->url_slug); ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>view</a>
                <a href="<?php echo site_url('just_post/rev_single_post/' . $row->url_slug); ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>view</a>
            </td>
            <?php
            }
            }
            ?>
        </tr>
        </tbody>
    </table>



</div>