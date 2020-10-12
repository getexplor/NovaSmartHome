<div class="page-content">
    <div class="page-header m-0">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Update Prolfe</h2>
        </div>
    </div>
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Update Profile </li>
        </ul>
    </div>
    <div class="col-lg-12 col-sm-6">
        <?= $this->session->flashdata('message_update'); ?>
        <div class="card">
            <div class="card-header">
                <h3>Profile</h3>
            </div>
            <div class="card-body p-b-1">
                <?= form_open_multipart('user/update_profile'); ?>
                <div class="form-group">
                    <label>Email</label>
                    <input readonly type="email" name="email" class="form-control" value="<?php echo $user['email'] ?>">
                </div>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $user['id'] ?>">
                    <input type="text" name="fullname" class="form-control" value="<?php echo $user['fullname'] ?>">
                    <?php echo form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $user['username'] ?>">
                    <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Picture</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" id="image" name="image">
                                    <label class="custom-file-label form-control" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 pull-right">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <?= form_close(); ?>

            </div>
        </div>
    </div>
    <!-- password -->
    <div class="col-lg-12 col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3>Password</h3>
            </div>
            <div class="card-body p-b-1">
                <form method="post" action="<?php echo base_url() . 'user/update_password'; ?>">
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="hidden" name="id" class="form-control" value="<?php echo $user['id'] ?>">
                        <input type="password" name="currentpassword" class="form-control">
                        <?php echo form_error('currentpassword', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="new_password1" class="form-control">
                        <?php echo form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Confrim New Password</label>
                        <input type="password" name="new_password2" class="form-control">
                        <?php echo form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3 pull-right">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("image").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>