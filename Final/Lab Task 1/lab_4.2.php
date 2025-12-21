<!DOCTYPE html>
<html>
<body>

<?php
$nameError =""; 
$emailError = "";
$dobError = "";
$genderError = "";
$degreeError = "";
$bgError = "";
$isValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameError = "Name is empty";
        $isValid = false;
    } else {
        $name = trim($_POST["name"]);
        if (!preg_match("/^[A-Za-z][A-Za-z .-]*$/", $name)) {
            $nameError = "Invalid name";
            $isValid = false;
        } else if (str_word_count($name) < 2) {
            $nameError = "At least two words required";
            $isValid = false;
        }
    }

    
    if (empty($_POST["email"])) {
    $emailError = "Email is empty";
    $isValid = false;
} else {
    $email = trim($_POST["email"]);

    if (!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/", $email)) {
        $emailError = "Invalid email format";
        $isValid = false;
    }
}

    
    if (empty($_POST["dd"]) || empty($_POST["mm"]) || empty($_POST["yy"])) {
        $dobError = "Date required";
        $isValid = false;
    } else if ($_POST["dd"] < 1 || $_POST["dd"] > 31 ||
               $_POST["mm"] < 1 || $_POST["mm"] > 12 ||
               $_POST["yy"] < 1953 || $_POST["yy"] > 1998) {
        $dobError = "Invalid date";
        $isValid = false;
    }

    
    if (!isset($_POST["gender"])) {
        $genderError = "Gender required";
        $isValid = false;
    }

    
    if (!isset($_POST["degree"]) || count($_POST["degree"]) < 2) {
        $degreeError = "Select at least two";
        $isValid = false;
    }


    if (empty($_POST["bg"])) {
        $bgError = "Blood group required";
        $isValid = false;
    }
}
?>

<form method="post">

Name: <input type="text" name="name"> <?php echo $nameError; ?><br><br>

Email: <input type="text" name="email"> <?php echo $emailError; ?><br><br>

Date of Birth:
<input type="text" name="dd"> /
<input type="text" name="mm"> /
<input type="text" name="yy">
<?php echo $dobError; ?><br><br>

Gender:
<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female
<?php echo $genderError; ?><br><br>

Degree:
<input type="checkbox" name="degree" value="SSC">SSC
<input type="checkbox" name="degree" value="HSC">HSC
<input type="checkbox" name="degree" value="BSc">BSc
<input type="checkbox" name="degree" value="MSc">MSC
<?php echo $degreeError; ?><br><br>

Blood Group:
<select name="bg">
    <option value="">Select</option>
    <option value="A+">A+</option>
    <option value="B+">B+</option>
    <option value="O+">O+</option>
</select>
<?php echo $bgError; ?><br><br>

<input type="submit" value="Submit">

</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && $isValid) {
    echo "All validations successful";
}
?>

</body>
</html>
