<div class="row">
    <div class="large-12 columns">
        <a href="<?= SITE_ROOT . "dashboard/admin-tools/analytics/"; ?>" class="button small alert">Back To Analytics List</a>
    </div>
</div>
<div class="row">
    <div class="large-10 columns">
        <h2>Add Analytics</h2>
    </div>
</div>
<form action=""
      method="post" <?php if ($componentPrivileges[0]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>>
    <div class="row">
        <div class="large-12 columns"><label>Name <input type="text" name="analyticsName" placeholder=""/> </label>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns"><label>Description <textarea name="analyticsDesc"></textarea> </label></div>
    </div>
    <div class="row">
        <div class="large-12 columns"><label>Script <textarea name="analyticsScript" class=""></textarea> </label></div>
    </div>

    <div class="row">
        <div class="large-12 columns">
            <input type="submit" class="button small right" value="Submit"/>
        </div>
    </div>
</form>