<div class="row">
    <div class="large-12 columns">
        <h2>Warning</h2>

        <div data-alert class="alert-box info">
            <strong>Deleting this entry is permanent.</strong>
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