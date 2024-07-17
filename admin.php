
<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-color:gainsboro;
    }

    .nav-tabs {
      margin-bottom: 20px;
    }

    .tab-content {
      padding: 20px;
      border: 1px solid black;
      border-top: none;
      background-color: silver; 
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center">Admin Panel</h1>
    <ul class="nav nav-tabs" id="adminTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
          role="tab" aria-controls="home" aria-selected="true">About Us</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#gallery" type="button"
          role="tab" aria-controls="gallery" aria-selected="true">Gallery</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button"
          role="tab" aria-controls="skills" aria-selected="false">Skills/Experience</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
          role="tab" aria-controls="contact" aria-selected="false">Contact</button>
      </li>
    </ul>
    <div class="tab-content" id="adminTabsContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <form method="post">
          <div class="mb-3">
            <label for="homeTitle" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="homeTitle" placeholder="Enter home page title">
          </div>
          <div class="mb-3">
            <label for="homeDescription" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="homeDescription" rows="5"
              placeholder="Enter home page description"></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="home">Update</button>
        </form>
      </div>
      <div class="tab-pane fade show " id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="galleryFile" class="form-label">Upload Files</label>
            <input type="file" class="form-control" id="galleryFile" name="image" multiple>
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-control" id="category" name="category">
              <option value="nature">Nature Projects</option>
              <!-- <option value="babies">Babies Projects</option>  -->
              <option value="wedding">Wedding Projects</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <!-- Image Table -->
        <table class="table mt-5">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Image Name</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'connect.php';
            $query = "SELECT * FROM image";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['img_id'] . '</td>';
                echo '<td>' . $row['img_name'] . '</td>';
                echo '<td>' . $row['category'] . '</td>';
                echo '<td>
                      <form method="post" style="display:inline;">
                        <input type="hidden" name="delete_id" value="' . $row['img_id'] . '">
                        <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                      </td>';
                echo '</tr>';
              }
            } else {
              echo '<tr><td colspan="4">No images found in the database.</td></tr>';
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
        <form method="post">
          <div class="mb-3">
            <label for="skillTitle" class="form-label">Skill Title</label>
            <input type="text" class="form-control" id="skillTitle" name="etitle" placeholder="Enter skill title">
          </div>
          <div class="mb-3">
            <label for="skillDescription" class="form-label">Skill Description</label>
            <textarea class="form-control" id="skillDescription" rows="5" name="edescription" placeholder="Enter skill description"></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="esubmit">Submit</button>
        </form>
      </div>

      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <table class="table mt-5">
          <thead>
            <tr>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Message</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT * FROM contact";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['username'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['messge'] . '</td>';
                echo '</tr>';
              }
            } else {
              echo '<tr><td colspan="3">No contact messages found.</td></tr>';
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<br>
<br>
 <center>  <a href="logout.php"><button class="btn btn-danger btn-sm">Logout</button></a></center>
</body>
</html>

<?php
include 'connect.php';

// Handle image upload
if (isset($_POST['submit'])) {
  if (isset($_FILES['image'])) {
    $image = $_FILES['image'];
    $fileName = $image['name'];
    $size = $image['size'];
    $fileTemp = $image['tmp_name'];
    $type = $image['type'];
    echo "<br>";
    $size_converted = $size / 1048576;
    $date = date("Y-m-d-H-i-s");

    $extension = pathinfo($image["name"], PATHINFO_EXTENSION);
    $newfilename = $date . "." . $extension;

    $category = $_POST['category']; // Get the category from the form

    if ($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg") {
      if ($size_converted < 5) {
        move_uploaded_file($fileTemp, 'images/' . $newfilename);
        $query = "INSERT INTO image(img_name, category) VALUES('$newfilename', '$category')"; 
        $res = mysqli_query($conn, $query);
        if ($res) {
          echo "<script>alert('Image Uploaded Successfully')</script>";
        }
            
        
      } else {
        die("Error: File is too large");
      }
    } else {
      die("Error: File is not supported");
    }
  } else {
    echo "No files";
  }
}

// Handle about us update
if (isset($_POST['home'])) {
  $title = ($_POST['title']);
  $description = ($_POST['description']);
  $query2 = "UPDATE about_us SET title = '$title', description = '$description' WHERE id = 1;";
  $hom = mysqli_query($conn, $query2);
}

// Handle about us delete
if (isset($_POST['delete'])) {
  $delete_id = $_POST['delete_id'];
  $query = "DELETE FROM images WHERE img_id = $delete_id";
  mysqli_query($conn, $query);
  echo "<script>alert('Record deleted successfully');</script>";
  echo "<script>window.location = 'admin.php';</script>";
}

// Handle update of skills/experience

if(isset($_POST['esubmit'])){
  $etitle = $_POST['etitle'];
  $edescription = $_POST['edescription'];
  $query = "UPDATE experience SET title='$etitle' , description = '$edescription' where exp_id = 1;";
  $exp = mysqli_query($conn, $query);
}

?>


