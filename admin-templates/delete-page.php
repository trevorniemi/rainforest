<div class="row">
    <div class="large-12 columns">
        <h2>Warning</h2>

        <div data-alert class="alert-box alert">
            <ul style="margin-bottom: 0px; padding-bottom: 0px;">
                <li><strong>Deleting this entry is permanent and will result in a 404 Page Not Found when a visitor
                        accesses this URL directly.</strong></li>
                <li><strong>Removing this URL may also negatively effect your websites Search Engine
                        Optimization.</strong></li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $id; ?>"/>
            <input type="button" class="button small secondary left" onClick="javascript:window.history.back();"
                   value="Cancel" style="margin-right: 15px;"/> <input type="submit" class="button small left"
                                                                       value="Submit"/>
        </form>
    </div>
</div>