<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= ADMIN_ASSETS_DIR ?>img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">School Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= ADMIN_ASSETS_DIR ?>img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $_SESSION['name']; ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
<!--        <div class="form-inline">-->
<!--            <div class="input-group" data-widget="sidebar-search">-->
<!--                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">-->
<!--                <div class="input-group-append">-->
<!--                    <button class="btn btn-sidebar">-->
<!--                        <i class="fas fa-search fa-fw"></i>-->
<!--                    </button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <!--                <li class="nav-item menu-open">-->
                <!--                    <a href="#" class="nav-link active">-->
                <!--                        <i class="nav-icon fas fa-tachometer-alt"></i>-->
                <!--                        <p>-->
                <!--                            Dashboard-->
                <!--                            <i class="right fas fa-angle-left"></i>-->
                <!--                        </p>-->
                <!--                    </a>-->
                <!--                    <ul class="nav nav-treeview">-->
                <!--                        <li class="nav-item">-->
                <!--                            <a href="#" class="nav-link">-->
                <!--                                <i class="far fa-circle nav-icon"></i>-->
                <!--                                <p>Dashboard</p>-->
                <!--                            </a>-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </li>-->
                <li class="nav-item dashboard">
                    <a href="<?= BASE_URL . 'module=dashboard&action=index'; ?>" class="nav-link index">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <!--                Manage Student-->
                <li class="nav-item student">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manage Student
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= ADMIN_URL ?>index.php?module=student&action=student_list"
                               class="nav-link student-list">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Student List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= ADMIN_URL ?>index.php?module=student&action=add_student"
                               class="nav-link add-student">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!--                Manage Teacher-->

                <li class="nav-item teacher">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manage Teacher
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= ADMIN_URL ?>index.php?module=teacher&action=teacher_list"
                               class="nav-link teacher-list">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Teacher List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= ADMIN_URL ?>index.php?module=teacher&action=add_teacher"
                               class="nav-link add-teacher">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!--                Manage Class-->

                <li class="nav-item group">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manage Class
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= ADMIN_URL ?>index.php?module=group&action=class_list"
                               class="nav-link class-list">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Class List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= ADMIN_URL ?>index.php?module=group&action=add_class"
                               class="nav-link add-class">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!--                Manage Section-->
                <li class="nav-item section">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manage Section
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= ADMIN_URL ?>index.php?module=section&action=section_list"
                               class="nav-link section-list">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Section List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= ADMIN_URL ?>index.php?module=section&action=add_section"
                               class="nav-link add-section">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item subject">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manage Subject
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= ADMIN_URL ?>index.php?module=subject&action=subject_list"
                               class="nav-link subject-list">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Subject List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= ADMIN_URL ?>index.php?module=subject&action=add_subject"
                               class="nav-link add-subject">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="sign_out.php" class="nav-link">
                        <p>
                            Logout
                            <i class="fas fa-sign-out-alt right"></i>
                        </p>
                    </a>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>