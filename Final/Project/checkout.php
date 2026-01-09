<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="CSS/checkout.css">
</head>
<body>

<center><h1>Checkout</h1></center>


<a href="dashboard.php">
<img src="images/logo.png" id="logo">
</a>


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



<a href="user.php">
    <img src="images/user1.png" id="usericon"
         style="width: 60px;
    height: 60px;
    position: absolute;
    top: 10px;
    right: 70px;">
</a>


<div id="footer" style="
       text-align: center;
    color: white;
    margin-top: 100px;
    padding: 20px;
    font-size: 14px;
    opacity: 0.7;
">
    <p>© 2025 NG Auto. All rights reserved.</p>
    <p>Contact: support@ngauto.com | +880-111-222-333</p>
</div>



</body>
</html>
