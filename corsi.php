<?php

require_once __DIR__ . '/classi/db/Course.php';

$data = Course::all(true);

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
    <h1>Lista Corsi</h1>

    <table class="table">
      <thead>
      <tr>
        <td>ID</td>
        <td>Corso di Laurea</td>
        <td>Nome</td>
        <td>Periodo</td>
        <td>Anno</td>
        <td>CFU</td>
        <td>Sito</td>
        <td></td>
      </tr>
      </thead>

      <tbody>
      <?php
      $data->forEach(function ($row) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['degree_name']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['period']}</td>";
        echo "<td>{$row['year']}</td>";
        echo "<td>{$row['cfu']}</td>";
        echo "<td><a href='https://{$row['website']}' target='_blank'>Apri</a></td>";
        echo "<td><a href='corso.php?id={$row['id']}' target='_blank'>Dettagli</a></td>";
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

