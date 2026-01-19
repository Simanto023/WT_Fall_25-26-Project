<?php
include __DIR__ . "/../../DB/db.php";



$listings = [];

$search     = $_GET["search"] ?? "";
$brand      = $_GET["brand"] ?? "";
$location   = $_GET["location"] ?? "";
$condition  = $_GET["condition"] ?? "";
$min_price  = $_GET["min_price"] ?? "";
$max_price  = $_GET["max_price"] ?? "";

$sql = "SELECT * FROM marketplace_listings WHERE status = 'approved'";

if ($search != "") {
    $search = $conn->real_escape_string($search);
    $sql .= " AND car_name LIKE '%$search%'";
}

if ($brand != "" && $brand != "All Brands") {
    $sql .= " AND brand = '$brand'";
}

if ($location != "" && $location != "All Locations") {
    $sql .= " AND location = '$location'";
}

if ($condition != "") {
    $sql .= " AND cond = '$condition'";
}

if ($min_price != "") {
    $sql .= " AND price >= $min_price";
}

if ($max_price != "") {
    $sql .= " AND price <= $max_price";
}

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $listings[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marketplace</title>
    <link rel="stylesheet" href="../View/css/marketplace.css">
</head>
<body>

<h1>Car Marketplace</h1>

<a href="dashboard.php">
    <img src="../../images/logo.png" id="logo">
</a>


<a href="user.php">
    <img src="../../images/user1.png" id="usericon"
         style="width: 60px;
    height: 60px;
    position: absolute;
    top: 10px;
    right: 70px;">
</a>


<h2>Most recent used cars for sale</h2>

<form method="get" action="">

    <div id="search_box">
        <input type="text" name="search" placeholder="Search cars" value="<?php echo $search; ?>">
        <button type="submit">Search</button>
    </div>

    <h3 id="filter_title">Filter Options</h3>

    <div id="filter">

        <label>Brand</label>
        <select name="brand">
            <option>All Brands</option>
            <option>BMW</option>
            <option>Honda</option>
            <option>Toyota</option>
            <option>Nissan</option>
            <option>Mercedes-Benz</option>
            <option>Audi</option>
        </select>

        <label>Location</label>
        <select name="location">
            <option>All Locations</option>
            <option>Dhaka</option>
            <option>Chattogram</option>
            <option>Rajshahi</option>
            <option>Khulna</option>
            <option>Barishal</option>
            <option>Sylhet</option>
            <option>Rangpur</option>
            <option>Mymensingh</option>
        </select>

        <br><br>

        <label>Condition</label>
        <input type="radio" name="condition" value="new"> New
        <input type="radio" name="condition" value="used"> Used

        <br><br>

        <div id="price_range">
            <label>Price Range</label><br>
            <input type="number" name="min_price" placeholder="Min Price">
            <input type="number" name="max_price" placeholder="Max Price">
        </div>

        <br>

        <button type="submit"
            style="
                background: orange;
                color: black;
                font-weight: bold;
                padding: 10px 20px;
                border: none;
                cursor: pointer;
            ">
            Apply Filters
        </button>

    </div>

</form>

<div id="post" style="margin:20px;">
    <a href="postlisting.php">
        <button
            style="
                background: orange;
                color: black;
                font-weight: bold;
                padding: 14px 26px;
                font-size: 16px;
                border: none;
                border-radius: 6px;
                cursor: pointer;
            ">
            Post your own listing
        </button>
    </a>
</div>

<div id="marketplace">

<?php
if (!empty($listings)) {
    foreach ($listings as $item) {
        echo '
        <a href="used_car.php?id='.$item['id'].'" style="text-decoration:none; color:white;">
            <div class="listing-card">
                <div class="listing-img">
                    <img src="../../images/marketplace/'.$item['image'].'" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div class="listing-info">
                    <h3>'.$item['car_name'].'</h3>
                    <p>'.$item['location'].'</p>
                    <div class="listing-meta">
                        '.$item['brand'].'<br><br>
                        '.$item['cond'].'
                    </div>
                    <p class="price">'.$item['price'].'</p>
                </div>
            </div>
        </a>
        ';
    }
} else {
    echo "<p style='margin:20px;'>No listings found.</p>";
}
?>

</div>

</body>
</html>
