<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Cars | NG Auto</title>
    <link rel="stylesheet" href="css/manage_cars.css">
</head>

<script src="js/manage_cars.js"></script>
<body>

<header>
    <div class="topbar">
        <div class="brand">
            <img src="images/logo.png" alt="NG Auto">
            <span>NG AUTO</span>
        </div>
        <a href="admin_dashboard.html" class="back">← Back to Dashboard</a>
    </div>
</header>

<main>

    <div class="page-header">
        <h2>Manage Cars</h2>
        <button type="button" onclick="toggleForm()">+ Add New Car</button>
    </div>

    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Color</th>
                <th>Engine</th>
                <th>HP</th>
                <th>Transmission</th>
                <th>Price</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            
            <tr>
                <td><img src="images/cars/audi_a6.png" class="car-thumb"></td>
                <td>Audi</td>
                <td>A6</td>
                <td>White</td>
                <td>2.0L Turbo</td>
                <td>261</td>
                <td>Automatic</td>
                <td>$55,000</td>
                <td>Sedan</td>
                <td>
                    <button class="edit" type="button" onclick="toggleForm()">Edit</button>
                    <button class="delete" type="button" onclick="return confirm('Delete this car?')">Delete</button>
                </td>
            </tr>

           <tr>
                <td><img src="images/cars/bmw_x5.png" class="car-thumb"></td>
                <td>BMW</td>
                <td>X5</td>
                <td>Black</td>
                <td>3.0L</td>
                <td>335</td>
                <td>Automatic</td>
                <td>$60,000</td>
                <td>SUV</td>
                <td>
                    <button class="edit" type="button" onclick="toggleForm()">Edit</button>
                    <button class="delete" type="button" onclick="return confirm('Delete this car?')">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

    <form id="carForm" method="post" action="PHP/add_car.php" enctype="multipart/form-data">
        <h3>Add / Edit Car</h3>

        <div class="form-group">
            <label>Brand</label>
            <input type="text" name="brand">
        </div>

        <div class="form-group">
            <label>Model</label>
            <input type="text" name="model">
        </div>

        <div class="form-group">
            <label>Color</label>
            <input type="text" name="color" placeholder="e.g. Black, White, Red">
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price">
        </div>

        <div class="form-group">
            <label>Engine Capacity (L)</label>
            <input type="text" name="engine_capacity" placeholder="e.g. 1.8L">
        </div>

        <div class="form-group">
            <label>Horsepower (HP)</label>
            <input type="number" name="horsepower" placeholder="e.g. 150">
        </div>

        <div class="form-group">
            <label>Transmission</label>
            <select name="transmission">
                <option>Automatic</option>
                <option>Manual</option>
                <option>CVT</option>
            </select>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category">
                <option>Family</option>
                <option>Sports</option>
            </select>
        </div>

        <div class="form-group">
            <label>Car Image</label>
            <input type="file" name="image">
        </div>

        <div class="form-actions">
            <button type="submit" class="save">Save</button>
            <button type="button" class="cancel" onclick="toggleForm()">Cancel</button>
        </div>
    </form>

</main>



</body>
</html>
