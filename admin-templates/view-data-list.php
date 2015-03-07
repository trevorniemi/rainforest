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
        <a <?php if ($componentPrivileges[3]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>
            href="<?= SITE_ROOT . "dashboard/add-data-item/" . $id ?>" class="button small alert">Add New Item</a>
        <a <?php if ($componentPrivileges[2]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>
            href="<?= SITE_ROOT . "dashboard/edit-module/" . $id ?>" class="button small">Manage Module Fields</a>

        <h3><?= $moduleData['name']; ?> Module Items</h3>

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
                <?php foreach ($moduleFields as $moduleField) { ?>
                    <th width="<?php echo($moduleFields % 100) ?>%"><?= ucfirst($moduleField['label']); ?></th>
                <?php } ?>
                <th width="<?php echo($moduleFields % 100) ?>%">Images</th>
                <th width="<?php echo($moduleFields % 100) ?>%">Modify</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($moduleItems as $item) {
                ?>
                <tr> <?php
                    foreach ($item as $key => $data) { ?>
                        <td <?php if (($key == 'edit' OR $key == 'media') && $key != '' && $componentPrivileges[4]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;"<?php } ?>>
                            <?php if ($key == 'edit' && $key != '') {
                                echo '<a href="' . SITE_ROOT . 'dashboard/edit-data-item/' . $data . '">Edit</a> | <a href="' . SITE_ROOT . 'dashboard/delete-data-item/' . $data . '" onclick="return confirmDelete()">Delete</a>';
                            } else if ($key == 'media' && $key != '') {
                                echo '<a href="' . SITE_ROOT . 'dashboard/manage-media/' . $moduleData['id'] . '/' . $data . '">Manage</a>';
                            } else {
                                echo $data;
                            } ?>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>