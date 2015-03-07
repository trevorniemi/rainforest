<div class="row">
    <div class="large-10 columns">
        <a <?php if ($componentPrivileges[0]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>
            href="<?= SITE_ROOT . "dashboard/pages/page-data/" . $curentPageId; ?>" class="button small alert">Back To
            Page Data</a>

        <h2>Edit Page Data Item</h2>
    </div>
</div>
<form action=""
      method="post" <?php if ($componentPrivileges[0]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>>
    <input type="hidden" name="currentPage" id="currentPage" value="<?= $curentPageId; ?>"/>
    <input type="hidden" name="currentModule" id="currentModule" value="<?php if (isset($dataElements[0]['moduleid'])) {
        echo $dataElements[0]['moduleid'];
    } ?>"/>

    <div class="row" style="pointer-events: none; opacity: 0.4;">
        <div class="large-10 columns">
            <label>
                Select Module
                <select name="moduleName" id="selectboxdataid">
                    <option value=""></option>
                    <?php foreach ($moduleList as $module) { ?>
                        <option
                            value="<?= $module['id']; ?>" <?php if (isset($dataElements[0]['moduleid']) && $dataElements[0]['moduleid'] == $module['id']) { ?> selected <?php } ?>><?= $module['name']; ?></option>
                    <?php } ?>
                </select>
            </label>
        </div>
        <div class="large-2 columns">
            <a id="updateRelationship" href="" class="button info tiny" style="margin-top: 22px;">GET DATA</a>
        </div>
    </div>


    <?php if (isset($dataElements[0]['moduleid'])) { ?>
    <div class="row" style="pointer-events: none; opacity: 0.4;">
        <hr/>
        <div class="large-12 columns"><label>Data Item Description <input type="text" name="pageName"
                                                                          value='<?= $dataElements[0]['name']; ?>'/>
            </label></div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <label>Select Data</label>
            <table id="list-modules" class="tablesorter">
                <thead>
                <tr>
                    <th width="30">Select</th>
                    <?php foreach ($moduleFields as $moduleField) { ?>
                        <th width="180"><?= ucfirst($moduleField['label']); ?></th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($moduleItems as $key => $item) {

                    // unset data and media
                    unset($item['media']);
                    unset($item['edit']);
                    ?>
                    <tr>
                        <?php $checked = "";
                        foreach ($dataElements as $element) {
                            if ($element['groupid'] == $item['id']) {
                                $checked = "checked";
                            }
                        } ?>
                        <td class="text-center"><input type="checkbox" value="<?= $item['id']; ?>" <?= $checked; ?>
                                                       name="dataItems[]"/>

                            <?php unset($item['id']);
                            foreach ($item as $key => $data) { ?>
                        <td>
                            <?php

                            echo $data;

                            ?>
                        </td>

                    <?php } ?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <input type="submit" class="button small right" style="margin-top: 20px;" value="Submit"/>
        </div>
    </div>
</form>
<?php } ?>




<script>
    var siteroot = "<?= SITE_ROOT; ?>";
    var currentPage = $("#currentPage").val();
    var moduleRelationship = siteroot + "dashboard/pages/add-page-data/" + currentPage + "/";
    $('#selectboxdataid').on('change', function () {
        var finalUrl = moduleRelationship + this.value;
        $("#updateRelationship").attr("href", finalUrl);

        $('#moduleField')
            .find('option')
            .remove()
            .end();


    });

</script>