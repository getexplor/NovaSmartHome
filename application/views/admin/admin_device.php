<div class="page-content">
    <div class="page-header m-0">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Devices</h2>
        </div>
    </div>
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Device </li>
        </ul>
    </div>
    <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <?php
                foreach ($device as $dev) {
                ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="statistic-block block">
                            <div class="progress-details d-flex align-items-end justify-content-between">
                                <div class="title">
                                    <div class="icon"><i class="icon-computer"></i></div><strong><?= $dev->device_category . ' ' . $dev->number ?></strong>
                                </div>
                                <?php
                                if ($dev->status) {
                                ?>
                                    <div class="number dashtext-1">
                                        <input type="checkbox" name="toggle" id="toggleOnOff" class="ToggleOnOff" data-toggle="toggle" data-id="<?= $dev->id ?>" data-off="OFF" data-on="ON" data-onstyle="success" data-offstyle="danger" checked>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="number dashtext-1">
                                        <input type="checkbox" name="toggle" id="toggleOnOff" class="ToggleOnOff" data-toggle="toggle" data-id="<?= $dev->id ?>" data-off="OFF" data-on="ON" data-onstyle="success" data-offstyle="danger">
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
    </section>
</div>