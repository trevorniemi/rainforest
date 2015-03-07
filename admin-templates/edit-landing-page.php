<div class="row">
    <div class="large-12 columns">
        <a href="<?= SITE_ROOT . "dashboard/pages/"; ?>" class="button small alert">Back To Pages List</a>
    </div>
</div>
<div class="row">
    <div class="large-10 columns">
        <h2>Edit Page</h2>
    </div>
</div>
<form action=""
      method="post" <?php if ($componentPrivileges[3]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>>
    <input type="hidden" name="pageType" value="<?= $pageType; ?>"/>

    <div class="row">
        <div class="large-12 columns"><label>Page Title <input type="text" name="pageName"
                                                               value="<?php echo $pageData[0]['pagetitle']; ?>"/>
            </label></div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label>
                Page Template
                <select class="moduleType" name="pageTemplate">
                    <?php foreach ($pageTemplates as $template) {
                        ?>
                        <option
                            value="<?= $template['template']; ?>" <?php if ($template['template'] == $pageData[0]['template']) { ?> selected <?php } ?>><?= $template['nicename']; ?></option>
                    <?php } ?>
                </select>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns"><input type="checkbox" name="private"
                                             value="1" <?php if ($pageData[0]['private'] == 1) { ?> checked <?php } ?>>
            <label>Private Landing Page (Search engines won't crawl / index private landing pages.) </label></div>
    </div>
    <div class="row">
        <div class="large-12 columns"><label>Page Content <textarea name="pageContent" class="ckeditor"
                                                                    placeholder=""><?php echo $pageData[0]['pagecontent']; ?></textarea>
            </label></div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <input type="submit" class="button small right" style="margin-top: 20px;" value="Submit"/>
        </div>
    </div>
</form>