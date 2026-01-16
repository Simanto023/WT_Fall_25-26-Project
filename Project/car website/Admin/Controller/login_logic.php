<?php
include __DIR__ . "/../../DB/db.php";

$emailErrors    = [];
$passwordErrors = [];
$loginErrors    = [];

function test_input($data) {
    return trim($data);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email    = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);

    // email
    if (empty($email)) {
        $emailErrors[] = "Email is required";
    }

    // password
    if (empty($password)) {
        $passwordErrors[] = "Password is required";
    }

    // database check
    if (empty($emailErrors) && empty($passwordErrors)) {

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows == 1) {

            $user = $result->fetch_assoc();

            //pass check
            if (password_verify($password, $user["password"])) {

                session_start();

                $_SESSION['user_id']   = $user['id'];
                $_SESSION['role']      = $user['role'];
                $_SESSION['full_name'] = $user['full_name'];

                 if (isset($_POST['remember'])) {
        setcookie(
            "remember_user",
            $user['id'],
            time() + (7 * 24 * 60 * 60), // 7 days
            "/"
        );
    }

                //role check
                if ($user['role'] == 'admin') {
                    header("Location: ../View/admin_dashboard.php");
                } else {
                    header("Location: xxxxxxxxxx");
                }
                exit;

            } else {
                $loginErrors[] = "Invalid password!";
            }

        } else {
            $loginErrors[] = "Email not found!";
        }
    }
}
?>