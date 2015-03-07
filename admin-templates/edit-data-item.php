<?php if (isset($flash['message'])) { ?>
    <div class="row">
        <div class="large-12 columns">
            <div data-alert class="alert-box success radius">
                <?php echo $flash['message']; ?>
            </div>
        </div>
    </div>
<?php } ?>
<div class="row">
    <div class="large-12 columns">
        <a href="<?= SITE_ROOT . "dashboard/view-data-list/" . $moduleData['id'] ?>" class="button small alert">Back To
            List</a>

        <h3>Edit Item</h3>

        <form action="" method="post">
            <input type="hidden" name="moduleid" value="<?= $moduleData['id']; ?>"/>
            <?php foreach ($moduleFields as $formField) { ?>
                <div class="row">
                    <div class="large-12 columns"><label><?= $formField['label']; ?>
                            <?php if ($formField['type'] == 'textfield') { ?>
                                <input type="text" name="<?= $formField['id']; ?>"
                                       value="<?= $moduleItem[0][$formField['id']]; ?>" placeholder=""/>
                            <?php } else if ($formField['type'] == 'textarea1') { ?>
                                <textarea class=""
                                          name="<?= $formField['id']; ?>"><?= $moduleItem[0][$formField['id']]; ?></textarea>
                            <?php } else if ($formField['type'] == 'textarea2') { ?>
                                <textarea class="ckeditor"
                                          name="<?= $formField['id']; ?>"><?= $moduleItem[0][$formField['id']]; ?></textarea>
                            <?php } else if ($formField['type'] == 'relationship') { ?>
                                <input type="hidden" name="relationship_field_id" value="<?= $formField['id']; ?>"/>
                                <input type="hidden" name="relationship_module_id"
                                       value="<?= $formField['module_relationship_id']; ?>"/>
                                <select name="relationshipid">
                                    <option></option>
                                    <?php foreach ($formField['value'] as $dropdownItem) { ?>
                                        <option value="<?= $dropdownItem['value']; ?>"
                                                <?php if (isset($moduleItem[0][$formField['id']]) && $moduleItem[0][$formField['id']] == $dropdownItem['value']) { ?>selected<?php } ?>><?= $dropdownItem['value']; ?></option>
                                    <?php } ?>
                                </select>
                            <?php } ?>
                        </label></div>
                </div>
            <?php } ?>

            <div class="row">
                <div class="large-12 columns">
                    <input type="submit" class="button right" value="Submit" style="margin-top: 20px;"/>
                </div>
            </div>
        </form>
    </div>
</div>