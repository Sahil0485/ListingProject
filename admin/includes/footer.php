<div class="col-sm-12">
    <div class="footer">
        <!-- <p>© 2018 AxilBoard by <a href="#">codepassenger</a></p> -->
        <div class="pull-right hidden-xs">
            <b>Version</b> 8.2 Core Php
        </div>
        <strong>Copyright &copy; 2017, Yellow Pages Developed By
            <a href="http://www.firstpointwebdesign.com/" target="_blank">First Point Creation</a>
        </strong> All Rights Reserved
    </div>
</div>
</div>
</div>
</div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/tether.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-toggle.min.js"></script>
<script src="assets/js/bootstrap-formhelpers.min.js"></script>
<script src="assets/js/bootstrap-formhelpers-languages.js"></script>
<script src="assets/js/mdb.min.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script>
<script src="assets/js/validator.min.js"></script>
<script src="assets/js/jquery.inputmask.bundle.min.js"></script>
<script src="assets/js/jquery-tree-view.js"></script>
<script src="assets/js/jquery.uploadfile.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery.simpleWeather.min.js"></script>
<script src="assets/js/tinymce/tinymce.min.js"></script>
<script src="assets/js/fullcalendar/moment.min.js"></script>
<script src="assets/js/fullcalendar/fullcalendar.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/lobipanel.min.js"></script>
<script src="assets/js/jquery.steps.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>

<!-- Material-JS -->
<script src="assets/js/material.min.js"></script>
<script src="assets/js/ripples.min.js"></script>

<!-- Responsive Mobile Menu -->
<script src="assets/js/responsive-menu/jquery.accordion.js"></script>

<!-- Data-Table-JS -->
<script src="assets/js/datatable/jquery.dataTables.min.js"></script>
<script src="assets/js/datatable/dataTables.bootstrap.min.js"></script>
<script src="assets/js/datatable/dataTables.select.min.js"></script>
<script src="assets/js/datatable/dataTables.buttons.min.js"></script>
<script src="assets/js/datatable/buttons.flash.min.js"></script>
<script src="assets/js/datatable/jszip.min.js"></script>
<script src="assets/js/datatable/vfs_fonts.js"></script>
<script src="assets/js/datatable/buttons.html5.min.js"></script>
<script src="js/datatable-custom.js"></script>

<!-- Chart-JS -->
<script src="assets/js/chart/Chart.bundle.min.js"></script>
<script src="js/chart-custom.js"></script>

<!-- Counter-Up-JS -->
<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>

<!-- Emoji-JS -->
<script src="assets/js/emoji/config.js"></script>
<script src="assets/js/emoji/util.js"></script>
<script src="assets/js/emoji/jquery.emojiarea.js"></script>
<script src="assets/js/emoji/emoji-picker.js"></script>

<!-- Vector-Map-Ammap-JS -->
<script src="assets/js/ammap/ammap.js"></script>
<script src="assets/js/ammap/worldLow.js"></script>
<script src="assets/js/ammap/black.js"></script>

<script src="js/custom.js"></script>
<script>
    AmCharts.theme = AmCharts.themes.black;
    AmCharts.ready(function () {
        var map = new AmCharts.AmMap();
        var dataProvider = {
            mapVar: AmCharts.maps.worldLow,
            getAreasFromMap: true,
            areas: [
                { "id": "AU", "color": "#ff7979" },
                { "id": "US", "color": "#83e9d2" },
                { "id": "RS", "color": "#83e9d2" },
                { "id": "RU", "color": "#83e9d2" },
                { "id": "CA", "color": "#ff7979" },
                { "id": "BR", "color": "#ffce2e" },
                { "id": "MX", "color": "#ffce2e" },
                { "id": "AR", "color": "#ffce2e" },
                { "id": "CO", "color": "#ffce2e" },
                { "id": "PE", "color": "#ffce2e" },
                { "id": "EC", "color": "#ffce2e" },
                { "id": "CU", "color": "#ffce2e" },
                { "id": "HA", "color": "#ffce2e" },
                { "id": "CL", "color": "#ffce2e" },
                { "id": "PY", "color": "#ffce2e" },
                { "id": "UY", "color": "#ffce2e" },
                { "id": "BO", "color": "#ffce2e" },
                { "id": "FK", "color": "#ffce2e" },
                { "id": "VE", "color": "#ffce2e" },
                { "id": "GT", "color": "#ffce2e" },
                { "id": "HN", "color": "#ffce2e" },
                { "id": "MX", "color": "#ffce2e" },
                { "id": "GY", "color": "#ffce2e" },
                { "id": "HT", "color": "#ffce2e" },
                { "id": "SR", "color": "#ffce2e" },
                { "id": "GF", "color": "#ffce2e" },
                { "id": "DO", "color": "#ffce2e" },
                { "id": "JM", "color": "#ffce2e" },
                { "id": "CR", "color": "#ffce2e" },
                { "id": "NI", "color": "#ffce2e" },
                { "id": "SV", "color": "#ffce2e" },
                { "id": "PA", "color": "#ffce2e" },
                { "id": "BZ", "color": "#ffce2e" },
                { "id": "SJ", "color": "#ffce2e" },
                { "id": "NO", "color": "#ffce2e" },
                { "id": "SE", "color": "#ffce2e" },
                { "id": "FI", "color": "#ffce2e" },
            ]
        };
        map.dataProvider = dataProvider;
        map.areasSettings = {
            autoZoom: true,
            rollOverBrightness: 10,
            selectedBrightness: 20,
            selectedColor: "#5eb7ff"
        };
        map.write("vectorWorldMap");
    });
</script>
</body>

</html>
<?php ob_end_flush();?>