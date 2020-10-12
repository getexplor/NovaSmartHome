<div class="login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6">
                    <div class="info d-flex align-items-center">
                        <div class="content">
                            <div class="logo">
                                <h1>Registration Account</h1>
                            </div>
                            <p>Register Account Nova Smart Home</p>
                        </div>
                    </div>
                </div>
                <!-- Form Panel    -->
                <div class="col-lg-6 bg-white">
                    <div class="form d-flex align-items-center">
                        <div class="content">
                            <form class="text-left form-validate" method="POST" action="<?= base_url('auth/registration'); ?>">
                                <div class="form-group-material">
                                    <input id="fullname" type="text" name="fullname" class="input-material" value="<?= set_value('fullname'); ?>">
                                    <label for="fullname" class="label-material">Fullname</label>
                                    <?php echo form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group-material">
                                    <input id="email" type="email" name="email" class="input-material" value="<?= set_value('email'); ?>">
                                    <label for="email" class="label-material">Email Address</label>
                                    <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group-material">
                                    <input id="username" type="text" name="username" class="input-material" value="<?= set_value('username'); ?>">
                                    <label for="username" class="label-material">Username</label>
                                    <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group-material">
                                    <input id="password1" type="password" name="password1" class="input-material">
                                    <label for="password1" class="label-material">Password</label>
                                    <?php echo form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group-material">
                                    <input id="password2" type="password" name="password2" class="input-material">
                                    <label for="password2" class="label-material">Repeat Password</label>
                                </div>
                                <div class="form-group text-center col-lg-12">
                                    <input id="register" type="submit" value="Register" class="btn btn-primary col-lg-12">
                                </div>
                            </form><small>Already have an account? </small><a href="<?= base_url('auth') ?>" class="signup">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>