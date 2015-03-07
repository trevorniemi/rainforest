<div class="row">
    <div class="large-12 columns">
        <a href="<?= SITE_ROOT . "dashboard/landing-pages/"; ?>" class="button small alert">Back To Landing Pages
            List</a>
    </div>
</div>
<div class="row">
    <div class="large-10 columns">
        <h2>Create Landing Page</h2>
    </div>
</div>
<form action=""
      method="post" <?php if ($componentPrivileges[2]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>>
    <input type="hidden" name="pageType" value="<?= $pageType; ?>"/>

    <div class="row">
        <div class="large-12 columns"><label>Page Title <input type="text" name="pageName" placeholder=""/> </label>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns"><label>Page URL <input type="text" name="pageUrl" placeholder=""/> </label></div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label>
                Page Template
                <select class="moduleType" name="pageTemplate">
                    <?php foreach ($pageTemplates as $template) { ?>
                        <option value="<?= $template['template']; ?>"><?= $template['nicename'] ?></option>
                    <?php } ?>
                </select>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns"><input type="checkbox" name="private" value="1"> <label>Private Landing Page
                (Search engines won't crawl / index private landing pages.) </label></div>
    </div>
    <div class="row">
        <div class="large-12 columns"><label>Page Content <textarea name="pageContent" class="ckeditor"
                                                                    placeholder=""></textarea> </label></div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <input type="submit" class="button small right" style="margin-top: 20px;" value="Submit"/>
        </div>
    </div>
</form>