<div class="row">
    <div class="large-12 columns">
        <h2>Warning</h2>

        <div data-alert class="alert-box info">
            <strong><?php echo $moduleFields; ?> module fields will be affected by this change. These changes are
                permanent.</strong>
        </div>
        <div data-alert class="alert-box info">
            <strong><?php echo $moduleItems; ?> module items will be affected by this change. These changes are
                permanent.</strong>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <form action="" method="post">
            <input type="hidden" name="moduleId" value="<?= $id; ?>"/>
            <input type="button" class="button small secondary left" onClick="javascript:window.history.back();"
                   value="Cancel" style="margin-right: 15px;"/> <input type="submit" class="button small left"
                                                                       value="Submit"/>
        </form>
    </div>
</div>