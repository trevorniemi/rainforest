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
    <div class="large-12 columns">
        <a <?php if ($componentPrivileges[0]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>
            href="<?= SITE_ROOT . "dashboard/users/add-user"; ?>" class="button small alert">Add User</a>
    </div>
</div>
<div class="row">
    <div class="large-10 columns">
        <h2>Users</h2>
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
                <th width="50%">Name</th>
                <th width="15%" class="text-center">Email</th>
                <th width="15%" class="text-center">Department</th>
                <th width="15%" class="text-center">Edit</th>
                <th width="15%" class="text-center">Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?= $user['name'] ?></td>
                    <td class="text-center"><?= $user['email']; ?></td>
                    <td class="text-center"><?= $user['department'] ?></td>
                    <td <?php if ($componentPrivileges[1]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>
                        class="text-center"><a href="edit-user/<?= $user['id'] ?>">Edit</a></td>
                    <td <?php if ($componentPrivileges[1]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>
                        class="text-center"><?php if ($userId != $user['id']) { ?><a
                            href="delete-user/<?= $user['id'] ?>">Remove</a> <?php } ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>