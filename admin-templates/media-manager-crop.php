<script type="text/javascript">

    $(function () {

        $('#cropbox').Jcrop({
            aspectRatio: 1,
            onSelect: updateCoords,
            trueSize: [<?= $size[0]; ?>, <?= $size[1]; ?>]
        });

    });
    function updateCoords(c) {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    }
    ;

    function checkCoords() {
        if (parseInt($('#w').val())) return true;
        alert('Please select a crop region then press submit.');
        return false;
    }
    ;

</script>

<div class="row">
    <div class="large-12 columns">

        <img src="<?= SITE_ROOT . "assets/" . $img; ?>" id="cropbox"/>

        <!-- This is the form that our event handler fills -->
        <form action="" method="post" onsubmit="return checkCoords();">
            <input type="hidden" id="x" name="x"/>
            <input type="hidden" id="y" name="y"/>
            <input type="hidden" id="w" name="w"/>
            <input type="hidden" id="h" name="h"/>
            <input type="hidden" id="originalImage" name="original" value="<?= $img; ?>"/>
            <input type="submit" class="button" value="Crop Image" class="btn btn-large btn-inverse"
                   style="margin-top: 20px;"/>
        </form>
    </div>
</div>