<?php
include "conn.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Cpassword = $_POST['Cpassword'];
    $role = $_POST['role'];

    // Check if the email already exists
    $checkEmailQuery = "SELECT * FROM `login` WHERE `email` = '$email'";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        echo '
        <script>
          alert("Email already exists. Please use a different email.");
          window.location="../registration.html";
        </script>';
    } else {
        // Email is unique, proceed with registration
        if ($password == $Cpassword) {
            $hashedPassword = md5($password);
            $hashedPasswor = md5($Cpassword);
            $insert = mysqli_query($conn, "INSERT INTO `login`(`name`, `email`, `password`, `Cpassword`, `role`) VALUES ('$name','$email','$hashedPassword','$hashedPasswor','$role')");

            if ($insert) {
                echo '
                <script>
                  alert("Registration successful");
                  window.location="../index.html";
                </script>';
            } else {
                echo '
                <script>
                  alert("Some error");
                  window.location="../registration.html";
                </script>';
            }
        } else {
            echo '
            <script>
              alert("Password and confirm-password do not match");
              window.location="../registration.html";
            </script>';
        }
    }
}
?>
