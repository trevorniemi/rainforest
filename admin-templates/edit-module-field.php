<div class="row">
    <div class="large-12 columns">
        <h3>Modify Field</h3>

        <p>You can change other field attributes by deleting the field and re-creating it or by contact your
            administrator.</p>

        <div class="panel">
            <form action="" method="post">
                <div class="row">
                    <div class="large-12 columns"><label>Field Label <input type="text" name="fieldName"
                                                                            value="<?= $label; ?>" placeholder=""/>
                        </label></div>
                </div>
                <div class="row">
                    <div class="large-12 columns"><label>Field Description <textarea name="fieldDesc" class="ckeditor"
                                                                                     placeholder=""><?= $desc; ?></textarea>
                        </label></div>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        <input type="submit" class="button small right" style="margin-top: 20px;" value="Submit"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>