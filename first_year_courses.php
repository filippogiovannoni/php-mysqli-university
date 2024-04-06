<?php

require_once __DIR__ . '/app/database/db.php';
require_once __DIR__ . '/app/layouts/head.php';

$sql = "SELECT * FROM `courses` WHERE `period` = 'I semestre' AND `year`= 1 ORDER BY `cfu` DESC;";

$result = $connection->query($sql);

?>



<body class="bg-light">
    <header>
        <h1 class="text-center">The University DB</h1>
        <nav class="nav justify-content-center  ">
            <a class="nav-link" href="index.php">1990's Students</a>
            <a class="nav-link" href="first_year_courses.php">First Year Courses</a>
            <a class="nav-link" href="degrees.php">Degree Courses</a>
        </nav>
    </header>

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