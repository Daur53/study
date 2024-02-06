<?php

$filename = uniqid().'.'.end(explode(".", $_FILES['file']['name']));

$dir = "img/demo/gallery/".$filename;
move_uploaded_file($_FILES['file']['tmp_name'], $dir);

$servername = "localhost";
$dbname = "my_database";
$username = "root";
$password = "";


$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$query = 'INSERT INTO task_17 VALUES (NULL, :file)';

$stmt = $pdo -> prepare($query);
$stmt -> execute(['file' => $filename]);

header('Location: task_17.php')
//1. polychit kartinku
//2. pdo
//3. 







?>