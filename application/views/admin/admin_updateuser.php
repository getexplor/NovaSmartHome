<div class="page-content">
    <div class="page-header m-0">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Update User Account</h2>
        </div>
    </div>
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('manageuser'); ?>">Manage User</a></li>
            <li class="breadcrumb-item active">Update User </li>
        </ul>
    </div>
    <div class="col-lg-12">
        <?= $this->session->flashdata('message_udpate'); ?>
        <?php foreach ($user as $usr) { ?>
            <form method="post" action="<?php echo base_url() . 'manageuser/update_user'; ?>">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $usr->id ?>">
                    <input type="text" name="fullname" class="form-control" value="<?php echo $usr->fullname ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $usr->email ?>">
                    <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $usr->username ?>">
                </div>
                <div class="mb-3 pull-right">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        <?php } ?>
    </div>