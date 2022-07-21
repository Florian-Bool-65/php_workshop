<?php

require_once __DIR__ . '/classi/db/QueryHandler.php';

$data = QueryHandler::execute("SELECT `departments`.`id`, `departments`.`name`, COUNT(*) as `num_degrees`
                                      FROM `departments`
                                      JOIN `degrees`
                                        ON `departments`.`id` = `degrees`.`department_id`
                                      GROUP BY `departments`.`id`
                                      ORDER BY `departments`.`name`;");

//var_dump($data->toArray());
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Php Workshop</title>
  
  <?php include "partials/head_scripts.php" ?>
</head>
<body>
<?php include "partials/header.php" ?>

<main>
  <div class="container py-3">
    <h1>Lista dipartimenti</h1>

    <table class="table">
      <thead>
      <tr>
        <td>Dipartimenti</td>
        <td>Num. Corsi di Laurea</td>
        <td>Dettagli</td>
      </tr>
      </thead>

      <tbody>
      <?php
      $data->forEach(function ($row) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['num_degrees']}</td>";
        echo "<td><a href='dipartimento.php?id={$row["id"]}'>Apri</a></td>";
        echo "</tr>";
      });
      
      ?>
      <tr></tr>

      </tbody>

    </table>
  </div>
</main>

<?php include "partials/footer.php" ?>

</body>
</html>

