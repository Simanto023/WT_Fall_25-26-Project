<?php
include __DIR__ . "/../../DB/db.php";
$nameErrors     = [];
$emailErrors    = [];
$passwordErrors = [];

function test_input($data) {
    return trim($data);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = test_input($_POST["fullname"]);
    $email    = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $confirm  = test_input($_POST["confirm_password"]);

    // NAME
    if (empty($fullname)) {
        $nameErrors[] = "Full name is required";
    }
    else{
        if (!preg_match("/^[a-zA-Z ]+$/", $fullname)) {
        $nameErrors[] = "Name can contain only letters and spaces";
       }
        if (strlen($fullname) < 2) {
        $nameErrors[] = "Name must be at least 2 characters";
       }
        if (preg_match("/\s{2,}/", $fullname)) {
        $nameErrors[] = "Name should not contain multiple spaces";
       }
   }
    // EMAIL
    if (empty($email)) {
        $emailErrors[] = "Email is required";
    }
    else {
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErrors[] = "Invalid email format";
      }
      else {
        $check = $conn->query("SELECT id FROM users WHERE email='$email'");
        if ($check->num_rows > 0) {
            $emailErrors[] = "Email already exists";
        }
       }
   }  

    // PASSWORD
    if (empty($password)||empty($confirm)) {
        $passwordErrors[] = "Password or Confirm Password is empty";
    }
    else{
        if (!empty($password) && !empty($confirm) && $password != $confirm) {
        $passwordErrors[] = "Passwords do not match";
      }

        if (strlen($password) < 8) {
        $passwordErrors[] = "At least 8 characters";
      }
        if (!preg_match("/[A-Z]/", $password)) {
         $passwordErrors[] = "At least 1 uppercase letter";
      }
       if (!preg_match("/[a-z]/", $password)) {
        $passwordErrors[] = "At least 1 lowercase letter";
      }
       if (!preg_match("/[0-9]/", $password)) {
        $passwordErrors[] = "At least 1 number";
      }
       if (!preg_match("/[@$!%*?&#]/", $password)) {
        $passwordErrors[] = "At least 1 special character";
      }
    }
    
    

    // Database entry
    if (empty($nameErrors) && empty($emailErrors) && empty($passwordErrors)) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (full_name, email, password, role)
                VALUES ('$fullname', '$email', '$hashedPassword', 'customer')";

        if ($conn->query($sql)) {
    echo "<script>
            alert('Registration successful! Please login.');
            window.location.href = '../View/login.php';
          </script>";
    exit;
}
    }
}
?>
