<div class="page-content">
    <div class="page-header m-0">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">History</h2>
        </div>
    </div>
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">History</li>
        </ul>
    </div>
    <div class="col-lg-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">History Data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Temperature</th>
                                <th class="text-center">Humidity</th>
                                <th class="text-center">Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <th class="text-center">No</th>
                            <th class="text-center">Temperature</th>
                            <th class="text-center">Humidity</th>
                            <th class="text-center">Date</th>
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($dataTable as $dt) {
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $no++ ?></td>
                                    <td class="text-center"><?php echo $dt->temperature ?></td>
                                    <td class="text-center"><?php echo $dt->humidity ?></td>
                                    <td class="text-center"><?php echo $dt->time ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>