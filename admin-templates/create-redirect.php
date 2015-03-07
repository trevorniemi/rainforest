<div class="row">
    <div class="large-12 columns">
        <a href="<?= SITE_ROOT . "dashboard/admin-tools/url-redirects/"; ?>" class="button small alert">Back To URL
            Redirect List</a>
    </div>
</div>
<div class="row">
    <div class="large-10 columns">
        <h2>Add Redirect</h2>
    </div>
</div>
<form action=""
      method="post" <?php if ($componentPrivileges[0]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>>
    <div class="row">
        <div class="large-12 columns"><label>Old URL</label></div>
        <div class="large-12 columns"><input type="text" name="oldurl" value="<?= SITE_ROOT; ?>" placeholder=""/></div>
    </div>
    <div class="row">
        <div class="large-12 columns"><label>New URL<input type="text" name="newurl" value="<?= SITE_ROOT; ?>"
                                                           placeholder=""/> </label></div>
    </div>

    <div class="row">
        <div class="large-12 columns">
            <input type="submit" class="button small right" value="Submit"/>
        </div>
    </div>
</form>