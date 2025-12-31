<?php
include __DIR__ . "/../DB/db.php";

$nameErrors     = [];
$emailErrors    = [];
$passwordErrors = [];

function test_input($data) {
    return trim($data);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST["fullname"];
    $email    = $_POST["email"];
    $password = $_POST["password"];
    $confirm  = $_POST["confirm_password"];

    
    // PASSWORD
    if (empty($password)) {
        $passwordErrors[] = "Password is required";
    }

    if (empty($confirm)) {
        $passwordErrors[] = "Confirm password is required";
    }

    if (!empty($password) && !empty($confirm) && $password != $confirm) {
        $passwordErrors[] = "Passwords do not match";
    }

    if (!empty($password)) {

        $password = test_input($password);

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

        $conn->query($sql);
    }
}
?>
