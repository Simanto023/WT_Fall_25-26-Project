<!DOCTYPE html>
<html>
<head>
    <title>PHP Code</title>
</head>
<body>

<h1>Welcome to Registration</h1>

<?php
$name = $email = $gender = $degree = $blood = "";
$dd = $mm = $yy = "";

$nameErr = $emailErr = $dobErr = $genderErr = $degreeErr = $bloodErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // NAME
    if (empty($_POST["name"])) {
        $nameErr = "Please fill out your name";
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z].{1,}$/", $name)) {
            $nameErr = "Name must start with a letter and have 2 characters minimum";
        } else if (!preg_match("/^[a-zA-Z .-]+$/", $name)) {
            $nameErr = "Invalid name format.";
        }
    } 

    // EMAIL
    if (empty($_POST["email"])) {
        $emailErr = "Please fill out your email";
    } else {
        $email = $_POST["email"];
        if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
            $emailErr = "Invalid email format";
        }
    }

    // DATE OF BIRTH
    if (empty($_POST["dd"]) || empty($_POST["mm"]) || empty($_POST["yy"])) {
        $dobErr = "Please fill out your date of birth";
    } else {
        $dd = $_POST["dd"];
        $mm = $_POST["mm"];
        $yy = $_POST["yy"];
        if ($dd < 1 || $dd > 31 || $mm < 1 || $mm > 12 || $yy < 1800 || $yy > 2025) {
            $dobErr = "Invalid date";
        }
    }

    // GENDER
    if (empty($_POST["gender"])) {
        $genderErr = "Please select your gender";
    } else {
        $gender = $_POST["gender"];
    }

    // DEGREE
    if (empty($_POST["degree"])) {
        $degreeErr = "Please select your degree";
    } else {
        $degree = $_POST["degree"];
    }

    // BLOOD GROUP
    if (empty($_POST["blood"])) {
        $bloodErr = "Please select your blood group";
    } else {
        $blood = $_POST["blood"];
    }
}
?>

<form method="post">
    Name:
    <input type="text" name="name" value="<?php echo $name; ?>">
    <?php echo $nameErr; ?>
    <br><br>

    Email:
    <input type="text" name="email" value="<?php echo $email; ?>">
    <?php echo $emailErr; ?>
    <br><br>

    Date of Birth:
    <input type="text" name="dd" size="2" value="<?php echo $dd; ?>">
    <input type="text" name="mm" size="2" value="<?php echo $mm; ?>">
    <input type="text" name="yy" size="4" value="<?php echo $yy; ?>">
    <?php echo $dobErr; ?>
    <br><br>

    Gender:
    <input type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?>>Male
    <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?>>Female
    <?php echo $genderErr; ?>
    <br><br>

    Degree:
    <select name="degree">
        <option value="">Select</option>
        <option value="BSc" <?php if ($degree == "BSc") echo "selected"; ?>>BSc</option>
        <option value="MSc" <?php if ($degree == "MSc") echo "selected"; ?>>MSc</option>
        <option value="PhD" <?php if ($degree == "PhD") echo "selected"; ?>>PhD</option>
    </select>
    <?php echo $degreeErr; ?>
    <br><br>

    Blood Group:
    <select name="blood">
        <option value="">Select</option>
        <option value="A+" <?php if ($blood == "A+") echo "selected"; ?>>A+</option>
        <option value="A-" <?php if ($blood == "A-") echo "selected"; ?>>A-</option>
        <option value="B+" <?php if ($blood == "B+") echo "selected"; ?>>B+</option>
        <option value="B-" <?php if ($blood == "B-") echo "selected"; ?>>B-</option>
        <option value="O+" <?php if ($blood == "O+") echo "selected"; ?>>O+</option>
        <option value="O-" <?php if ($blood == "O-") echo "selected"; ?>>O-</option>
        <option value="AB+" <?php if ($blood == "AB+") echo "selected"; ?>>AB+</option>
        <option value="AB-" <?php if ($blood == "AB-") echo "selected"; ?>>AB-</option>
    </select>
    <?php echo $bloodErr; ?>
    <br><br>

    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($emailErr) && empty($dobErr)
    && empty($genderErr) && empty($degreeErr) && empty($bloodErr)) {

    echo "<h3>Your Input:</h3>";
    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "DOB: $dd-$mm-$yy <br>";
    echo "Gender: $gender <br>";
    echo "Degree: $degree <br>";
    echo "Blood Group: $blood <br>";
}
?>

</body>
</html>
