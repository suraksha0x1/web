<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="webs.css">
</head>
<body>
    <header>
        <a href="#" class="logo"> Pixels Photography </a>
        <nav class="navbar">
          <a href="index.php"> Home </a>
          <a href="aboutus.php">About Us </a>
          
          <a href="gallery.php"> Gallery </a>
          <a href="exp.php"> Experience and Skill </a>
          <a href="contact.php"> Contact Us </a>
        </nav>
      </header>
      <section class="about" id="about">
        <div class="about-imag">
          <img src="image1.jpg">
        </div>
        <div class="about-text">
          <h2> About <span> Us </span></h2>
          <h4> <?php
          include 'connect.php';
          $query = "SELECT title, description FROM about_us";
          
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            
            while ($row = mysqli_fetch_assoc($result)) {
                
              echo $row['title'];
            }
          } 
        ?></h4>
          <p> <?php
          include 'connect.php';
          $query = "SELECT title, description FROM about_us";
          
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            
            while ($row = mysqli_fetch_assoc($result)) {
                
              echo $row['description'];
            }
          } 
        ?>

          </p>
          <a href="#" class="btn-box">View more about us  </a>
        </div>
      </section>
      <?php include 'footer.html'; ?>
    

    
</body>
</html>