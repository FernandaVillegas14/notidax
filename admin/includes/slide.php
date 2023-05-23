<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">NotiDax</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="dashbord.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        MENU
    </div>

    <!-- Nav Item - NOTICIAS -->
    <li class="nav-item">
        <a class="nav-link" href="manage-posts.php">
            <i class="fa-solid fa-file"></i>
            <span>NOTICIAS</span></a>
    </li>

    <?php if ($_SESSION['rol'] == 1) { ?>
        <!-- Nav Item - COMENTARIOS -->
        <li class="nav-item">
            <a class="nav-link" href="comentarios.php">
                <i class="fa-sharp fa-solid fa-comments"></i>
                <span>COMENTARIOS</span></a>
        </li>

        <!-- Nav Item - USUARIOS -->
        <li class="nav-item">
            <a class="nav-link" href="usuarios.php">
                <i class="fa-sharp fa-solid fa-user"></i>
                <span>USUARIOS</span></a>
        </li>
        <!-- Nav Item - ROLES -->
        <li class="nav-item">
            <a class="nav-link" href="roles.php">
                <i class="fa-sharp fa-solid fa-users"></i>
                <span>ROLES</span></a>
        </li>

        <!-- !-- Nav Item - carrusel -->
        <li class="nav-item">
            <a class="nav-link" href="carrusel.php">
                <i class="fa-sharp fa-solid fa-users"></i>
                <span>CARRUSEL</span></a>
        </li>
    <?php } ?>
    <!-- Nav Item - ARCHIVOS -->
    <li class="nav-item">
        <a class="nav-link" href="../index.php" target="_blank">
            <i class="fa-sharp fa-solid fa-house"></i>
            <span>FRONT</span></a>
    </li>