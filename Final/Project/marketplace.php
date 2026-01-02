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

<h1>Car Marketplace</h1>
    
<a href="dashboard.php">
    <img src="images/logo.png" id="logo">
</a>


<h2>Most recent used cars for sale</h2>


<div id="search_box">
    <input type="text" placeholder="Search cars">
    <button>Search</button>
</div>

<h3 id="filter_title">Filter Options</h3>




<div id="filter">

    
        <label>Brand</label>
        <select>
        <option>All Brands</option>
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
        </select>
    
    
        <label>Location</label>
        <select>
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
        <br>
        <br>

       <label>Condition</label>

    <input type="radio" name="condition" value="new"> New

    <input type="radio" name="condition" value="used"> Used

    <br>
    <br>


<div id="price_range">
    <label>Price Range</label><br>

    <input type="number" placeholder="Min Price">
    <input type="number" placeholder="Max Price">
</div>

<br>
<br>


</div>


<div id="post">
<a href="postlisting.php">
    <button style ="background:orange;font-weight: bold;">Post your own listing</button>
</a>
</div>

<br>
<br>



<div id="marketplace">

    <div class="listing-card">
        <div class="listing-img">Image</div>

        <div class="listing-info">
            <h3>Car Title</h3>
            <p>Location</p>

            <div class="listing-meta">
                Brand <br> <br>
                Condition
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
                Brand <br> <br>
                Condition
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
                Brand <br> <br>
                Condition
            </div>

            <p class="price">Price</p>
        </div>
    </div>

</div>




<a href="user1.html">
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