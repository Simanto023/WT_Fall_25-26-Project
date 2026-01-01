<?php
include __DIR__ . "/../DB/db.php";

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

        if ($result->num_rows == 1) {

            $user = $result->fetch_assoc();

            //pass check
            if (password_verify($password, $user["password"])) {

                //role check
                if ($user["role"] == "admin") {
                    echo "<script>
                            window.location.href = 'admin_dashboard.html';
                          </script>";
                    exit;
                }
                else {
                    echo "<script>
                            window.location.href = '../customer_dashboard.html';
                          </script>";
                    exit;
                }

            } else {
                $loginErrors[] = "Invalid password!";
            }

        } else {
            $loginErrors[] = "Email not found!";
        }
    }
}
?>