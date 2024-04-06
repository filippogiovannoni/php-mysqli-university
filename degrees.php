<?php

require_once __DIR__ . '/app/database/db.php';
require_once __DIR__ . '/app/layouts/head.php';
require_once __DIR__ . '/app/layouts/header.php';

$sql = "SELECT `degrees`.`name` AS `degree_name`, `courses`.`name` AS `course_name`, `teachers`.`name`, `teachers`.`surname` 
FROM `degrees`
JOIN `courses` ON `courses`.`degree_id`=`degrees`.`id`
JOIN `course_teacher` ON `course_teacher`.`course_id`=`courses`.`id`
JOIN `teachers` ON `course_teacher`.`teacher_id`= `teachers`.`id`";

$result = $connection->query($sql);

?>

<main>
    <div class="container">

        <table class="table">
            <thead>
                <tr class="border border-primary">
                    <th scope="col">Degree</th>
                    <th scope="col">Course</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                </tr>
            </thead>
            <tbody>

                <?php while ($row = $result->fetch_assoc()) :
                    ['degree_name' => $degree_name, 'course_name' => $course_name, 'name' => $name, 'surname' => $surname] = $row; ?>

                    <tr>
                        <th scope="row"><?= $degree_name ?></th>
                        <td><?= $course_name ?></td>
                        <td><?= $name ?></td>
                        <td><?= $surname ?></td>
                    </tr>

                <?php endwhile; ?>

            </tbody>
        </table>
    </div>
</main>


</body>

</html>