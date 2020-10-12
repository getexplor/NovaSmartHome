<footer class="footer">
    <div class="footer__block block no-margin-bottom">
        <div class="container-fluid text-center">
            <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            <p class="no-margin-bottom">2020 &copy; Nova Smart Home. Design by <a href="#">Agung Ramadhan Aghnaddinar</a>.</p>
        </div>
    </div>
</footer>
</div>
</div>

<!-- JavaScript files-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/popper.js/umd/popper.min.js"> </script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/charts-home.js"></script>
<script src="<?= base_url('assets/'); ?>js/front.js"></script>
<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

<!-- js toggle -->
<script src="<?= base_url('assets/'); ?>doc/script.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap4-toggle.js"></script>

</body>
<!-- start temperature chart -->
<script>
    var legendState = true;
    if ($(window).outerWidth() < 576) {
        legendState = false;
    }

    var LINECHART = $('#TempChart');
    var myLineChart = new Chart(LINECHART, {
        type: 'line',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        max: 60,
                        min: 10
                    },
                    display: true,
                    gridLines: {
                        display: false
                    }
                }]
            },
            legend: {
                display: legendState
            }
        },
        data: {
            labels: [
                <?php
                if (count($graph) > 0) {
                    foreach ($graph as $data) {
                        echo "'" . $data->time . "',";
                    }
                }
                ?>
            ],
            datasets: [{
                label: "Temperature",
                fill: true,
                lineTension: 0.2,
                backgroundColor: "transparent",
                borderColor: "#EF8C99",
                pointBorderColor: '#EF8C99',
                pointHoverBackgroundColor: "#EF8C99",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                borderWidth: 2,
                pointBackgroundColor: "#fff",
                pointBorderWidth: 5,
                pointHoverRadius: 5,
                pointHoverBorderColor: "#fff",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [
                    <?php
                    if (count($graph) > 0) {
                        foreach ($graph as $data) {
                            echo $data->temperature . ",";
                        }
                    }
                    ?>
                ],
                spanGaps: false
            }]
        }
    });
</script>
<!-- end temperature chart -->
<!-- start humidity chart -->
<script>
    var legendState = true;
    if ($(window).outerWidth() < 576) {
        legendState = false;
    }

    var LINECHART = $('#HumChart');
    var myLineChart = new Chart(LINECHART, {
        type: 'line',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        max: 60,
                        min: 10
                    },
                    display: true,
                    gridLines: {
                        display: false
                    }
                }]
            },
            legend: {
                display: legendState
            }
        },
        data: {
            labels: [
                <?php
                if (count($graph) > 0) {
                    foreach ($graph as $data) {
                        echo "'" . $data->time . "',";
                    }
                }
                ?>
            ],
            datasets: [{
                label: "Humidity",
                fill: true,
                lineTension: 0.2,
                backgroundColor: "transparent",
                borderColor: '#864DD9',
                pointBorderColor: '#864DD9',
                pointHoverBackgroundColor: '#864DD9',
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                borderWidth: 2,
                pointBackgroundColor: "#fff",
                pointBorderWidth: 5,
                pointHoverRadius: 5,
                pointHoverBorderColor: "#fff",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 0,
                data: [
                    <?php
                    if (count($graph) > 0) {
                        foreach ($graph as $data) {
                            echo $data->humidity . ",";
                        }
                    }
                    ?>
                ],
                spanGaps: false
            }]
        }
    });
</script>
<!-- end chart humidity -->
<!-- start bagian switch toggle -->
<script>
    $(document).ready(function() {
        $('.ToggleOnOff').change(
            function() {
                var value = $(this).prop('checked')
                $.ajax({
                    type: 'get',
                    url: "<?= base_url('device/togglepost') ?>",
                    data: {
                        checkBoxValue: value,
                        id: $(this).attr('data-id')
                    },
                    success: (response) => {
                        console.log(response);
                    },
                    failed: (error) => {
                        console.log(error);

                    }
                })
            }
        );
    });
</script>
<!-- end bagian switch toggle -->
<!-- start bagian table real time -->

<!-- end bagian table real time -->

</html>