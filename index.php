<?php

require_once __DIR__ . '/app/database/db.php';
require_once __DIR__ . '/app/layouts/head.php';
require_once __DIR__ . '/app/layouts/header.php';


if (!isset($_POST['year'])) {
    $sql = "SELECT * FROM `students` ORDER BY `surname` ASC";
    $result = $connection->query($sql);
} else {
    $year = $_POST['year'];
    $sql = "SELECT * FROM `students` WHERE YEAR(`date_of_birth`) = $year ORDER BY `surname` ASC";
    $result = $connection->query($sql);
}

?>

<main>
    <div class="container">
        <table class="table">
            <thead>
                <tr class="border border-primary">
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Date of Birth</th>
                </tr>
            </thead>
            <tbody>

                <?php while ($row = $result->fetch_assoc()) :
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