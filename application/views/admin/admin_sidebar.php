<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('sys/login') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Semesta</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <!-- QUERY MENU -->
    <?php
    $role_id = $this->session->userdata('role_ID');
    $queryMenu = "SELECT `user_menu`.`id`, `user_menu`.`menu`, `user_menu`.`icon` 
                        FROM `user_menu` JOIN `user_access_menu`
                        ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                        WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                        ";

    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- LOOPING MENU-->
    <?php foreach ($menu as $m) : ?>

        <!-- SUB MENU-->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT `user_sub_menu`.`id`, `user_sub_menu`.`menu_id`, `user_sub_menu`.`title`, `user_sub_menu`.`url`
                        FROM `user_sub_menu` JOIN `user_menu`
                        ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                        WHERE `user_sub_menu`.`menu_id` = $menuId
                        AND `user_sub_menu`.`is_active` = 1
        ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <!-- Nav Item - Pages Collapse Menu -->
        <?php $url = $this->uri->segment(1) ?>

        <?php $x = 'collapse' . $m['menu']; ?>
        <?php $y = '#collapse' . $m['menu']; ?>

        <?php if ($m['menu'] == $url) : ?>
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="<?= $y ?>" aria-expanded="true" aria-controls="<?= $x ?>">
                    <i class="<?= $m['icon']; ?>"></i>
                    <span class="text-capitalize"><?= $m['menu']; ?></span>
                </a>
                <div id="<?= $x ?>" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"><?= $m['menu']; ?> :</h6>
                        <?php foreach ($subMenu as $sm) : ?>
                            <?php if ($title == $sm['title']) : ?>
                                <a class="collapse-item active" href="<?= base_url($sm['url']); ?>"><?= $sm['title']; ?></a>
                            <?php else : ?>
                                <a class="collapse-item" href="<?= base_url($sm['url']); ?>"><?= $sm['title']; ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else : ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="<?= $y ?>" aria-expanded="false" aria-controls="<?= $x ?>">
                    <i class="<?= $m['icon']; ?>"></i>
                    <span class="text-capitalize"><?= $m['menu']; ?></span>
                </a>
                <div id="<?= $x ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"><?= $m['menu']; ?> :</h6>
                        <?php foreach ($subMenu as $sm) : ?>
                            <?php if ($title == $sm['title']) : ?>
                                <a class="collapse-item active" href="<?= base_url($sm['url']); ?>"><?= $sm['title']; ?></a>
                            <?php else : ?>
                                <a class="collapse-item" href="<?= base_url($sm['url']); ?>"><?= $sm['title']; ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mt-1 mb-1">
        <?php endforeach; ?>

        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->