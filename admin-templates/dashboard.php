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
        <h2>Modules</h2>
    </div>
    <div class="large-2 columns">
        <form id="filter-form"><input name="filter" id="filter" class="small" placeholder="Filter" type="text"></form>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <table id="list-modules" class="tablesorter" width="100%">
            <thead>
            <tr>
                <th width="50%">Module</th>
                <th width="15%" class="text-center">Items</th>
                <th width="15%" class="text-center">Data</th>
                <th width="15%" class="text-center">Manage</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($modules as $module) { ?>
                <tr>
                    <td><?= $module['name'] ?></td>
                    <td class="text-center"><?= $module['count']; ?></td>
                    <td class="text-center"><a href="view-data-list/<?= $module['id'] ?>">View</a></td>
                    <td class="text-center">
                        <a <?php if ($componentPrivileges[2]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>
                            href="edit-module/<?= $module['id'] ?>">Edit</a> |
                        <a <?php if ($componentPrivileges[2]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>
                            href="delete-module/<?= $module['id'] ?>">Delete</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div
    class="row" <?php if ($componentPrivileges[0]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>>
    <div class="large-12 columns">
        <h3>Create A Module</h3>

        <div class="panel">
            <form action="" method="post">
                <div class="row">
                    <div class="large-12 columns"><label>Module Name <input type="text" name="moduleName"
                                                                            placeholder=""/> </label></div>
                </div>
                <div class="row">
                    <div class="large-12 columns"><label>Module Description <textarea name="moduleDesc" class="ckeditor"
                                                                                      placeholder=""></textarea>
                        </label></div>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        <input type="submit" class="button small right" style="margin-top: 20px;" value="Submit"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
