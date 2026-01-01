<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="CSS/cart.css">
</head>
<body>
    

<a href="dashboard.php">
<img src="images/logo.png" id="logo">
</a>



<center><h2>Your Cart</h2></center>

<div id="cart">

    <div class="cart-box">
        <img src="images/2020-toyota-corolla-sedan.jpg">
        <h3>Toyota Corolla</h3>
        <p>Price: 2,500,000</p>
        <p>139 HP • 1.8L • Automatic</p>
    </div>

    <div class="cart-box">
        <img src="images/honda civic.jpg">
        <h3>Honda Civic</h3>
        <p>Price: 3,000,000</p>
        <p>158 HP • 2.0L • Automatic</p>
    </div>

</div>

<hr>

<center>
    <p><strong>Total:</strong> 5,500,000</p>

   <a href="checkout.php"> <button id="checkout_btn">Proceed to Checkout</button> </a>
</center>







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