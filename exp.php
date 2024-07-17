<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixels Photography</title>
    <link rel="stylesheet" href="exp.css">
</head>
<body>
    <header>
        <a href="#" class="logo">Pixels Photography</a>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="gallery.php">Gallery</a>
            <a href="exp.php">Experience and Skill</a>
            <a href="contact.php">Contact Us</a>
        </nav>
    </header>
    <section>
        <div class="container1" id="Skills">
            <h1 class="heading1"> <?php 
            include 'connect.php';
            $query = "SELECT title, description FROM experience";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['title'];
        }
    }








?></h1>
            <div class="technical-bars">
                <div class="bar">
                    <h2>Skills</h2>
                    <div class="info">  
                        <span>1. Technical proficiency</span>
                    </div>
                    <div class="progress-line html"><span></span></div>
                </div>
                <div class="bar2">
                    <div class="info2">
                        <span>2. Artistic Vision</span>
                    </div>
                    <div class="progress-line2 css"><span></span></div>
                </div>
                <div class="bar3">
                    <div class="info3">
                        <span>3. Photo editing and Image management</span>
                    </div>
                    <div class="progress-line3 javascript"><span></span></div>
                </div>
                <div class="bar4">
                    <div class="info4">
                        <span>4. Portrait and Landscape photography</span>
                    </div>
                    <div class="progress-line4 python"><span></span></div>
                </div>
                <div class="bar5">
                    <div class="info5">
                        <span>5. Adaptability and Problem Solving</span>
                    </div>
                    <div class="progress-line react5"><span></span></div>
                </div>
            </div>
            <br><br><br>
            <div class="Experience" id="Experience">
                <h2>Experience</h2>
                <div class="exp">
                    <h4>
                    <p> <?php  
                    include 'connect.php';
                    $query = "SELECT title, description FROM experience";
                     $result = mysqli_query($conn, $query);
                     if (mysqli_num_rows($result) > 0) {
                         while ($row = mysqli_fetch_assoc($result)) {
                             echo $row['description'];
      }
    } 
?>

</p>


                        

                    </h4>
                    <br><br>
                    <h4>
                        Our photographers are not just experts behind the lens; they are artists who see the world through a unique perspective. Trained in the latest techniques and equipped with state-of-the-art technology, they have a keen eye for detail and a passion for innovation. We specialize in:
                        <br><br>
                        1. Wedding Photography: Capturing the romantic, happy, and timeless beauty of your special day.<br>
                        2. Event Photography: Documenting the energy and emotion of corporate events, parties, and celebrations.<br>
                        3. Portrait Photography: Creating stunning portraits that reveal the true essence of individuals and families.<br>
                        4. Commercial Photography: Delivering compelling visuals that enhance brand stories and marketing campaigns.
                    </h4>
                </div>
            </div>
            <h2 class="heading1">Achievements and Awards</h2>
            <div class="portfolio-grid">
                <div class="portfolio-item">
                    <img src="OIP (1).jpeg" alt="Project 1">
                    <div class="layer">
                        <h5>Best Wedding Photographer Award (2022)</h5>
                        <p>Recognized by the International Wedding Photography Association for our exceptional ability to capture the romance and joy of wedding celebrations.</p>
                    </div>
                </div>
                <div class="portfolio-item">
                    <img src="event.jpg" alt="Project 2">
                    <div class="layer">
                        <h5>Top Event Photographer (2024)</h5>
                        <p>Awarded by the Global Event Photographers Guild for our outstanding work in documenting corporate and social events with creativity and precision.</p>
                    </div>
                </div>
                <div class="portfolio-item">
                    <img src="img.jpeg" alt="Project 3">
                    <div class="layer">
                        <h5>Excellence in Portrait Photography (2023)</h5>
                        <p>Honored by the National Portrait Photography Society for our ability to reveal the true essence of individuals and families through our portraits.</p>
                    </div>
                </div>
                <div class="portfolio-item">
                    <img src="win.jpg" alt="Project 4">
                    <div class="layer">
                        <h5>Innovative Commercial Photography Award (2022)</h5>
                        <p>Granted by the Commercial Photography Institute for our innovative approach in creating compelling visuals that enhance brand narratives.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>
v