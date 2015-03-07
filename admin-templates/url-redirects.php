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
            href="<?= SITE_ROOT . "dashboard/admin-tools/url-redirects/create-redirect/"; ?>"
            class="button small alert">Add New Redirect</a>

        <h3>URL Redirects</h3>
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
                <th width="50%">Old URL</th>
                <th width="90%">New URL</th>
                <th width="20%">Modify</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($urlRedirects as $redirect) {
                ?>
                <tr> <?php
                    foreach ($redirect as $key => $data) { ?>
                        <td <?php if (($key == 'edit') && $key != '' && $componentPrivileges[0]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;"<?php } ?>>
                            <?php
                            if ($key == 'edit') { ?>
                                <a href="<?= SITE_ROOT . 'dashboard/admin-tools/url-redirects/delete-redirect/' . $data; ?>">Delete</a>
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