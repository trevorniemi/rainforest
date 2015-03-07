<?php if (isset($flash['message'])) { ?>
    <div class="row">
        <div class="large-12 columns">
            <div data-alert class="alert-box success radius">
                <?php echo $flash['message']; ?>
            </div>
        </div>
    </div>
<?php } ?>
<div
    class="row" <?php if ($componentPrivileges[0]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>>
    <div class="large-12 columns">
        <h2>Image Upload </h2>

        <form action="" enctype="multipart/form-data" method="post">
            <input type="file" name="uploads[]" multiple="multiple" style="padding: 10px;"/><br/>
            <input type="submit" class="button tiny" value="Upload Now"/>
        </form>
        <hr/>
    </div>
</div>

<div class="row" data-equalizer>
    <div class="large-12 columns">
        <h3>Media Manager</h3>

        <ul class="clearing-thumbs clearing-feature small-block-grid-4" data-equalizer>
            <?php foreach ($images as $image) { ?>

                <li style="text-align: center;">
                    <div class="panel"><a class="th" href="<?= SITE_ROOT . $image; ?>"><img data-caption=""
                                                                                            style="height: 170px; text-align: center;"
                                                                                            src="<?= SITE_ROOT . $image; ?>"></a>

                        <p class="text-center" style="line-height: 10px; margin-top: 3px;">
                            <small><?= str_replace('assets/', '', $image); ?></small>
                        </p>
                        <p class="text-center" style="line-height: 10px; margin-top: 3px;">
                            <small><a
                                    href="<?= SITE_ROOT . 'dashboard/media-manager/crop/'; ?><?= str_replace('assets/', '', $image); ?>"
                                    class="button tiny">CROP</a> <a
                                    href="<?= SITE_ROOT . 'dashboard/media-manager/delete/'; ?><?= str_replace('assets/', '', $image); ?>"
                                    class="button alert tiny" style="">DELETE</a></small>
                        </p>
                    </div>
                </li>

            <?php } ?>
        </ul>

    </div>
</div>