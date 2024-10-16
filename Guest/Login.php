<?php
include("../Assets/Connection/Connection.php");
session_start();
$message = "";
if (isset($_POST["btn_submit"])) {
  $email = $_POST["txt_email"];
  $password = $_POST["txt_password"];

  $selAdmin = "select * from tbl_admin where admin_email='" . $email . "' and admin_password='" . $password . "'";

  $selPharmacist = "select * from tbl_pharmacist where pharmacist_email='" . $email . "' and pharmacist_password='" . $password . "'";

  $resAdmin = $con->query($selAdmin);
  $resPharmacist = $con->query($selPharmacist);

  if ($data = $resAdmin->fetch_assoc()) {
    $_SESSION['aid'] = $data["admin_id"];
    $_SESSION['aname'] = $data["admin_name"];
    header("location:../Admin/HomePage.php");
  } else if ($data = $resPharmacist->fetch_assoc()) {
    $_SESSION['pid'] = $data["pharmacist_id"];
    $_SESSION['pname'] = $data["pharmacist_name"];
    header("location:../Pharmacist/PharmaHome.php");
  } else {
    $message = "Invalid Login!!!";
  }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="styles.css">
    <!-- Google Fonts for better typography -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Import Google Font */
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

/* Global Styles */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Roboto', sans-serif;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Container for the login form */
.login-container {
    background: rgba(255, 255, 255, 0.85);
    padding: 40px 30px;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.3);
    width: 100%;
    max-width: 400px;
}

/* Login Form Styles */
.login-form h2 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

.input-group {
    margin-bottom: 20px;
}

.input-group label {
    display: block;
    margin-bottom: 8px;
    color: #555;
    font-weight: 500;
}

.input-group input {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: border-color 0.3s ease;
    font-size: 16px;
}

.input-group input:focus {
    border-color: #9b59b6;
    outline: none;
}

/* Button Styles */
.btn {
    width: 100%;
    padding: 12px;
    background-color: #9b59b6;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #8e44ad;
}

/* Signup Link */
.signup-link {
    text-align: center;
    margin-top: 15px;
    color: #666;
}

.signup-link a {
    color: #9b59b6;
    text-decoration: none;
    font-weight: 500;
}

.signup-link a:hover {
    text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 480px) {
    .login-container {
        padding: 30px 20px;
    }

    .login-form h2 {
        font-size: 24px;
    }

    .btn {
        font-size: 16px;
    }
}

        </style>
</head>
<body>
    <div class="login-container" >
        <form class="login-form" method="post" >
            <h2>Login</h2>
            <div class="input-group">
                <label for="username">Email</label>
                <input type="text" required type="email" name="txt_email"   id="username"  placeholder="Enter your email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" required name="txt_password" id="txt_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter your password" required>
            </div>
            <button type="submit" required name="btn_submit" id="btn_submit"  class="btn">Login</button>
        </form>
    </div>
</body>
</html>
