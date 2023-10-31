<!DOCTYPE html>
<html lang="en">
<head>
  <title>Staff Dashboard | Rice IMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/staff-menu.css">
  </head>

  <body>
        <div class="sidebar">
            <a class="logo">
                <div class="logo-image"></div>
                    <div class="logo-name">
                    <span>Rice</span> IMS
                </div>
            </a>
            
        <ul class="side-menu">
            <li class="active"><a href="#"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="#"><i class='bx bx-store-alt'></i>Sales</a></li>
            <li><a href="#"><i class='bx bx-cart'></i>Products</a></li>
            <li><a href="#"><i class='bx bx-package'></i></i>Stocks</a></li>
            <li><a href="#"><i class='bx bxs-report'></i></i></i>Reports</a></li>

            <!--<li><a href="#"><i class='bx bx-group'></i>Users</a></li>
            <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li>-->
        </ul>
        <ul class="side-menu">
            <li>
                <a href="login.php" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
<!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a>
            <a class="profile">
                <i class='bx bxs-user-circle' ></i>            
            </a>
        </nav>
        <!-- End of Navbar -->
        </div>
    </div>
    <script src="js/index.js"></script>

</body>
</html>