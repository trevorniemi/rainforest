<?php if (isset($flash['message'])) { ?>
    <div class="row">
        <div class="large-12 columns">
            <div data-alert class="alert-box success radius">
                <?php echo $flash['message']; ?>
            </div>
        </div>
    </div>
<?php } ?>
<div class="row">
    <div class="large-10 columns">
        <a <?php if ($componentPrivileges[4]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>
            href="<?= SITE_ROOT . "dashboard/blog-posts/add-page-item/"; ?>" class="button small alert">Add New Blog
            Post</a>

        <h3>Blog Posts</h3>

    </div>
    <div class="large-2 columns right">
        <form id="filter-form"><input name="filter" id="filter" class="small" placeholder="Filter" type="text"
                                      style="margin-top: 65px;"></form>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <table id="list-modules" class="tablesorter">
            <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="10%">Date</th>
                <th width="40%">Page Title</th>
                <th width="30%">Page URL</th>
                <th width="40%">Modify</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($pages as $page) {
                ?>
                <tr> <?php
                    foreach ($page as $key => $data) { ?>
                        <td <?php if (($key == 'edit') && $key != '' && $componentPrivileges[5]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;"<?php } ?>>
                            <?php
                            if ($key == 'edit') { ?>
                                <a href="<?= SITE_ROOT . 'dashboard/blog-posts/edit-page-item/' . $data; ?>">Edit</a> |
                                <a href="<?= SITE_ROOT . 'dashboard/blog-posts/delete-page-item/' . $data; ?>">Delete</a>
                            <?php } else if ($key == 'url') { ?>
                                <a href="<?= SITE_ROOT . ltrim($data, '/'); ?>" target="_blank"><?= $data; ?></a>
                            <?php } else {
                                echo $data;
                            }
                            ?>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
