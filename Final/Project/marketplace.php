<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/marketplace.css">
    <script src="JS/marketplace.js" defer></script>

</head>
<body>
    
<a href="dashboard.php">
    <img src="images/logo.png" id="logo">
</a>


<h2>Most recent cars for sale</h2>


<div id="post-listing">
    <a href="postlisting.php">
        <button class="post-btn">Post Your Listing</button>
    </a>
</div>



<div id="filter-box">

    <h2>Find the Best Car Price in Bangladesh</h2>

    <div class="filter-row">
        <button class="type-btn active">Cars</button>
        <button class="type-btn">Bikes</button>
        <button class="type-btn">Trucks</button>
    </div>

    <div class="filter-row">
        <div class="filter-item">
            <label>Brand</label>
            <select>
                <option>All</option>
            </select>
        </div>

        <div class="filter-item">
            <label>Model</label>
            <select>
                <option>Select brand first</option>
            </select>
        </div>
    </div>

    <div class="filter-row">
        <div class="filter-item">
            <label>Price Range</label>
            <input type="range">
        </div>
    </div>

    <div class="filter-row">
        <div class="filter-item">
            <label>Condition</label>
            <div class="radio-group">
                <input type="radio" name="condition"> New
                <input type="radio" name="condition"> Used
            </div>
        </div>
    </div>

    <div class="filter-row buttons">
        <button class="reset-btn">Reset</button>
        <button class="search-btn">Search</button>
    </div>

</div>




<div id="marketplace">

    <div class="listing-card">
        <div class="listing-img">Image</div>

        <div class="listing-info">
            <h3>Car Title</h3>
            <p>Location</p>

            <div class="listing-meta">
                <span>Mileage</span>
                <span>Fuel</span>
                <span>Transmission</span>
            </div>

            <p class="price">Price</p>
        </div>
    </div>

    <div class="listing-card">
        <div class="listing-img">Image</div>

        <div class="listing-info">
            <h3>Car Title</h3>
            <p>Location</p>

            <div class="listing-meta">
                <span>Mileage</span>
                <span>Fuel</span>
                <span>Transmission</span>
            </div>

            <p class="price">Price</p>
        </div>
    </div>

    <div class="listing-card">
        <div class="listing-img">Image</div>

        <div class="listing-info">
            <h3>Car Title</h3>
            <p>Location</p>

            <div class="listing-meta">
                <span>Mileage</span>
                <span>Fuel</span>
                <span>Transmission</span>
            </div>

            <p class="price">Price</p>
        </div>
    </div>

</div>




<a href="user1.html">
    <img src="images/user1.png" id="usericon"
         style="width:60px; height:60px; position:absolute; top:10px; right:70px; z-index:1000; border:3px solid red;">
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