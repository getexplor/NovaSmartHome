<div class="page-content">
    <div class="page-header m-0">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Manage User</h2>
        </div>
    </div>
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Manage User</li>
        </ul>
    </div>
    <div class="col-lg-12">
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
            <li class="fa fa-plus"></li>
            Add a new user
        </button>
        <?= $this->session->flashdata('message'); ?>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users Data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Full Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <th class="text-center">No</th>
                            <th class="text-center">Full Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Action</th>
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($user as $usr) {
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $no++ ?></td>
                                    <td class="text-center"><?php echo $usr->fullname ?></td>
                                    <td class="text-center"><?php echo $usr->email ?></td>
                                    <td class="text-center">
                                        <?php echo anchor(
                                            'manageuser/edit_user/' . $usr->id,
                                            '<div class="btn btn-primary btn-sm mr-2 mx-auto">
                                            <li class="fa fa-edit"></li>
                                        </div>'
                                        );
                                        ?>
                                        <?php echo anchor(
                                            'manageuser/delete_user/' . $usr->id,
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
                    <h4 class="modal-title" id="exampleModalLabel">Form Create User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url() . 'manageuser/create_user'; ?>">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="fullname" class="form-control" value="<?= set_value('fullname'); ?>">
                            <?php echo form_error('fullname', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?= set_value('email'); ?>">
                            <?php echo form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>username</label>
                            <input type="text" name="username" class="form-control" value="<?= set_value('username'); ?>">
                            <?php echo form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password1" class="form-control">
                            <?php echo form_error('password1', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Reply Password</label>
                            <input type="password" name="password2" class="form-control">
                        </div>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>