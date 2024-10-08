<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>index3.html" class="brand-link">
        <img src="<?php echo base_url() ?>template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Puskesmas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('dashboard')?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() ?>pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-user-injured"></i>
                        <p>
                            Pasien
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() ?>dokter" class="nav-link">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>
                            Dokter
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() ?>pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                            Kategori
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() ?>pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-clinic-medical"></i>
                        <p>
                            Poli
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('ruangan') ?>" class="nav-link">
                        <i class="nav-icon fas fa-door-open"></i>
                        <p>
                            Ruangan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() ?>pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Antrian
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() ?>pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
