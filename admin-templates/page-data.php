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
        <a <?php if ($componentPrivileges[0]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>
            href="<?= SITE_ROOT . "dashboard/pages/add-page-data/" . $curentPageId; ?>" class="button small alert">Add
            New Data Item</a> <a href="<?= SITE_ROOT . "dashboard/pages/"; ?>" class="button small">Back To Pages</a>

        <h3>Pages Data</h3>

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
                <th width="50">ID</th>
                <th width="400">Name</th>
                <th width="400">Group ID</th>
                <th width="400">Module ID</th>
                <th width="150">Modify</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($pageData as $page) {
                ?>
                <tr> <?php
                    foreach ($page as $key => $data) { ?>
                        <td <?php if (($key == 'edit') && $key != '' && $componentPrivileges[1]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;"<?php } ?>>
                            <?php
                            if ($key == 'edit') { ?>
                                <a href="<?= SITE_ROOT . 'dashboard/pages/edit-page-data/' . $curentPageId . '/' . $data; ?>">Edit</a> |
                                <a href="<?= SITE_ROOT . 'dashboard/pages/delete-page-data/' . $data; ?>">Delete</a>
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