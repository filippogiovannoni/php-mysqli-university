<?php

require_once __DIR__ . '/database/db.php';

$students_1990 = "SELECT * FROM `students` WHERE YEAR(`date_of_birth`) = 1990;";

// var_dump($students_1990);

$result_1990 = $connection->query($students_1990);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University DB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <h1 class="text-center">The University DB</h1>
        <nav class="nav justify-content-center  ">
            <a class="nav-link" href="#">1990's Students</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link" href="#">Link</a>
        </nav>
    </header>

    <main>
        <div class="container">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Date of Birth</th>
                    </tr>
                </thead>
                <tbody>

                    <?php while ($row = $result_1990->fetch_assoc()) :
                        ['id' => $id, 'name' => $name, 'surname' => $surname, 'date_of_birth' => $date_of_birth] = $row; ?>

                        <tr>
                            <th scope="row"><?= $id ?></th>
                            <td><?= $name ?></td>
                            <td><?= $surname ?></td>
                            <td><?= $date_of_birth ?></td>
                        </tr>

                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>
    </main>


</body>

</html>