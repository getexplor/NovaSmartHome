<div class="login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6 text-center">
                    <div class="info d-flex align-items-center text-center">
                        <div class="content">
                            <div class="logo">
                                <h1>Login</h1>
                            </div>
                            <p>Nova Smart Home</p>
                        </div>
                    </div>
                </div>
                <!-- Form Panel    -->
                <div class="col-lg-6">
                    <div class="form d-flex align-items-center">
                        <div class="content">
                            <?= $this->session->flashdata('message'); ?>
                            <form method="POST" action="<?= base_url('auth'); ?>" class="form-validate mb-4">
                                <div class="form-group">
                                    <input id="username" type="text" name="username" required data-msg="Please enter your username" class="input-material">
                                    <label for="username" class="label-material">Username</label>
                                    <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                                    <label for="password" class="label-material">Password</label>
                                    <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                            <a href="#" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account? </small>
                            <a href="<?= base_url('auth/registration'); ?>" class="signup">Signup</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>