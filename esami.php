<?php

require_once __DIR__ . '/classi/db/QueryHandler.php';

$db = new QueryHandler();

$data = $db->execute("SELECT * from `departments`");

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
    <h1>Lista Esami</h1>
    
    <table class="table">
      <thead>
      <tr>
        <td>ID</td>
        <td>Nome</td>
        <td>Indirizzo</td>
        <td>Tel.</td>
        <td>Email</td>
        <td>Responsabile</td>
        <td>Sito</td>
      </tr>
      </thead>
      
      <tbody>
      <?php
      $data->forEach(function ($row) {
      
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

