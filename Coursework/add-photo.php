<html>

<head>
    <title>instagraham</title>
    <h1><a href="index.php">instagraham</a></h1><br>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <form action="upload.php" id="usrform" method="post" enctype="multipart/form-data">
        <p> <input type="file" name="fileToUpload" id="fileToUpload"> </p>
        <br><textarea cols="50" rows="4" name="link" placeholder="Enter Comment here"></textarea>
        <p> <input type="submit" value="Upload photo" id="upload"> </p>
    </form>
</body>

</html>