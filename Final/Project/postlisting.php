<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sell your car</title>
</head>
<body>

<center> <h1>Put your car up for sale!</h1> </center>

<?php
$name = "";
$brand = "";
$location = "";
$condition = "";
$price = "";
$phonenumber = "";
$image = "";

$error = "";

if (isset($_POST["submit"])) {

    // Listing Title
    if (empty($_POST["name"])) {
        $error .= "Name is required.<br>";
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
            $error .= "Name can only contain letters and spaces.<br>";
        }
    }

    // Brand
    if (empty($_POST["brand"])) {
        $error .= "Brand is required.<br>";
    } else {
        $brand = $_POST["brand"];
    }

    // Location
    if (empty($_POST["location"])) {
        $error .= "Location is required.<br>";
    } else {
        $location = $_POST["location"];
    }

    // Condition
    if (empty($_POST["condition"])) {
        $error .= "Condition is required.<br>";
    } else {
        $condition = $_POST["condition"];
    }

    // Price
    if (empty($_POST["price"])) {
        $error .= "Price is required.<br>";
    } else if (!is_numeric($_POST["price"])) {
        $error .= "Price must be numeric.<br>";
    } else {
        $price = $_POST["price"];
    }

    // Phone Number
    if (empty($_POST["phonenumber"])) {
        $error .= "Phone number is required.<br>";
    } else if (!is_numeric($_POST["phonenumber"])) {
        $error .= "Phone number must be numeric.<br>";
    } else {
        $phonenumber = $_POST["phonenumber"];
    }

    // Image Upload
    if (empty($_FILES["image"]["name"])) {
        $error .= "Image is required.<br>";
    } else {
        $image = $_FILES["image"]["name"];
        $allowed = array("jpg", "jpeg", "png", "gif");
        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            $error .= "Only JPG, JPEG, PNG, and GIF images are allowed.<br>";
        }
    }

    // Success (no errors)
    if ($error == "") {
        echo "<p style='color:green;'>Form submitted successfully!</p>";
        // Later you will:
        // - move uploaded file
        // - insert into database
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">

    <label>Listing Title:</label><br>
    <input type="text" name="name" value="<?php echo $name; ?>"><br><br>

    <label>Brand:</label><br>
    <input type="text" name="brand" value="<?php echo $brand; ?>"><br><br>

    <label>Location:</label><br>
    <input type="text" name="location" value="<?php echo $location; ?>"><br><br>

    <label>Condition:</label><br>
    <input type="radio" name="condition" value="new"> New
    <input type="radio" name="condition" value="used"> Used
    <br><br>

    <label>Price:</label><br>
    <input type="text" name="price" value="<?php echo $price; ?>"><br><br>

    <label>Phone Number:</label><br>
    <input type="text" name="phonenumber" value="<?php echo $phonenumber; ?>"><br><br>

    <label>Upload Image:</label><br>
    <input type="file" name="image"><br><br>

    <input type="submit" name="submit" value="Submit Listing">

</form>

<?php




// Show errors at bottom

if ($error != "") {
    echo "<p style='color:red;'>$error</p>";
}
?>

</body>
</html>
