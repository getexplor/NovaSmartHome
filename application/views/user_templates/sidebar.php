<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar">
                <?php
                $id = $user['id'];
                ?>
                <a href="<?= base_url('user/editprofile') ?>">
                    <img style="height:50px; width:50px;" ; src="<?= base_url('assets/img/profile/' . $user['image']); ?>" class="img-fluid rounded-circle">
                </a>
            </div>
            <div class="title">
                <?php
                $id = $user['id'];
                ?>
                <p class="h5 ml-2"><a href="<?= base_url('user/editprofile/') . $id; ?>"><?= $user['fullname']; ?></a></p>
                <p class="ml-2">
                    <?php
                    $role = $user['role_id'];
                    if ($role == '1') {
                        echo 'Admin';
                    } else {
                        echo 'User';
                    }
                    ?>
                </p>
            </div>
        </div>
        <!-- Sidebar Navidation Menus-->
        <span class="heading">Main</span>
        <ul class="list-unstyled">
            <?php
            $currenttitle = 'dashboard';
            if ($title == $currenttitle) : ?>
                <li class="active">
                    <a href="<?= base_url('user'); ?>">
                        <i class="icon-dashboard"></i>Dashboard
                    </a>
                </li>
            <?php else : ?>
                <li>
                    <a href="<?= base_url('user'); ?>">
                        <i class="icon-dashboard"></i>Dashboard
                    </a>
                </li>
            <?php endif; ?>

            <?php
            $currenttitle = 'device';
            if ($title == $currenttitle) : ?>
                <li class="active">
                    <a href="<?= base_url('UserDevices'); ?>">
                        <i class="icon-computer"></i>Device
                    </a>
                </li>
            <?php else : ?>
                <li>
                    <a href="<?= base_url('UserDevices'); ?>">
                        <i class="icon-computer"></i>Device
                    </a>
                </li>
            <?php endif; ?>

            <?php
            $currenttitle = 'managedevice';
            if ($title == $currenttitle) : ?>
                <li class="active">
                    <a href="<?= base_url('usermanagedevices'); ?>">
                        <i class="icon-settings-1"></i>Manage Device
                    </a>
                </li>
            <?php else : ?>
                <li>
                    <a href="<?= base_url('usermanagedevices'); ?>">
                        <i class="icon-settings-1"></i>Manage Device
                    </a>
                </li>
            <?php endif; ?>

            <?php
            $currenttitle = 'history';
            if ($title == $currenttitle) : ?>
                <li class="active">
                    <a href="<?= base_url('UserHistory'); ?>">
                        <i class="icon-chart"></i>History
                    </a>
                </li>
            <?php else : ?>
                <li>
                    <a href="<?= base_url('UserHistory'); ?>">
                        <i class="icon-chart"></i>History
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    <!-- Sidebar Navigation end-->