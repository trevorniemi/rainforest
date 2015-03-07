<div class="row">
    <div class="large-12 columns">
        <a href="<?= SITE_ROOT . "dashboard/admin-tools/templates/"; ?>" class="button small alert">Back To Template
            List</a>
    </div>
</div>
<div class="row">
    <div class="large-10 columns">
        <h2>Add Template</h2>
    </div>
</div>
<form action=""
      method="post" <?php if ($componentPrivileges[0]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>>
    <div class="row">
        <div class="large-12 columns"><label>Template Name <input type="text" name="templateName" placeholder=""/>
            </label></div>
    </div>
    <div class="row">
        <div class="large-12 columns"><label>Template File <input type="text" name="templateFile" placeholder=""/>
            </label></div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label>
                Page Type
                <select class="moduleType" name="templateType">
                    <?php foreach ($templates as $template) { ?>
                        <option value="<?= $template['type']; ?>"><?= $template['type'] ?></option>
                    <?php } ?>
                </select>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <input type="submit" class="button small right" value="Submit"/>
        </div>
    </div>
</form>