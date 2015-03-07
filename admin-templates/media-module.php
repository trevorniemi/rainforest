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

        <?php foreach ($moduleFields as $formField) { ?>
        <?php if ($formField['type'] == 'image') { ?>
        <form action="" method="post">
            <div class="row">
                <input type="hidden" name="image" value="1"/>

                <div class="large-12 columns"><h4><?= $formField['label']; ?> </h4>

                    <div class="panel"><h5>Current Image</h5>
                        <?php if (isset($moduleItem[0][$formField['id']]) && $moduleItem[0][$formField['id']] != '') { ?>
                            <img
                            style="margin-left: 10px; height: 170px; text-align: center; border: 4px solid #d0d0d0; background: #f0f0f0;"
                            src="<?php echo SITE_ROOT . '/assets/' . $moduleItem[0][$formField['id']]; ?>" /><?php } ?>
                    </div>
                    <?php if ($formField['type'] == 'image') { ?>
                        <select name="<?= $formField['id']; ?>" class="image-picker show-html">
                            <option></option>
                            <?php foreach ($images as $image) { ?>
                                <?php $cleanImage = str_replace('uploads/', '', $image); ?>
                                <option  <?php if (isset($moduleItem[0][$formField['id']]) && $moduleItem[0][$formField['id']] == $cleanImage) { ?> selected <?php } ?>
                                    data-img-src="<?= SITE_ROOT . $image; ?>"
                                    value="<?= str_replace('assets/', '', $image); ?>"><?= $image; ?></option>

                            <?php } ?>
                        </select>
                    <?php } ?>
                </div>
            </div> <?php } ?>
            <?php if ($formField['type'] == 'image') { ?>
            <div class="row">
                <div class="large-12 columns">
                    <input type="submit" class="button right" value="Update" style="margin-top: 20px;"/>
                </div>
            </div>
        </form>
    <hr/>
    <?php } ?>

        <?php if ($formField['type'] == 'imagegallery') { ?>
        <div class="row">
            <form action="" method="post">
                <input type="hidden" name="imagegallery" value="1"/>

                <div class="large-12 columns"><h4><?= $formField['label']; ?> </h4>

                    <div class="panel"><h5>Current Images</h5>
                        <?php foreach ($moduleGallery[$formField['id']] as $image) { ?> <img
                            style="margin-left: 10px; height: 170px; text-align: center; border: 4px solid #d0d0d0; background: #f0f0f0; margin-bottom: 15px;"
                            src="<?php echo SITE_ROOT . '/uploads/' . $image['value']; ?>"/> <?php } ?>
                    </div>
                    <?php if ($formField['type'] == 'imagegallery') { ?>
                        <select multiple="multiple" name="<?= $formField['id']; ?>[]" class="image-picker show-html">
                            <option></option>
                            <?php foreach ($images as $image) {
                                $cleanImage = str_replace('uploads/', '', $image);
                                $selected = false;
                                foreach ($moduleGallery[$formField['id']] as $currentImage) {

                                    if ($currentImage['value'] == $cleanImage) {
                                        $selected = true;
                                    }
                                } ?>
                                <option  <?php if ($selected == true) { ?> selected <?php } ?>
                                    data-img-src="<?= SITE_ROOT . $image; ?>"
                                    value="<?= str_replace('uploads/', '', $image); ?>"><?= $image; ?></option>


                            <?php } ?>
                        </select>
                    <?php } ?>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        <input type="submit" class="button right" value="Submit" style="margin-top: 20px;"/>
                    </div>
                </div>
            </form>
            <?php } ?>
            <?php } ?>
        </div>

    </div>
</div>
</div>
<script>
    $("select").imagepicker({})
</script>