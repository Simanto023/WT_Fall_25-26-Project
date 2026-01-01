<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="CSS/checkout.css">
</head>
<body>

<center><h1>Checkout</h1></center>

<?php
$address = "";
$phonenumber = "";
$error = "";

if (isset($_POST["submit"])) {


    if (empty($_POST["address"])) {
        $error .= "Address is required.<br>";
    } else {
        $address = $_POST["address"];
    }


    if (empty($_POST["phonenumber"])) {
        $error .= "Phone number is required.<br>";
    } else {
        $phonenumber = $_POST["phonenumber"];

        if (!is_numeric($phonenumber)) {
            $error .= "Phone number must be numeric.<br>";
        } else if (strlen($phonenumber) != 11) {
            $error .= "Phone number must be 11 digits.<br>";
        } else if (substr($phonenumber, 0, 2) != "01") {
            $error .= "Phone number must start with 01.<br>";
        }
    }

    if ($error == "") {
        echo "<p style='color:green;text-align:center;'>Order placed successfully!</p>";

    }
}
?>

<form method="post" action="">

    <label>Address:</label><br>
    <textarea name="address" rows="4" cols="40"><?php echo $address; ?></textarea>
    <br><br>

    <label>Phone Number:</label><br>
    <input type="text" name="phonenumber" value="<?php echo $phonenumber; ?>">
    <br><br>

    <input type="submit" name="submit" value="Confirm Order">

</form>

<?php
if ($error != "") {
    echo "<p style='color:red; text-align:center;'>$error</p>";
}
?>

</body>
</html>
