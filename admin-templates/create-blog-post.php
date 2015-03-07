<div class="row">
    <div class="large-12 columns">
        <a href="<?= SITE_ROOT . "dashboard/blog-posts/"; ?>" class="button small alert">Back To Blog Post List</a>
    </div>
</div>
<div class="row">
    <div class="large-10 columns">
        <h2>Create Blog Post</h2>
    </div>
</div>
<form action=""
      method="post" <?php if ($componentPrivileges[4]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>>
    <input type="hidden" name="pageType" value="<?= $pageType; ?>"/>

    <div class="row">
        <div class="large-12 columns"><label>Publish Date <input type="text" name="publishDate" class="span2"
                                                                 value="02-16-2012" id="dp1"></label></div>
    </div>
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
        <div class="large-12 columns"><label>Page Content <textarea name="pageContent" class="ckeditor"
                                                                    placeholder=""></textarea> </label></div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <input type="submit" class="button small right" style="margin-top: 20px;" value="Submit"/>
        </div>
    </div>
</form>