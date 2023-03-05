<html>

<head>
  <title>instagraham</title>
</head>
<link rel="stylesheet" href="styles.css" />

<body>
  <h1>instagraham</h1><br>

  <!--add photo button-->
  <div class="container">
    <form action="add-photo.php">
      <button class="btn" action="add-photo.php">Add photo</button>
    </form>
  </div>

  <?php
  // create new MySQL interface object 
  $mysqli = new mysqli("localhost", "root", "", "5114asst1");
  if ($mysqli->connect_errno) { // if there is an error, output the details   
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  echo '<hr>'; // horizontal rule 
  
  $q = "SELECT idphoto, title, comment, imageurl FROM photo;"; // execute SQL query. If there is an error, print an eror message.
  if ($res = $mysqli->query($q)) { // set the pointer to the first result. If there are no results, tell the user.   
    if ($res->data_seek(0)) {
      while ($row = $res->fetch_assoc()) { // fetch the associative array for the next row   // output the message stored in that row                   
        echo $row['title'];
        echo '<p><img position="relative", width=""'; //image position
        echo '<source src="uploads/' . $row['title'] . '" type="img"><br>'; //image source
        echo "<i>Comments: " . $row['comment'] . "</i><br>"; //comments 
        echo ("<br><button class='eddel' onclick= \"location.href='edit-photo.php?id=" . $row['idphoto'] . "'\">Edit</button >"); //edit page button
        echo ("<button class='eddel' onclick= \"location.href='delete-photo.php?id=" . $row['idphoto'] . "'\">Delete</button>"); //delete button
        echo '</img></p>';
        echo '<hr>';
      }
    } else {
      echo "feed is empty"; // no results    
    }
  } else {
    echo "Query error: please contact your system administrator."; //error message
  }

  ?>

</body>

</html>