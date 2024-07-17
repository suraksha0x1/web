<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #333;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }
        header {
            width: 100%;
            background: #222;
            padding: 15px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        header .logo {
            color: white;
            font-size: 24px;
            text-decoration: none;
            margin-left: 20px;
        }
        header .navbar {
            display: flex;
        }
        header .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            transition: color 0.3s;
        }
        header .navbar a:hover {
            color: #f0f0f0;
        }
        h1 {
            margin-top: 20px;
            color: #fff;
        }
        .category-title {
            margin: 20px 0;
            font-size: 22px;
            color: #fff;
        }
        .gallery-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 20px;
        }
        .gallery-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        .gallery-item:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <header>
        <a href="#" class="logo">Pixels Photography</a>
        <nav class="navbar">
          <a href="index.php">Home</a>
          <a href="aboutus.php">About Us</a>
          <a href="gallery.php">Gallery</a>
          <a href="exp.php">Experience and Skill</a>
          <a href="contact.php">Contact Us</a>
        </nav>
    </header>
    <h1>Image Gallery</h1>   
    <div class="category-title">Nature Projects</div>
    <div class="gallery-container">
        <?php
            include 'connect.php';
            $query = "SELECT img_name FROM image WHERE category='nature'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="gallery-item">';
                    echo '<img src="images/' . $row['img_name'] . '" alt="Image">';
                    echo '</div>';
                }
            } else {
                echo '<p>No images found in the nature projects category.</p>';
            }
        ?>
    </div>

    <div class="category-title">Wedding Projects</div>
    <div class="gallery-container">
        <?php
            $query = "SELECT img_name FROM image WHERE category='wedding'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="gallery-item">';
                    echo '<img src="images/' . $row['img_name'] . '" alt="Image">';
                    echo '</div>';
                }
            } else {
                echo '<p>No images found in the wedding projects category.</p>';
            }
        ?>
    </div>

    
</body>
</html>
