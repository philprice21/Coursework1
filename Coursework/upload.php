<html>

<head>
    <title>instagraham</title>
    <h1><a href="index.php">instagraham</a></h1><br>
</head>

<body>
    <link rel="stylesheet" href="styles.css" />
    <?php

    $target_dir = "uploads/"; // set target directory
    $target_title = basename($_FILES["fileToUpload"]["name"]); // set target filename
    $target_file = $target_dir . $target_title; // concatenate
    $msg_comment = ($_POST['link']); //get comment box for image
    $uploadOk = TRUE; // variable to determine if upload was successful
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // get file type/extension
    

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") { // Only allow certain file formats
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed<br>";
        $uploadOk = FALSE;
    }
    // Check if $uploadOk is set to FALSE by an error
    if (!$uploadOk) {
        echo "Failure: your file was not uploaded.";
    } else { // if everything is ok, move the file from the temporary location to its permanent location
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Error: there was an error uploading your file.";

        }
    }
    if ($uploadOk) { // if upload ok connect to database and execute query 
        $mysqli = new mysqli("localhost", "root", "", "5114asst1");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $q = "INSERT INTO photo (title, comment) VALUES ('" . $target_title . "', '" . $msg_comment . "')"; //sql query
    
        if ($mysqli->query($q)) {
            echo "<p>File added to database.</p>";
        } else {
            echo "<p>Something went wrong. Please contact your system adminstrator.</p>";
        }
    }

    ?>
</body>

</html>