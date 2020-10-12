<div class="page-content">
    <div class="page-header m-0">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Manage Device</h2>
        </div>
    </div>
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Manage Device </li>
        </ul>
    </div>
    <div class="col-lg-12">
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
            <li class="fa fa-plus"></li>
            Add a new device
        </button>
        <?= $this->session->flashdata('message'); ?>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Devices Data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Device Categoty</th>
                                <th class="text-center">Number</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <th class="text-center">No</th>
                            <th class="text-center">Device Categoty</th>
                            <th class="text-center">Number</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($device as $dev) {
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $dev->device_category ?></td>
                                    <td class="text-center"><?= $dev->number ?></td>
                                    <td class="text-center"><?= $dev->status ?></td>
                                    <td class="text-center">
                                        <?php echo anchor(
                                            'managedevice/edit_device/' . $dev->id,
                                            '<div class="btn btn-primary btn-sm mr-2 mx-auto">
                                            <li class="fa fa-edit"></li>
                                        </div>'
                                        );
                                        ?>
                                        <?php echo anchor(
                                            'managedevice/delete_device/' . $dev->id,
                                            '<div class="btn btn-danger btn-sm mx-auto">
                                            <li class="fa fa-trash"></li>
                                        </div>'
                                        );
                                        ?>
                                    </td>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Form Create Device</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url() . 'managedevice/create_device'; ?>">
                        <div class="form-group">
                            <label>Device Category</label>
                            <select name="devicecategory" class="form-control mb-3 mb-3">
                                <option>ac</option>
                                <option>kipas</option>
                                <option>lampu</option>
                                <option>pintu</option>
                                <option>suhu</option>
                                <option>televisi</option>
                                <option>tirai</option>
                            </select>
                            <?php echo form_error('devicecategory', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Number</label>
                            <select name="devicenumber" class="form-control mb-3 mb-3">
                                <?php
                                for ($i = 1; $i <= 100; $i++) {
                                ?>
                                    <option><?= $i ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <?php echo form_error('devicenumber', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>