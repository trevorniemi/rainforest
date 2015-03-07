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
        <h2><?= $moduleData['name']; ?></h2>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <a href="<?= SITE_ROOT . "dashboard/view-data-list/" . $moduleData['id'] ?>" class="button small alert">View
            Module Data</a>

        <h3>Module Fields</h3>

        <form action="" method="post">
            <input type="hidden" name="updateshowhide" value="1"/>
            <table id="list-modules" class="tablesorter" style="width: 100%;">
                <thead>
                <tr>
                    <th width="100" class="text-center">Label</th>
                    <th width="100" class="text-center">Type</th>
                    <th width="300">Desc</th>
                    <th width="100" class="text-center">Show In List View</th>
                    <th width="60" class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($moduleFields as $key => $field) { ?>
                    <tr>
                        <td class="text-center"><?= $field['label'] ?></td>
                        <td class="text-center"><?php if ($field['type'] == 'textarea1') {
                                echo 'textarea basic';
                            } else if ($field['type'] == 'textarea2') {
                                echo 'textarea advanced';
                            } else {
                                echo $field['type'];
                            } ?></td>
                        <td><?= $field['desc'] ?></td>
                        <td class="text-center"><input type="radio" name="<?= $field['id']; ?>"
                                                       value="1" <?php if ($field['show_in_list'] == '1') {
                                echo 'checked';
                            } ?> /> Yes <input type="radio" name="<?= $field['id']; ?>"
                                               value="0" <?php if ($field['show_in_list'] == '0') {
                                echo 'checked';
                            } ?> /> No
                        </td>
                        <td class="text-center"><a
                                href="<?= SITE_ROOT . 'dashboard/edit-module/' . $moduleData['id'] . '/edit-field/' . $field['id']; ?>">Edit</a>
                            | <a
                                href="<?= SITE_ROOT . 'dashboard/edit-module/' . $moduleData['id'] . '/delete-field/' . $field['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <input type="submit" value="Update" class="button tiny right" style='margin-right: 15px;'/>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        <h3>Add Field</h3>

        <form action="" method="post">
            <input type="hidden" name="moduleId" value="<?= $moduleData['id']; ?>"/>

            <div class="row">
                <div class="large-12 columns">
                    <label>
                        Field Type
                        <select class="moduleType" name="moduleType">
                            <option value="textfield">Textfield</option>
                            <option value="textarea1">Textarea Basic</option>
                            <option value="textarea2">Textarea Advanced [WYSIWYG Editor]</option>
                            <option value="image">Single Image</option>
                            <option value="imagegallery">Image Group / Gallery</option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns"><label>Field Label <input type="text" name="moduleLabel" placeholder=""/>
                    </label></div>
            </div>
            <div class="row">
                <div class="large-12 columns"><label>Field Data Name [No Spaces] <input type="text" name="moduleName"
                                                                                        placeholder=""/> </label></div>
            </div>
            <div class="row">
                <div class="large-12 columns"><label><input name="show_in_list" class="show_in_list" value="1" checked
                                                            type="checkbox"/> Show In List </label></div>
            </div>
            <div class="row">
                <div class="large-12 columns"><label>Field Description <textarea name="moduleDesc" class="ckeditor"
                                                                                 placeholder=""></textarea> </label>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                    <input type="submit" class="button right" value="Submit" style="margin-top: 20px;"/>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        <h3>Build A Module Relationship</h3>

        <form action="" method="post">
            <input type="hidden" name="moduleId" id="moduleId" value="<?= $moduleData['id']; ?>"/>
            <input type="hidden" name="moduleType" id="moduleType" value="relationship"/>
            <?php if (isset($relationshipFields)) { ?>
                <div class="row">
                    <div class="large-10 columns"><label>Input Label <input type="text" name="relationshipLabel"
                                                                            placeholder=""/> </label></div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="large-10 columns">
                    <label>
                        Select Module
                        <select name="moduleName" id="selectboxid">
                            <option value=""></option>
                            <?php foreach ($moduleList as $module) { ?>

                                <?php if ($module['id'] != $moduleData['id']) { ?>
                                    <option value="<?= $module['id']; ?>"
                                            <?php if (isset($relationshipModuleData['id']) && $relationshipModuleData['id'] == $module['id']) { ?>selected<?php } ?>><?= $module['name']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </label>
                </div>
                <div class="large-2 columns">
                    <a id="updateRelationship"
                       href="<?= SITE_ROOT . 'dashboard/edit-module/' . $moduleData['id'] . '/'; ?><?php if (isset($relationshipModuleData['id']) && $relationshipModuleData['id'] != '') {
                           echo $relationshipModuleData['id'];
                       } ?>#bottom" class="button info tiny" style="margin-top: 22px;">GET FIELDS</a>
                </div>
            </div>
            <?php if (isset($relationshipFields)) { ?>
                <div class="row">
                    <div class="large-10 columns">
                        <label>
                            Module Field
                            <select name="moduleField" id="moduleField">
                                <?php foreach ($relationshipFields as $relationField) { ?>
                                    <option
                                        value="<?= $relationField['id']; ?>"><?= $relationField['label']; ?></option>
                                <?php } ?>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="large-10 columns"><label>Field Description <textarea name="desc"
                                                                                     placeholder=""></textarea> </label>
                    </div>
                </div>
                <div class="row">

                    <div class="large-12 columns">
                        <input type="submit" class="button right" value="Submit"/>
                    </div>
                </div>
            <?php } ?>
        </form>
    </div>

</div>

<script>


    $('.moduleType').on('change', function (e) {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        if (valueSelected == 'textarea2' || valueSelected == 'image' || valueSelected == 'imagegallery') {
            // disable Show In List
            $('.show_in_list').attr('checked', false);
            $('.show_in_list').attr('disabled', true);
        } else {
            $('.show_in_list').attr('checked', true);
            $('.show_in_list').attr('disabled', false);
        }
    });


</script>
    