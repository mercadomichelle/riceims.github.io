<?php

session_start();

include('connection.php');

$errorMessage = ''; // Initialize an error message variable

if (isset($_POST['submit'])) {
    $username = $_POST['uname'];
    $password = $_POST['upwd'];
    
    $sql = "SELECT * FROM users WHERE uname='$username' AND upwd='$password' LIMIT 1";
    
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);
    
    if (!empty($data)) {
        $_SESSION['user_role'] = $data['role'];
        $_SESSION['username'] = $data['uname'];
    
        header('location:dashboard.php');
        exit(); // Ensure the script terminates after a successful login

    } else {
        $errorMessage = '<strong> ERROR: </strong> <br> Incorrect email or password. Please try again.'; // Set the error message
    }
} else {
    $errorMessage = ''; // Reset the error message when the page is initially loaded
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="images/logo.png">

    <title>Login | Rice IMS</title>
</head>

<body>
  <div class="body-container">

    <div class="loginHeader">
      <h1>INVENTORY MANAGEMENT SYSTEM</h1>
      <h2>Escalona-Delen Rice Dealer</h2><br>
    </div>
    
    <div class="container">
      <div class="form-container login">
        <form method="post">
          <h1>Login</h1><br>
            <span>Use your email and password to login.</span>
              <input type="text" class="form-control" placeholder="Email" name="uname" required>
              <input type="password" class="form-control" placeholder="Password" name="upwd" id="passwordField" required>
                <span id="passwordToggle" class="password-toggle" onclick="togglePasswordVisibility()">
                  <i class="fa fa-eye"></i>
                </span>

                <a href="#">Forgot password?</a>
              <button type="submit" name="submit" class="btn">Log In</button>
        </form>
      </div>
    
      <div class="container1">
        
        <div class="error-modal" id="errorModal">
          <div class="error-content">
            <span class="close" id="closeErrorModal">&times;</span>
            <p><?php echo $errorMessage; ?></p>
            <button id="okButton">OK</button>
          </div>
        </div>
  
      <div class="panel">
        <div class="toggle-panel left">
          <h1>Hello!</h1>
          <p>Welcome, please log in to access the system.</p>
        </div>
      </div>
    </div>    
  </div>

</body>

  <script>

    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    if (!empty($errorMessage)) {
        echo 'document.getElementById("errorModal").style.display = "block";';
    } else {
        echo 'document.getElementById("errorModal").style.display = "none";'; // Hide the error modal
    }
    ?>  

    // Close the error pop-up when the close button is clicked
    document.getElementById("closeErrorModal").addEventListener("click", function() {
    document.getElementById("errorModal").style.display = "none";
    });

    // Close the error pop-up when the OK button is clicked
    document.getElementById("okButton").addEventListener("click", function() {
    document.getElementById("errorModal").style.display = "none";
    });
  
    function togglePasswordVisibility() {
    const passwordField = document.getElementById("passwordField");
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
</html>