<?php 

include('connection.php');

$error_message = '';
$success_message = '';

if(isset($_POST['submit'])) {

  date_default_timezone_set('Asia/Kolkata');
	
  if (!empty($_POST['uname']) && !empty($_POST['upwd']) && !empty($_POST['role'])) {

  	$checkUsernameQuery = "SELECT * FROM users WHERE uname = '" . $_POST['uname'] . "'";
    $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);

    if (mysqli_num_rows($checkUsernameResult) > 0) {
        // Username already exists, provide an error message or take appropriate action
        $error_message = 'Username already exists. Please choose a different username.';
    } else {
        // Username is unique, proceed with the insertion
        $sql="INSERT INTO users (uname,upwd,role,added_date) values ('".$_POST['uname']."','".$_POST['upwd']."','".$_POST['role']."','".date('Y-m-d h:i:s')."')";
	
	      $result=mysqli_query($conn,$sql);
	
	      if($result) {
		
            $success_message = 'Data inserted successfully!';
      
	      } else {
		  
            $error_message = "Error: " . $sql . "<br>" . mysqli_error($conn);
	      }
    }
  } else {
    $error_message = 'Please fill in all the required fields.';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Admin Dashboard | Rice IMS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/registration.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    </head>

    <body>
      <div class="main">
        <div class="sidebar">
            <a class="logo">
                <div class="logo-image"></div>
                    <div class="logo-name">
                    <span>Rice</span> IMS
                </div>
            </a>
            
        <ul class="side-menu">
            <li><a href="dashboard.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="#"><i class='bx bx-store-alt'></i>Sales</a></li>
            <li><a href="#"><i class='bx bx-cart'></i>Products</a></li>
            <li><a href="#"><i class='bx bx-package'></i></i>Stocks</a></li>
            <li><a href="#"><i class='bx bxs-report'></i></i></i>Reports</a></li>
            <br>
            <li class="active"><a href="registration.php"><i class='bx bx-group'></i>Staffs</a></li>
            <!--<li><a href="#"><i class='bx bx-cog'></i>Settings</a></li>-->
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
        
        <div class="registration">
          
          <div class="error_message">
          <?php
              if (!empty($error_message)) {
                  echo '<div class="error_message">' . $error_message . '</div>';
              }

              if (!empty($success_message)) {
                  echo '<div class="success_message">' . $success_message . '</div>';
              }
          ?>
          </div>
          
            <br>
            <h2>Add Staff</h2>
                <form method="post">
                    <label for="email">Username:</label>
                      <input type="text" class="form-control" id="email" placeholder="Enter username" name="uname" required>
                    <label for="pwd">Password:</label>
                    <div class="password-container">
                      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="upwd" autocomplete="off" required>
                        <span id="passwordToggle" class="password-toggle" onclick="togglePasswordVisibility()">
                            <i class="fa fa-eye"></i>
                        </span>
                    </div>

                      <label for="pwd">Role:</label>
                      <select class="form-control" name="role">
                        <option value="staff">Staff</option>
                      </select> 
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form><br>
        </div>
      </div>
    </div>

    <script src="js/index.js"></script>

<script>
function togglePasswordVisibility() {
    const passwordField = document.getElementById("pwd");
    const passwordToggle = document.getElementById("passwordToggle");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        passwordToggle.innerHTML = '<i class="fa fa-eye-slash"></i>'; // Change to hide icon
    } else {
        passwordField.type = "password";
        passwordToggle.innerHTML = '<i class="fa fa-eye"></i>'; // Change to show icon
    }
}
</script>



</body>
</html>
