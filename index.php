<?php

define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "db-university");

// Connect

$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection

if ($connection && $connection->connect_error) {
    echo 'Connection Failed: ' . $connection->connect_error;
}

var_dump($connection);


$students_1990 = "SELECT * FROM `students` WHERE YEAR(`date_of_birth`) = 1990;";

var_dump($students_1990);

$result_1990 = $connection->query($students_1990);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <h1>Students</h1>
    <?php while ($row = $result_1990->fetch_assoc()) :
        ['name' => $name, 'surname' => $surname, 'date_of_birth' => $date_of_birth] = $row; ?>

        <div>
            <span><?= $name ?></span>
            <span><?= $surname ?></span>
            <span><?= $date_of_birth ?></span>
            <hr>
        </div>




    <?php endwhile; ?>


</body>

</html>