<?php
if (!defined('main')) {
    echo "<script>window.location.href='../'</script>";
    exit();
};
?>

<style type="text/css">
    .active {
        background: blue;

    }

    .input-group-text {
        width: 150px;
    }

    .wrapper {
        position: fixed;
        top: 0;
        left: 0;
    }
</style>

<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #000000;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/mug/dashbord/">
        <div class="sidebar-brand-icon rotate-n-15">
            <img class="rounded-circle" style="width: 40px; height: 40px;" src="/image/sde.jpg">
        </div>
        <div class="sidebar-brand-text mx-3">D Engr Web</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <?php
    $dir_explode = explode("/", $_SERVER['PHP_SELF']);
    $active = $dir_explode[count($dir_explode) - 2];

    ?>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if ($active == 'dashbord') {
                            echo 'active';
                        } ?>">
        <a class="nav-link " href="/mug/dashbord/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Important
    </div>




    <!-- Side your link -->
    <li class="nav-item <?php if ($active == 'link') {
                            echo 'active';
                        } ?>">
        <a class="nav-link " href="/mug/link/">
            <i class="bi bi-link-45deg"></i>
            <span>Link</span></a>
    </li>

    <!-- Side password -->
    <li class="nav-item <?php if ($active == 'information') {
                            echo 'active';
                        } ?>">
        <a class="nav-link " href="/mug/information/">
            <i class="bi bi-people-fill"></i>
            <span>User Info</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Advance Interface
    </div>

    <li class="nav-item <?php if ($active == 'admin') {
                            echo 'active';
                        } ?>">
        <a class="nav-link " href="/mug/admin/">
            <i class="bi bi-person-badge-fill"></i>
            <span>Admin</span></a>
        <ul>

        </ul>
    </li>

    <li class="nav-item <?php if ($active == 'viewSite') {
                            echo 'active';
                        } ?>">
        <a class="nav-link " target="_blank" href="/">
            <i class="bi bi-box-arrow-up-right"></i>
            <span>Visit Site</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->



</ul>
<!-- End of Sidebar -->