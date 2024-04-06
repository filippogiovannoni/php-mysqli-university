<?php

require_once __DIR__ . '/app/database/db.php';
require_once __DIR__ . '/app/layouts/head.php';
require_once __DIR__ . '/app/layouts/header.php';

$sql = "SELECT * FROM `courses` WHERE `period` = 'I semestre' AND `year`= 1 ORDER BY `cfu` DESC;";

$result = $connection->query($sql);

?>

<main>
    <div class="container">

        <table class="table">
            <thead>
                <tr class="border border-primary">
                    <th scope="col">Name</th>
                    <th scope="col">Period</th>
                    <th scope="col">Year</th>
                    <th scope="col">CFU</th>
                </tr>
            </thead>
            <tbody>

                <?php while ($row = $result->fetch_assoc()) :
                    ['name' => $name, 'period' => $period, 'year' => $year, 'cfu' => $cfu] = $row; ?>

                    <tr>
                        <th scope="row"><?= $name ?></th>
                        <td><?= $period ?></td>
                        <td><?= $year ?></td>
                        <td><?= $cfu ?></td>
                    </tr>

                <?php endwhile; ?>

            </tbody>
        </table>
    </div>
</main>


</body>

</html>