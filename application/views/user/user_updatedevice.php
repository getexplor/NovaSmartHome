<div class="page-content">
    <div class="page-header m-0">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Update Device</h2>
        </div>
    </div>
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('usermanagedevices'); ?>">Manage Device</a></li>
            <li class="breadcrumb-item active">Update Device </li>
        </ul>
    </div>
    <div class="col-lg-12">
        <?= $this->session->flashdata('message_update'); ?>
        <?php foreach ($device as $dev) { ?>
            <form method="post" action="<?php echo base_url() . 'usermanagedevices/update_device'; ?>">
                <div class="form-group">
                    <label>Device Name</label>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $dev->id ?>">
                    <input type="hidden" name="iduser" class="form-control" value="<?php echo $dev->iduser ?>">
                    <select name="devicecategory" class="form-control mb-3 mb-3" value="<?php echo $dev->device_category ?>">
                        <?php
                        $var = $dev->device_category;
                        ?>
                        <option value="ac" <?php echo ($var == 'ac' ? 'selected' : '');  ?>>ac</option>
                        <option value="kipas" <?php echo ($var == 'kipas' ? 'selected' : '');  ?>>kipas</option>
                        <option value="lampu" <?php echo ($var == 'lampu' ? 'selected' : '');  ?>>lampu</option>
                        <option value="pintu" <?php echo ($var == 'pintu' ? 'selected' : '');  ?>>pintu</option>
                        <option value="suhu" <?php echo ($var == 'suhu' ? 'selected' : '');  ?>>suhu</option>
                        <option value="televisi" <?php echo ($var == 'televisi' ? 'selected' : '');  ?>>televisi</option>
                        <option value="tirai" <?php echo ($var == 'tirai' ? 'selected' : '');  ?>>tirai</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Device Number</label>
                    <select name="devicenumber" class="form-control mb-3 mb-3">
                        <?php
                        $number = $dev->number;
                        for ($i = 1; $i <= 13; $i++) {
                        ?>
                            <option <?php echo ($number == $i ? 'selected' : '');  ?>><?= $i ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <?php echo form_error('devicenumber', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="hidden" name="status" class="form-control" value="<?php echo $dev->status ?>">
                </div>
                <div class="mb-3 pull-right">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        <?php } ?>
    </div>