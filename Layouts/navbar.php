<?php
$activeUrl = $_GET['url'] ?? ''; // Get the current URL parameter or default to 'home'
?>
<style>
    /* Navbar Styling */
    .main-header.navbar {
        background-color: #2e8b57 !important;
        /* SeaGreen - lebih soft dan profesional */
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .main-header .nav-link {
        color: white !important;
        font-weight: 500;
    }

    .main-header .nav-link:hover {
        color: #d4f8d4 !important;
    }

    .navbar-badge {
        font-size: 0.7rem;
        top: 4px;
    }

    /* Sidebar Styling */
    .main-sidebar {
        background-color: #3cb371 !important;
        /* MediumSeaGreen */
    }

    .brand-link {
        background-color: #2e8b57 !important;
        color: white !important;
        text-align: center;
        font-weight: bold;
        font-size: 1.1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .user-panel .info span {
        color: white;
        font-weight: bold;
    }

    .nav-sidebar .nav-item>.nav-link {
        color: #eafaf1;
        transition: background-color 0.2s ease;
        font-weight: 500;
    }

    .nav-sidebar .nav-link.active {
        background-color: #2e8b57;
        color: white;
        font-weight: bold;
    }

    .nav-sidebar .nav-link.active {
        background-color: #2e8b57 !important;
        color: white !important;
        font-weight: bold !important;
    }

    .nav-icon {
        color: white;
    }

    .nav-header {
        font-size: 0.9rem;
        color: #e2f2e2;
        margin-top: 8px;
        letter-spacing: 1px;
    }

    .dropdown-menu {
        border-radius: 0.5rem;
    }

    .dropdown-item:hover {
        background-color: #d1f5db;
        color: #2e8b57;
    }

    /* Optional: Better search input look */
    .form-control-navbar {
        border-radius: 20px;
        padding-left: 10px;
    }

    .sidebar-dark-primary .nav-sidebar .nav-item>.nav-link.active {
        background-color: #2e8b57 !important;
        color: #fff !important;
    }
</style>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Brand Logo -->
    <a href="#" class="brand-link d-flex justify-content-center align-items-center">
        <span class="brand-text font-weight-bold text-white" style="font-size: 1.25rem; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);">
            <i class="fas fa-stethoscope mr-2"></i>Puskesmas RKDR
        </span>
    </a>



    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class -->
                <li class="nav-header">LIST MENU</li>
                <li class="nav-item">
                    <a href="./?url=periksa" class="nav-link <?php echo $activeUrl === 'periksa' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-notes-medical"></i> <!-- Icon for Periksa -->
                        <p>Periksa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./?url=pasien" class="nav-link <?php echo $activeUrl === 'pasien' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-procedures"></i> <!-- Icon for Pasien -->
                        <p>Pasien</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./?url=paramedik" class="nav-link <?php echo $activeUrl === 'paramedik' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-user-md"></i> <!-- Icon for Paramedik -->
                        <p>Paramedik</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./?url=kelurahan" class="nav-link <?php echo $activeUrl === 'kelurahan' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-map-marker-alt"></i>
                        <p>Kelurahan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./?url=unit" class="nav-link <?php echo $activeUrl === 'unit' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Unit Kerja</p>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>