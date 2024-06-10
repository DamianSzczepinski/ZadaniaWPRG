<!DOCTYPE html>
<head>
    <title>Document</title>
</head>
<body>
    <?php
        $mysqli=new mysqli ("localhost", "root", "","tescik");
        if($mysqli->connect_errno) {
            printf("Connect failed: %s<br />", $mysqli->connect_error);
            exit();
        }
        printf('Connected successfully.<br />')
        $createDatabaseQuery ="";
        if ($mysqli->query($createDatabaseQuery)) {
            if ($mysqli->affected_rows > 0) {
                printf("Database TUTORIALS created successfully.<br />");
            } else {
                printf("Database TUTORIALS already exists.<br />");
            }
        } else {
            printf("Could not create database: %s<br />", $mysqli->error);
        }
        $mysqli->close();
    
    ?>
</body>
</html>