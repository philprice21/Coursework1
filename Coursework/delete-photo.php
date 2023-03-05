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

    // create SQL query to delete message with idmessage=id 
    $q = 'DELETE FROM photo WHERE idphoto=' . $_GET['id'] . ';';
    // execute query and output a success/error message  
    if ($mysqli->query($q)) {
        echo '<p>photo ' . $_GET['id'] . ' deleted.</p>';

    } else {
        echo "<p>Something went wrong. Please contact your system administrator.</p>"; // error message
    }

    ?>
</body>

</html>