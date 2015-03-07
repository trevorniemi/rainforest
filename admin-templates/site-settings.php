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
        <h3>Site Settings</h3>

        <div class="panel">
            <form action="" method="post">
                <div class="row">
                    <div class="large-12 columns"><label>Site Name <input type="text" name="siteName"
                                                                          value="<?= $siteName; ?>" placeholder=""/>
                        </label></div>
                </div>
                <div class="row">
                    <div class="large-12 columns"><label>Site Description <textarea name="siteDesc" rows="10"
                                                                                    placeholder=""><?= $siteDesc; ?></textarea>
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