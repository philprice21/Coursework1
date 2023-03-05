<html>

<head>
    <title>instagraham</title>
    <h1><a href="index.php">instagraham</a></h1><br>
</head>
<link rel="stylesheet" href="styles.css" />

<body>
    <?php

    // connect to database 
    $mysqli = new mysqli("localhost", "root", "", "5114asst1");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    // set-up query string 
    $q = 'SELECT idphoto, title, comment FROM photo WHERE idphoto=' . $_GET['id'] . ';';

    // run query string 
    if ($res = $mysqli->query($q)) { // if there are results, then output form, otherwise print error      
        if ($res->data_seek(0)) {
            while ($row = $res->fetch_assoc()) { // output a form with the message's details      
    
                echo '<form action="edit-upload.php" method="post" enctype="multipart/form-data">' . "\n";
                echo '<p>Title:<br> <input type="text" id="title_change" name="newTitle" value="' . $row['title'] . '"><br></p>' . "\n"; //display title
                echo '<img width="200" src="uploads/' . $row['title'] . '"><br>' . "\n"; //display image
                echo '<p>comments:<br> <textarea name="msgText" rows="4" cols="55">' . $row['comment'] . '</textarea></p>' . "\n"; //display comments
                echo '<input type="hidden" name="idphoto" value="' . $row['idphoto'] . '">' . "\n"; //get id 
                echo '<input type="hidden" name = "oldTitle" value = "' . $row['title'] . '">'; //get current name from folder
                echo '<p><input type="submit" value="Update" id="upload" name="submit"></p>' . "\n";
                echo '</form>' . "\n";
            }
        } else {
            echo "No photo found"; //no photo 
        }
    } else {
        echo "Query error: please contact your system administrator."; //error message
    }
    ?>
</body>

</html>