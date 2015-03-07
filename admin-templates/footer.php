<script type="text/javascript">
    $(document).foundation();
    $(function () {
        $('#dp1').fdatepicker({
            format: 'mm-dd-yyyy'
        });
        $("table").tablesorter({debug: true});

        var siteroot = "<?= SITE_ROOT; ?>";
        var currentModule = $("#moduleId").val();
        var moduleRelationship = siteroot + "dashboard/edit-module/" + currentModule + "/";
        $('#selectboxid').on('change', function () {
            var finalUrl = moduleRelationship + this.value + "#bottom";
            $("#updateRelationship").attr("href", finalUrl);

            $('#moduleField')
                .find('option')
                .remove()
                .end();


        });

        var theTable = $('table');

        theTable.find("tbody > tr").find("td:eq(1)").mousedown(function () {
            $(this).prev().find(":checkbox").click()
        });

        $("#filter").keyup(function () {
            $.uiTableFilter(theTable, this.value);
        })

        $('#filter-form').submit(function () {
            theTable.find("tbody > tr:visible > td:eq(1)").mousedown();
            return false;
        }).focus(); //Give focus to input field


        CKEDITOR.replace('textarea');

    });

    $(window).bind("load", function () {
        var footer = $("#footer");
        var pos = footer.position();
        var height = $(window).height();
        height = height - pos.top;
        height = height - footer.height();
        if (height > 0) {
            footer.css({
                'margin-top': height + 'px'
            });
        }
    });
</script>
<div id="footer" style="background: #111; color: #fff; padding-left: 10px;">
    <small>Version 1.0.0 Rainforest | Data delivered in <?= $total_time; ?> seconds</small>
</div>
<div id="bottom"></div>
</body>

</html>