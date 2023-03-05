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

    // define query string 
    $q = "UPDATE photo SET title='" . addslashes($_POST['newTitle']) . "', " . "comment='" . addslashes($_POST['msgText']) . "' " . " WHERE idphoto=" . $_POST['idphoto'] . ";";
    // run query, output success/error message 
    if ($mysqli->query($q)) {
        rename("uploads/" . $_POST['oldTitle'], "uploads/" . $_POST['newTitle']);
        echo 'Photo updated.';
    } else {
        echo "Query error: please contact your system adminstrator."; // error message
    }

    ?>

</body>

</html>