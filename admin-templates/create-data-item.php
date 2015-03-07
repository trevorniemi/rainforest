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
        <a href="<?= SITE_ROOT . "dashboard/view-data-list/" . $id ?>" class="button small alert">Back To List</a>

        <h3><?= $moduleData['name']; ?> - Add Item</h3>

        <form action="" method="post">
            <input type="hidden" name="moduleid" value="<?= $moduleData['id']; ?>"/>
            <?php foreach ($moduleFields as $key => $formField) { ?>
                <div class="row">
                    <div class="large-12 columns">
                        <?php if ($formField['type'] != 'image' AND $formField['type'] != 'imagegallery') { ?>
                        <label><?= ucfirst($formField['label']);
                            } ?>
                            <?php if ($formField['type'] == 'textfield') { ?>
                                <input type="text" name="<?= $formField['id']; ?>" placeholder=""/>
                            <?php } else if ($formField['type'] == 'textarea1') { ?>
                                <textarea class="" name="<?= $formField['id']; ?>"></textarea>
                            <?php
                            } else if ($formField['type'] == 'textarea2') { ?>
                                <textarea class="ckeditor" name="<?= $formField['id']; ?>"></textarea>
                            <?php } else if ($formField['type'] == 'relationship') { ?>
                                <input type="hidden" name="relationship_field_id" value="<?= $formField['id']; ?>"/>
                                <input type="hidden" name="relationship_module_id"
                                       value="<?= $formField['module_relationship_id']; ?>"/>
                                <select name="relationshipid">
                                    <option></option>
                                    <?php foreach ($formField['value'] as $dropdownItem) { ?>
                                        <option
                                            value="<?= $dropdownItem['value']; ?>"><?= $dropdownItem['value']; ?></option>
                                    <?php } ?>
                                </select>
                            <?php } else if ($formField['type'] == 'image') { ?>
                            <?php } else if ($formField['type'] == 'imagegallery') { ?>
                            <?php } ?>
                        </label>
                    </div>
                </div>
            <?php } ?>

            <div class="row">
                <div class="large-12 columns">
                    <input type="submit" class="button right" style="margin-top: 20px;" value="Submit"/>
                </div>
            </div>
        </form>
    </div>
</div>