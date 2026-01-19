<?php
include __DIR__ . "/../../DB/db.php";


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sell your car</title>
    <link rel="stylesheet" href="../View/css/postlisting.css">
</head>
<body>

<h1>Sell Your Car</h1>


<a href="dashboard.php">
    <img src="../../images/logo.png" id="logo">
</a>




<?php
$name = "";
$brand = "";
$location = "";
$condition = "";
$price = "";
$phone_number = "";
$description = "";
$image = "";

$error = "";

if (isset($_POST["submit"])) {

    // Car Name
    if (empty($_POST["name"])) {
        $error .= "Car name is required.<br>";
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
            $error .= "Car name can only contain letters and spaces.<br>";
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
    if ($_POST["price"] === "") {
        $error .= "Price is required.<br>";
    } else if (!is_numeric($_POST["price"])) {
        $error .= "Price must be numeric.<br>";
    } else {
        $price = $_POST["price"];
    }


    // Phone number
    if ($_POST["phone_number"] === "") {
    $error .= "Phone number is required.<br>";
    } 
    else {
    $phone_number = $_POST["phone_number"];

    if (!is_numeric($phone_number)) {
        $error .= "Phone number must be numeric.<br>";
    }
    else if (strlen($phone_number) != 11) {
        $error .= "Phone number must be 11 digits.<br>";
    }
    else if (substr($phone_number, 0, 2) != "01") {
        $error .= "Phone number must start with 01.<br>";
    }
    }

    // Description
    if (empty($_POST["description"])) {
        $error .= "Description is required.<br>";
    } else {
        $description = $_POST["description"];
    }

    // Image
    if (empty($_FILES["image"]["name"])) {
        $error .= "Image is required.<br>";
    } else {
        $image = $_FILES["image"]["name"];
        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        $allowed = array("jpg", "jpeg", "png", "gif");

        if (!in_array($ext, $allowed)) {
            $error .= "Only JPG, JPEG, PNG, or GIF images allowed.<br>";
        }
    }

if ($error == "") {

    
    $newImageName = time() . "_" . basename($_FILES["image"]["name"]);
    $targetPath = "images/marketplace/" . $newImageName;

    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath)) {

        
        $sql = "INSERT INTO marketplace_listings 
        (car_name, brand, location, cond, price, phone_number, description, image, status)
        VALUES 
        ('$name', '$brand', '$location', '$condition', '$price', '$phone_number', '$description', '$newImageName', 'approved')"; //pore pending korte hobe. approved RAKHLAM TESTING ER JNNO

        if ($conn->query($sql)) {
            echo "<p style='color:green;'>Listing posted successfully!</p>";
        } else {
            echo "<p style='color:red;'>Database error: " . $conn->error . "</p>";
        }

    } else {
        echo "<p style='color:red;'>Failed to upload image.</p>";
    }
}

}
?>

<form method="post" action="" enctype="multipart/form-data">

    <label>Car Name:</label><br>
    <input type="text" name="name" value="<?php echo $name; ?>"><br><br>

    <label>Brand:</label><br>
    <select name="brand">
        <option value="">Select Brand</option>
        <option>Abarth</option>
        <option>Acura</option>
        <option>Alfa Romeo</option>
        <option>Audi</option>
        <option>BMW</option>
        <option>Bugatti</option>
        <option>Cadillac</option>
        <option>Chevrolet</option>
        <option>Chrysler</option>
        <option>Citroen</option>
        <option>Dacia</option>
        <option>Daewoo</option>
        <option>Daihatsu</option>
        <option>Dodge</option>
        <option>Ferrari</option>
        <option>Fiat</option>
        <option>Ford</option>
        <option>Genesis</option>
        <option>GMC</option>
        <option>Honda</option>
        <option>Hyundai</option>
        <option>Infiniti</option>
        <option>Isuzu</option>
        <option>Jaguar</option>
        <option>Jeep</option>
        <option>Kia</option>
        <option>Lamborghini</option>
        <option>Land Rover</option>
        <option>Lexus</option>
        <option>Maserati</option>
        <option>Mazda</option>
        <option>McLaren</option>
        <option>Mercedes-Benz</option>
        <option>Mini</option>
        <option>Mitsubishi</option>
        <option>Nissan</option>
        <option>Opel</option>
        <option>Peugeot</option>
        <option>Porsche</option>
        <option>Renault</option>
        <option>Rolls-Royce</option>
        <option>Saab</option>
        <option>Skoda</option>
        <option>Subaru</option>
        <option>Suzuki</option>
        <option>Tesla</option>
        <option>Toyota</option>
        <option>Volkswagen</option>
        <option>Volvo</option>
    </select><br><br>

    <label>Location:</label><br>
    <select name="location">
        <option value="">Select Location</option>
        <option>Dhaka</option>
        <option>Chattogram</option>
        <option>Rajshahi</option>
        <option>Khulna</option>
        <option>Barishal</option>
        <option>Sylhet</option>
        <option>Rangpur</option>
        <option>Mymensingh</option>
    </select><br><br>

    <label>Condition:</label><br>
    <input type="radio" name="condition" value="new"> New
    <input type="radio" name="condition" value="used"> Used
    <br><br>

    <label>Price:</label><br>
    <input type="number" name="price" value="<?php echo $price; ?>"><br><br>

    <label>Phone Number:</label><br>
    <input type="number" name="phone_number" value="<?php echo $phone_number; ?>"><br><br>

    <label>Description:</label><br>
    <textarea name="description" rows="4" cols="40"><?php echo $description; ?></textarea><br><br>

    <label>Upload Image:</label><br>
    <input type="file" name="image"><br><br>

    <input type="submit" name="submit" value="Submit Listing">

</form>

<?php
if ($error != "") {
    echo "<p style='color:red;'>$error</p>";
}
?>



<a href="user.php">
    <img src="../../images/user1.png" id="usericon"
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
