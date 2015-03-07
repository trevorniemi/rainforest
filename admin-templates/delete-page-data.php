<div class="row">
    <div class="large-12 columns">
        <h2>Warning</h2>

        <div data-alert class="alert-box alert">
            <ul style="margin-bottom: 0px; padding-bottom: 0px;">
                <li><strong>Deleting this data set is permanent.</strong></li>
                <li><strong>If the page template is currently using this data you will be causing a fatal error on that
                        page until the data attributes are re-created or removed from the template file
                        completely.</strong></li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $dataId; ?>"/>
            <input type="button" class="button small secondary left" onClick="javascript:window.history.back();"
                   value="Cancel" style="margin-right: 15px;"/> <input type="submit" class="button small left"
                                                                       value="Submit"/>
        </form>
    </div>
</div>