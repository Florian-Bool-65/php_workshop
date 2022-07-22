<?php
$data = $_GET["test"];

define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "db_university");

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
$query = "SELECT * FROM `departments` WHERE name LIKE '%$data'";
$res = $conn->query($query);

var_dump($query);

var_dump($res->fetch_all(MYSQLI_ASSOC));