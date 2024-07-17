<?php
// Initialize the error variables
$user_name_err = $email_err = $message_err = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "suraksha@123";
    $dbname = "website";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Define variables and initialize with empty values
    $user_name = $email = $message = "";

    // Validate username
    if (empty(trim($_POST["Username"]))) {
        $user_name_err = "Please enter a username.";
    } else {
        $user_name = trim($_POST["Username"]);
    }

    // Validate email
    if (empty(trim($_POST["Email"]))) {
        $email_err = "Please enter an email.";
    } elseif (!filter_var(trim($_POST["Email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please enter a valid email address.";
    } else {
        $email = trim($_POST["Email"]);
    }

    // Validate message
    if (empty(trim($_POST["Message"]))) {
        $message_err = "Please enter a message.";
    } else {
        $message = trim($_POST["Message"]);
    }

    // Check input errors before inserting in database
    if (empty($user_name_err) && empty($email_err) && empty($message_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO contact (username, email, message) VALUES (?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) { //prepare sql statement for execution and helps for sql injection by separating the query structure from data.
            // Bind variables to the prepared statement as parameters. Binding parameters is crucial for security as it ensures that user input is treated as data rather than executable code.
            $stmt->bind_param("sss", $param_username, $param_email, $param_message);//for the prevention of sql injection.

            // Set parameters
            $param_username = $user_name;
            $param_email = $email;
            $param_message = $message;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to contact page with success message
                header("location: contact.php?status=success");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $conn->close();
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation Form</title>
    <link rel="stylesheet" href="validd.css">
</head>
<body>
    <header>
        <a href="#" class="logo">Pixels Photography</a>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="aboutus.php">About Us</a>
            <a href="gallery.php">Gallery</a>
            <a href="exp.php">Experience and Skill</a>      
            <a href="contact.php">Contact Us</a> lala hunxa vayo xordau
        </nav>
    </header>
    
    <div class="container">
        <div class="contact-text">
            <h1>Contact <span>Us</span></h1>
            <h4>Let's work together</h4>
            <p>Working together in a peaceful and satisfying way as a team for the overall welfare.</p>
            <div class="contact-list">
                <li><i class='bx bx-send'></i>Email: pixel@gmail.com</li>
                <li><i class='bx bx-phone'></i>Number: 075690435</li>
            </div>
        </div>
        <div class="form-box">
            <?php
            if (isset($_GET['status']) && $_GET['status'] == 'success') {
                echo "<p class='success'>Message sent successfully!</p>";
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="FormFill" onsubmit="return validation()">
                <h2>Contact</h2>
                <div class="input-box">
                    <input type="text" id="username" name="Username" placeholder="Username" value="<?php echo isset($_POST['Username']) ? htmlspecialchars($_POST['Username']) : ''; ?>">
                    <span class="error"><?php echo $user_name_err; ?></span>
                </div>
                <div class="input-box">
                    <input type="email" id="email" name="Email" placeholder="Email" value="<?php echo isset($_POST['Email']) ? htmlspecialchars($_POST['Email']) : ''; ?>">
                    <span class="error"><?php echo $email_err; ?></span>
                </div>
                <div class="input-box">
                    <textarea id="message" name="Message" placeholder="Your Message" class="large-textarea" rows="10" cols="50"><?php echo isset($_POST['Message']) ? htmlspecialchars($_POST['Message']) : ''; ?></textarea>
                    <span class="error"><?php echo $message_err; ?></span>
                </div>
                <div class="button">
                    <input type="submit" class="btn" value="Send">
                </div>
                <div class="group">
                    <span><a href="#">Forgot Password</a></span>
                    <span><a href="#">Login</a></span>
                </div>
            </form>
        </div>
    </div>
    <?php include 'footer.html'; ?>

    <script src="valids.js"></script>
</body>
</html>
