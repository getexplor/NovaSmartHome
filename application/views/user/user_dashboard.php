<div class="page-content">
    <div class="page-header mb-3">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
        </div>
    </div>
    <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-computer"></i></div><strong>Devices</strong>
                            </div>
                            <?php
                            $id = $user['id'];

                            $data['device'] = $this->model_device->show_device()->result();
                            $device = $data['device'];
                            $count = 0;

                            foreach ($device as $dev) {
                                if ($id == $dev->iduser) {
                                    $count = $count + 1;
                                }
                            }
                            ?>
                            <div class="number dashtext-2"><?= $count ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-chart"></i></div><strong>Suhu</strong>
                            </div>
                            <?php
                            $temperature = 0;
                            foreach ($weather as $data) {
                                $temperature = $data->temperature;
                            }
                            ?>
                            <?php
                            if ($temperature != 0) {
                            ?>
                                <div class="number dashtext-3"><?= $temperature ?></div>
                            <?php
                            } else {
                            ?>
                                <div class="number dashtext-3"><?= '0' ?></div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-chart"></i></div><strong>Kelembapan</strong>
                            </div>
                            <?php
                            $humidity = 0;
                            foreach ($weather as $data) {
                                $humidity = $data->humidity;
                            }
                            ?>
                            <?php
                            if ($humidity != 0) {
                            ?>
                                <div class="number dashtext-3"><?= $humidity ?></div>
                            <?php
                            } else {
                            ?>
                                <div class="number dashtext-3"><?= '0' ?></div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- chart -->
                <div class="col-lg-6">
                    <div class="line-chart block chart">
                        <div class="title"><strong>Temperature Chart</strong></div>
                        <canvas id="TempChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="line-chart block chart">
                        <div class="title"><strong>Humidity Chart</strong></div>
                        <canvas id="HumChart"></canvas>
                    </div>
                </div>
            </div>
            <!-- end div no padding -->
        </div>
    </section>