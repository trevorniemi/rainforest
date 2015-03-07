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
        <h3>Site Languages</h3>

        <div class="panel">
            <form action="" method="post">
                <div class="row">
                    <div class="large-12 columns"><label>Languages </label> <br/></div>
                </div>
                <div class="row">
                    <div class="large-12 columns"><input type="checkbox" name="English"
                                                         value="en" <?php if (isset($siteLanguages['en']['status']) && $siteLanguages['en']['status'] == 1) { ?> checked <?php } ?>>
                        English
                    </div>
                </div>
                <div class="row">
                    <div class="large-12 columns"><input type="checkbox" name="French"
                                                         value="fr" <?php if (isset($siteLanguages['fr']['status']) && $siteLanguages['fr']['status'] == 1) { ?> checked <?php } ?>>
                        French
                    </div>
                </div>
                <div class="row">
                    <div class="large-12 columns"><input type="checkbox" name="Spanish"
                                                         value="es" <?php if (isset($siteLanguages['es']['status']) && $siteLanguages['es']['status'] == 1) { ?> checked <?php } ?>>
                        Spanish
                    </div>
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